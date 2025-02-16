<?php

namespace App\Http\Controllers\Admin;

use App\Models\Barang;
use App\Models\JenisBarang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BarangController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$data = [
			'title' => 'Barang',
			'barang' => Barang::where('status', 'tersedia')
				->orderBy('created_at', 'DESC')
				->paginate(10),
		];

		return view('admin.barang.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$data = [
			'title' => 'Tambah Barang',
			'jenis_barang' => JenisBarang::all()
		];

		return view('admin.barang.create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$request->validate([
			'nama_barang' => 'required|unique:barang,nama_barang',
			'merk' => 'required',
			'nomor_seri' => 'required',
			'jenis_barang_id' => 'required|exists:jenis_barang,id',
			'limit' => 'required|numeric',
			'foto' => 'nullable|file|mimes:jpg,jpeg,png',
		], [
			'nama_barang.required' => 'Nama barang wajib diisi.',
			'nama_barang.unique' => 'Nama barang sudah ada.',
			'merk.required' => 'Merk wajib diisi.',
			'nomor_seri.required' => 'Nomor Seri wajib diisi.',
			'jenis_barang_id.required' => 'Jenis Barang wajib diisi.',
			'jenis_barang_id.exists' => 'Jenis barang tidak ditemukan.',
			'limit.required' => 'Limit wajib diisi.',
			'limit.numeric' => 'Limit harus berupa angka.',
			'foto.mimes' => 'File harus dalam format jpg, jpeg, png.',
		]);

		$kode_barang = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 12);
		$qrCode = QrCode::format('png')->size(200)->generate($kode_barang);
		$qrCodeFileName = time() . '_qr.png';
		Storage::disk('public')->put('uploads/qr_codes_barang/' . $qrCodeFileName, $qrCode);

		if ($request->hasFile('foto')) {
			$file = $request->file('foto');
			$filename = time() . '.' . $file->getClientOriginalExtension();

			// kompress foto 
			$manager = new ImageManager(new Driver());
			$image = $manager->read($file)->encodeByExtension(extension: $file->getClientOriginalExtension(), quality: 10);

			Storage::disk('public')->put('uploads/foto_barang/' . $filename, $image);
			$data['foto'] = $filename;
		} else {
			$data['foto'] = 'default.jpg';
		}

		Barang::create([
			'uuid' => Str::uuid(),
			'kode_barang' => $kode_barang,
			'nama_barang' => $request->nama_barang,
			'nomor_seri' => $request->nomor_seri,
			'merk' => $request->merk,
			'jenis_barang_id' => $request->jenis_barang_id,
			'status' => $request->limit == 0 ? 'tidak-tersedia' : 'tersedia',
			'limit' => $request->limit,
			'sisa_limit' => $request->limit,
			'foto' => $data['foto'],
			'deskripsi' => $request->deskripsi,
			'qr_code' => $qrCodeFileName,
		]);

		notify()->success('Barang Berhasil Ditambahkan');
		return redirect()->route('barang.index');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $uuid)
	{
		$data = [
			'title' => 'Detail Barang',
			'barang' => Barang::where('uuid', $uuid)->first(),
		];

		return view('admin.barang.detail', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $uuid)
	{
		$data = [
			'title' => 'Edit Barang',
			'barang' => Barang::where('uuid', $uuid)->first(),
			'jenis_barang' => JenisBarang::all()
		];

		return view('admin.barang.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $uuid)
	{
		$request->validate([
			'nama_barang' => 'required',
			'nomor_seri' => 'required',
			'merk' => 'required',
			'jenis_barang_id' => 'required|exists:jenis_barang,id',
			'limit' => 'required|numeric',
			'foto' => 'nullable|file|mimes:jpg,jpeg,png',
		], [
			'nama_barang.required' => 'Nama barang wajib diisi.',
			'nomor_seri.required' => 'Nomor Seri wajib diisi.',
			'merk.required' => 'Merk wajib diisi.',
			'jenis_barang_id.required' => 'Jenis Barang wajib diisi.',
			'jenis_barang_id.exists' => 'Jenis barang tidak ditemukan.',
			'limit.required' => 'Limit wajib diisi.',
			'limit.numeric' => 'Limit harus berupa angka.',
			'foto.mimes' => 'File harus dalam format jpg, jpeg, png.',
		]);

		$barang = Barang::where('uuid', $uuid)->firstOrFail();
		$filename = $barang->foto;
		if ($request->hasFile('foto')) {
			if ($barang->foto && $barang->foto !== 'default.jpg') {
				Storage::disk('public')->delete('uploads/foto_barang/' . $barang->foto);
			}

			$file = $request->file('foto');
			$filename = time() . '.' . $file->getClientOriginalExtension();

			// kompress foto 
			$manager = new ImageManager(new Driver());
			$image = $manager->read($file)->encodeByExtension(extension: $file->getClientOriginalExtension(), quality: 10);

			Storage::disk('public')->put('uploads/foto_barang/' . $filename, $image);
			$data['foto'] = $filename;
		}

		Barang::where('uuid', $uuid)->firstOrFail()->update([
			'nama_barang' => $request->nama_barang,
			'nomor_seri' => $request->nomor_seri,
			'merk' => $request->merk,
			'jenis_barang_id' => $request->jenis_barang_id,
			'status' => $request->limit == 0 ? 'tidak-tersedia' : 'tersedia',
			'limit' => $request->limit,
			'deskripsi' => $request->deskripsi,
			'foto' => $filename,
		]);

		notify()->success('Barang Berhasil Diupdate');

		$currentPage = $request->input('page', 1);
		return redirect()->route('barang.index', ['page' => $currentPage]);
	}


	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Request $request, string $uuid)
	{
		$barang = Barang::where('uuid', $uuid)->first();
		if ($barang) {

			if ($barang->qr_code) {
				Storage::disk('public')->delete('uploads/qr_codes_barang/' . $barang->qr_code);
			}

			if ($barang->foto && $barang->foto !== 'default.jpg') {
				Storage::disk('public')->delete('uploads/foto_barang/' . $barang->foto);
			}

			$barang->delete();
			notify()->success('Barang Berhasil Dihapus');
			return redirect()->route('barang.index', ['page' => $request->page]);
		}
	}

	public function printBarang()
	{
		$data['barang'] = Barang::orderBy('created_at', 'DESC')->get();

		if ($data['barang']->isEmpty()) {
			notify()->error('Barang tidak ditemukan');
			return redirect()->route('barang.index');
		}

		$pdf = Pdf::loadView('admin.barang.barang_pdf', $data)->setPaper('a4', 'landscape');
		return $pdf->stream('Barang-' . time() . '.pdf');
	}

	public function printQrCode()
	{
		$data['barang'] = Barang::get();

		if ($data['barang']->isEmpty()) {
			notify()->error('Barang tidak ditemukan');
			return redirect()->route('barang.index');
		}

		$pdf = Pdf::loadView('admin.barang.qrcode_pdf', $data)->setPaper('a4', 'potrait');
		return $pdf->stream('QRCode-Barang-' . time() . '.pdf');
	}

	public function search(Request $request)
	{
		$search = $request->search;

		$barang = Barang::where('nama_barang', 'like', '%' . $search . '%')
			->orWhereHas('jenisBarang', function ($q) use ($search) {
				$q->where('jenis_barang', 'like', '%' . $search . '%');
			})->paginate(10)
			->appends(['search' => $search]);

		$data = [
			'title' => 'Barang',
			'barang' => $barang,
		];

		return view('admin.barang.index', $data);
	}

	public function jenisBarang(JenisBarang $jenisBarang)
	{
		$barang = $jenisBarang->barang()->with('jenisBarang')->paginate(5);

		$data = [
			'title' => 'Jenis Barang : ' . $jenisBarang->jenis_barang,
			'barang' => $barang,
			'count' => $barang->count()
		];
		return view('admin.barang.index', $data);
	}
}
