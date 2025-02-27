<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Barang;
use App\Models\Catatan;
use App\Models\GuideBook;
use App\Models\Peminjaman;
use App\Models\Peruntukan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PeminjamanNotification;

class PeminjamanController extends Controller
{
	public function index()
	{
		$file = GuideBook::where('status', 'used')
			->latest()
			->first();

		$peruntukanData = Peruntukan::all();
		$borrowedItems = session()->get('borrowed_items', []);
		return view('user.peminjaman.index', compact('borrowedItems', 'peruntukanData', 'file'));
	}

	public function scan(Request $request)
	{
		$validatedData = $request->validate([
			'qrcode' => 'required|string|max:50',
		]);

		Log::info("Scanned itemcode:", $validatedData);

		// Ambil item berdasarkan QR code dari database
		$item = $this->findItemByQrcode($validatedData['qrcode']);

		// Ambil daftar item yang sudah dipindai dari session
		$borrowedItems = session()->get('borrowed_items', []);

		// Cek apakah item sudah ada di session
		if ($item && collect($borrowedItems)->contains('uuid', $item->uuid)) {
			// Jika item sudah ada, kirimkan response error
			return response()->json([
				'success' => false,
				'message' => 'Item sudah dipindai sebelumnya.',
			], 400);
		}

		//jika sisa limit barang habis maka tidak bisa di pinjam
		if ($item->status == 'tidak-tersedia') {
			return response()->json([
				'success' => false,
				'message' => 'Barang tidak dapat dipinjam'
			], 400);
		}

		$response = [
			'success' => !!$item,
			'message' => $item ? 'Barang Telah Ditambahkan.' : 'Barang Tidak Tersedia.',
		];

		if ($item) {
			// Siapkan data item
			$itemData = [
				'uuid' => $item->uuid,
				'kode_barang' => $item->kode_barang,
				'name' => $item->nama_barang,
				'merk' => $item->merk,
				'serial_number' => $item->nomor_seri,
				'timestamp' => now()->timestamp // Menambahkan timestamp untuk tracking
			];

			// Tambahkan item baru ke array borrowed_items
			$borrowedItems[] = $itemData;

			// Simpan array updated borrowed_items ke session
			session()->put('borrowed_items', $borrowedItems);

			$response['item'] = $itemData;
		}

		return response()->json($response, 200);
	}

	protected function findItemByQrcode(string $qrcode)
	{
		return Barang::where('kode_barang', $qrcode)->first(); // Replace with your logic
	}

	public function store(Request $request)
	{
		$borrowedItems = session()->get('borrowed_items', []);
		Log::info('Received request data:', $request->all());
		if (empty($borrowedItems)) {
			return response()->json([
				'success' => false,
				'message' => 'Tidak ada barang yang dipilih untuk dipinjam'
			], 400);
		}


		$kd_peminjaman = "PMB-" . time();

		$qrCode = QrCode::format('svg')->size(200)->generate($kd_peminjaman);
		$qrCodeFilename = time() . '_qr.svg';
		Storage::disk('public')->put('uploads/qr_codes_peminjaman/' . $qrCodeFilename, $qrCode);

		try {
			DB::beginTransaction();

			$borrowing = Peminjaman::create([
				'uuid' => Str::uuid(),
				'kode_peminjaman' => $kd_peminjaman,
				'nomor_surat' => $request->nomor_surat,
				'nomor_peminjaman' => 'PMJ-' . date('Ym') . '-' . str_pad(Peminjaman::whereYear('tanggal_peminjaman', date('Y'))->whereMonth('tanggal_peminjaman', date('m'))->count() + 1, 2, '0', STR_PAD_LEFT),
				'peruntukan_id' => $request->peruntukan_id,
				'tanggal_penggunaan' => $request->tanggal_penggunaan,
				'tanggal_peminjaman' => now(),
				'tanggal_kembali' => $request->tanggal_kembali,
				'qr_code' => $qrCodeFilename,
				'peminjam' => Auth::user()->nama_lengkap,
				'status' => 'Proses'
			]);

			// Create borrowing details
			foreach ($borrowedItems as $item) {
				DetailPeminjaman::create([
					'uuid' => Str::uuid(),
					'kode_peminjaman' => $borrowing->kode_peminjaman,
					'kode_barang' => $item['kode_barang'],
				]);

				$updatedItem = Barang::where('uuid', $item['uuid'])->first();

				if ($updatedItem) {
					$newLimit = $updatedItem->sisa_limit - 1;

					$updatedItem->update(['sisa_limit' => $newLimit]);

					if ($newLimit == 0) {
						$updatedItem->update(['status' => 'tidak-tersedia']);
					}
				}
			}

			// Clear session
			session()->forget('borrowed_items');
			DB::commit();
			session()->put('kodePeminjaman', $borrowing->kode_peminjaman);

			// get barang detail 
			$barang = [];
			foreach ($borrowedItems as $item) {
				$barangDetail = Barang::where('kode_barang', $item['kode_barang'])->first();
				if ($barangDetail) {
					$barang[] = [
						'nama_barang' => $barangDetail->nama_barang,
						'merk' => $barangDetail->merk,
						'nomor_seri' => $barangDetail->nomor_seri,
					];
				}
			}

			$catatan = Catatan::get();

			// kirim notif email ke superadmin 
			Notification::send(
				[
					User::where('role', 'superadmin')->first(),
					Auth::user()
				],
				new PeminjamanNotification($borrowing, $barang, $catatan)
			);

			return response()->json([
				'success' => true,
				'message' => 'Borrowing saved successfully'
			], 200);
		} catch (\Exception $e) {
			DB::rollback();
			Log::error('Terjadi kesalahan saat menyimpan peminjaman.', [
				'error' => $e->getMessage(),
				'user_id' => Auth::user()->id,
			]);

			return response()->json([
				'success' => false,
				'message' => 'Error saving borrowing: ' . $e->getMessage()
			], 500);
		}
	}

