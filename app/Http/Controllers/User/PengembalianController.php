<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Models\Barang;
use App\Models\GuideBook;
use App\Models\Peminjaman;
use Illuminate\Support\Str;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DetailPeminjaman;
use App\Models\DetailPengembalian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class PengembalianController extends Controller
{
	public function index()
	{
		// jika tidak memasukkan kode peminjaman terlebih dahulu maka ada alert error 
		if (!session()->has('kodePeminjaman')) {
			notify()->error('Anda belum memasukkan kode peminjaman');
			return redirect()->back();
		}

		$file = GuideBook::where('status', 'used')
			->latest()
			->first();

		$kodePeminjaman = session('kodePeminjaman');
		$detailpeminjaman = DetailPeminjaman::where('kode_peminjaman', $kodePeminjaman)->get();
		$peminjaman = Peminjaman::where('kode_peminjaman', $kodePeminjaman)->first();
		$barang = [];
		foreach ($detailpeminjaman as $detail) {
			// Ambil data barang berdasarkan kode_barang
			$dataBarang = Barang::where('kode_barang', $detail->kode_barang)->first();

			if ($dataBarang) {
				$barang[] = [
					'uuid' => $dataBarang->uuid,
					'nama_barang' => $dataBarang->nama_barang,
					'merk' => $dataBarang->merk,
					'kode_barang' => $dataBarang->kode_barang,
					'nomor_seri' => $dataBarang->nomor_seri,
					'status' => $dataBarang->status,
					'isChecked' => false,
				];
			}
		}
		$dataPeminjaman = [
			'nomor_peminjaman' => $peminjaman->nomor_surat,
			'tanggal_peminjaman' => $peminjaman->tanggal_peminjaman,
			'tanggal_kembali' => $peminjaman->tanggal_kembali,
			'peruntukan' => $peminjaman->peruntukan->uuid,
		];
		session()->put('dataPeminjaman', $dataPeminjaman);
		session()->put('BarangData', $barang);
		return view('user.pengembalian.index', compact('peminjaman', 'barang', 'file'));
	}

	public function checkPeminjaman(Request $request)
	{
		$request->validate([
			'code' => 'required|string'
		]);

		// Cari kode peminjaman di database
		$peminjaman = Peminjaman::where('kode_peminjaman', $request->code)->first();

		if (!$peminjaman) {
			return response()->json([
				'success' => false,
				'message' => 'Kode tidak ditemukan.'
			], 404);
		}

		$pengembalian = Pengembalian::where('kode_peminjaman', $peminjaman->kode_peminjaman)
			->where('status', 'Lengkap')
			->exists();

		if ($peminjaman->status == 'Selesai' && $pengembalian) {
			return response()->json([
				'success' => false,
				'message' => 'Peminjaman sudah selesai dan semua barang telah dikembalikan.'
			], 400);
		}

		if ($peminjaman) {
			session()->put('kodePeminjaman', $peminjaman->kode_peminjaman);
			// notify()->success('Kode peminjaman ditemukan');
			return response()->json([
				'success' => true,
				'message' => ' silakan lakukan pengembalian.',
			], 200);
		}
	}

	public function store(Request $request)
	{
		try {
			$request->validate([
				'*.item_uuid' => 'required|string',
				'*.item_code' => 'required|string',
				'*.condition' => 'required|',
				'*.isChecked' => 'required|boolean',
			]);

			// Proses data yang sudah valid
			$valData = $request->all();
			$dataPeminjaman = session('dataPeminjaman');

			// Simpan data Pengembalian
			$pengembalian = Pengembalian::create([
				'uuid' => Str::uuid(),
				'kode_pengembalian' => 'PG-' . time(),
				'kode_peminjaman' => session()->get('kodePeminjaman'),
				'tanggal_kembali' => now(),
				'status' => 'Tidak Lengkap',
				'peminjam' => Auth::user()->nama_lengkap ?? null,
			]);


			$allChecked = true;

			$peminjaman = Peminjaman::where('kode_peminjaman', $pengembalian->kode_peminjaman)->first();
			$peminjaman->status = 'Selesai';
			$peminjaman->save();

			// Simpan data DetailPengembalian
			foreach ($valData as $item) {
				$status = $item['isChecked'] ? $item['condition'] : 'hilang';
				$deskripsi = $item['isChecked'] ? 'Barang Telah Dikembalikan' : null;

				DetailPengembalian::create([
					'uuid' => Str::uuid(),
					'kode_pengembalian' => $pengembalian->kode_pengembalian,
					'kode_barang' => $item['item_code'],
					'status' => $status,
					'deskripsi' => $deskripsi,
				]);

				if (!$item['isChecked']) {
					$allChecked = false;
					DB::table('barang')
						->where('kode_barang', $item['item_code'])
						->update(['status' => 'tidak-tersedia']);
				}
			}

			if ($allChecked) {
				$pengembalian->status = 'Lengkap';
			}

			$pengembalian->save();

			$peminjaman = Peminjaman::where('kode_peminjaman', $pengembalian->kode_peminjaman)->first();
			$peminjaman->status = 'Selesai';
			$peminjaman->save();

			session()->put('kodePengembalian', $pengembalian->kode_pengembalian);
			return response()->json([
				'status' => 'success',
				'message' => 'Data pengembalian berhasil disimpan',
			], 200);
		} catch (Exception $e) {
			Log::error($e);
			return response()->json([
				'status' => 'error',
				'message' => 'Terjadi kesalahan saat menyimpan data pengembalian',
				'error' => $e->getMessage()
			], 500);
		}
	}

	public function validateItem(Request $request)
	{
		$request->validate([
			'itemCode' => 'required|string'
		]);

		$itemCode = $request->itemCode;
		$dataPeminjaman = session()->get('BarangData', []);
		$isExist = collect($dataPeminjaman)->contains(function ($item) use ($itemCode) {
			return $item['kode_barang'] === $itemCode;
		});

		if ($isExist) {
			// Response jika kode ditemukan
			return response()->json([
				'success' => true,
				'message' => 'Kode ditemukan,Validasi Berhasil.',
			], 200);
		}

		// Response jika kode tidak ditemukan
		return response()->json([
			'success' => false,
			'message' => 'Gagal Validasi.'
		], 404);
	}

	public function report()
	{
		if (!session()->has('kodePengembalian')) {
			return redirect()->route('user.option');
		}
		$kodePengembalian = session()->get('kodePengembalian');
		$detailPengembalian = DetailPengembalian::where('kode_pengembalian', $kodePengembalian)->get();
		$pengembalian = Pengembalian::where('kode_pengembalian', $kodePengembalian)->first();
		$barangKembali = [];
		$barangHilang = [];

		foreach ($detailPengembalian as $detail) {
			if ($detail->status != 'hilang') {
				$dataBarangKembali = Barang::where('kode_barang', $detail->kode_barang)->first();

				if ($dataBarangKembali) {
					$barangKembali[] = [
						'uuid' => $detail->uuid,
						'nama_barang' => $dataBarangKembali->nama_barang,
						'merk' => $dataBarangKembali->merk,
						'nomor_seri' => $dataBarangKembali->nomor_seri,
						'kondisi' => $detail->status,
					];
				}
			}

			if ($detail->status == 'hilang') {
				$dataBarangHilang = Barang::where('kode_barang', $detail->kode_barang)->first();

				if ($dataBarangHilang) {
					$barangHilang[] = [
						'uuid' => $detail->uuid,
						'nama_barang' => $dataBarangHilang->nama_barang,
						'merk' => $dataBarangHilang->merk,
						'nomor_seri' => $dataBarangHilang->nomor_seri,
					];
				}
			}
		}
		return view('user.laporan.pengembalian.index', compact('detailPengembalian', 'pengembalian', 'barangKembali', 'barangHilang'));
	}

	public function desc_update(Request $request)
	{
		$validateData = $request->validate([
			'barang' => 'required|array', // Harus berupa array
			'barang.*.uuid' => 'required|string|exists:detail_pengembalian,uuid', // UUID harus ada di tabel `detail_pengembalian`
			'barang.*.description' => 'required|string|max:255', // Deskripsi wajib diisi dan maksimal 255 karakter
		]);

		$barangData = $request->input('barang', []); // Ambil data barang dari request
		$updatedRecords = 0; // Hitung jumlah record yang diperbarui

		// Log::info('Data yang diterima untuk pembaruan deskripsi barang:', ['barang' => $barangData]);

		foreach ($barangData as $barang) {
			$detailPengembalian = DetailPengembalian::where('uuid', $barang['uuid'])->first();

			if ($detailPengembalian) {
				$detailPengembalian->deskripsi = $barang['description'];
				$detailPengembalian->save();
				$updatedRecords++;
			}
		}

		Log::info('Jumlah data yang berhasil diperbarui:', ['updated_records' => $updatedRecords]);
		return response()->json([
			'message' => 'Deskripsi barang berhasil diperbarui',
			'updated_records' => $updatedRecords,
		]);
	}

	public function printReport()
	{
		if (!session()->has('kodePengembalian')) {
			return redirect()->route('user.option');
		}
		$kodePengembalian = session()->get('kodePengembalian');
		$detailPengembalian = DetailPengembalian::where('kode_pengembalian', $kodePengembalian)->get();
		$pengembalian = Pengembalian::where('kode_pengembalian', $kodePengembalian)->first();
		$barangKembali = [];
		$barangHilang = [];

		foreach ($detailPengembalian as $detail) {
			if ($detail->status != 'hilang') {
				$dataBarangKembali = Barang::where('kode_barang', $detail->kode_barang)->first();

				if ($dataBarangKembali) {
					$barangKembali[] = [
						'nama_barang' => $dataBarangKembali->nama_barang,
						'merk' => $dataBarangKembali->merk,
						'nomor_seri' => $dataBarangKembali->nomor_seri,
						'kondisi' => $detail->status,
					];
				}
			}

			if ($detail->status == 'hilang') {
				$dataBarangHilang = Barang::where('kode_barang', $detail->kode_barang)->first();

				if ($dataBarangHilang) {
					$barangHilang[] = [
						'uuid' => $detail->uuid,
						'nama_barang' => $dataBarangHilang->nama_barang,
						'merk' => $dataBarangHilang->merk,
						'nomor_seri' => $dataBarangHilang->nomor_seri,
						'deskripsi' => $detail->deskripsi,
					];
				}
			}
		}
		$data = [
			'detailPengembalian' => $detailPengembalian,
			'pengembalian' => $pengembalian,
			'barangKembali' => $barangKembali,
			'barangHilang' => $barangHilang,
		];

		// Generate PDF menggunakan DomPDF
		$pdf = Pdf::loadView('user.laporan.pengembalian.report', $data)->setPaper('a3', 'landscape');

		// Return stream PDF ke browser
		return $pdf->stream('laporan-pengembalian-' . time() . '.pdf');
	}
}