	public function removeItem($uuid)
	{
		$borrowedItems = session()->get('borrowed_items', []);

		$borrowedItems = array_filter($borrowedItems, function ($item) use ($uuid) {
			return $item['uuid'] !== $uuid;
		});
		session()->put('borrowed_items', array_values($borrowedItems));
		return response()->json(['success' => true, 'message' => 'Item berhasil dihapus']);
	}

	public function report()
	{
		if (!session()->has('kodePeminjaman')) {
			return redirect()->route('user.option');
		}
		$kodePeminjaman = session()->get('kodePeminjaman');
		$detailpeminjaman = DetailPeminjaman::where('kode_peminjaman', $kodePeminjaman)->get();
		$peminjaman = Peminjaman::where('kode_peminjaman', $kodePeminjaman)->first();
		$barang = [];
		foreach ($detailpeminjaman as $detail) {
			// Ambil data barang berdasarkan kode_barang
			$dataBarang = Barang::where('kode_barang', $detail->kode_barang)->first();

			if ($dataBarang) {
				$barang[] = [
					'nama_barang' => $dataBarang->nama_barang,
					'merk' => $dataBarang->merk,
					'nomor_seri' => $dataBarang->nomor_seri,
					'status' => $dataBarang->status,
				];
			}
		}

		return view('user.laporan.peminjaman.index', compact('detailpeminjaman', 'peminjaman', 'barang'));
	}

	public function printReport()
	{
		if (!session()->has('kodePeminjaman')) {
			return redirect()->route('user.option');
		}
		$kodePeminjaman = session()->get('kodePeminjaman');
		// Ambil data peminjaman
		$peminjaman = Peminjaman::where('kode_peminjaman', $kodePeminjaman)->first();

		// Ambil detail peminjaman
		$detailpeminjaman = DetailPeminjaman::where('kode_peminjaman', $kodePeminjaman)->get();

		// Ambil data barang berdasarkan detail peminjaman
		$barang = [];
		foreach ($detailpeminjaman as $detail) {
			$dataBarang = Barang::where('kode_barang', $detail->kode_barang)->first();
			if ($dataBarang) {
				$barang[] = [
					'nama_barang' => $dataBarang->nama_barang,
					'merk' => $dataBarang->merk,
					'nomor_seri' => $dataBarang->nomor_seri,
					'status' => $dataBarang->status,
				];
			}
		}
		// Siapkan data untuk view
		$data = [
			'peminjaman' => $peminjaman,
			'barang' => $barang,
			'catatan' => Catatan::get()
		];

		// Generate PDF
		$pdf = Pdf::loadView('user.laporan.peminjaman.report', $data)->setPaper('a4', 'landscape');
		return $pdf->stream('laporan-peminjaman-' . time() . '.pdf');
	}
}
