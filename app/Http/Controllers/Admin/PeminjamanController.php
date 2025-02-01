<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catatan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class PeminjamanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$data = [
			'title' => 'Peminjaman',
			'peminjaman' => Peminjaman::paginate(5),
			'catatan' => Catatan::get('id', 'isi_catatan'),
		];

		return view('admin.peminjaman.index', $data);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $uuid)
	{
		$data = [
			'title' => 'Detail Peminjaman',
			'peminjaman' => Peminjaman::where('uuid', $uuid)->first(),
		];

		return view('admin.peminjaman.detail', $data);
	}

	public function search(Request $request)
	{
		$search = $request->search;
		$peminjaman = Peminjaman::where('kode_peminjaman', 'like', "%" . $search . "%")
			->paginate(10)
			->appends(['search' => $search]);

		$data = [
			'title' => 'Peminjaman',
			'peminjaman' => $peminjaman,
		];

		return view('admin.peminjaman.index', $data);
	}

	public function print(string $uuid)
	{
		$peminjaman = Peminjaman::where('uuid', $uuid)->first();

		if (!$peminjaman) {
			notify()->error('Peminjaman tidak ditemukan');
			return redirect()->back();
		}

		$pdf = Pdf::loadView('admin.peminjaman.pdf', [
			'peminjaman' => $peminjaman,
			'catatan' => Catatan::get()
		])->setPaper('A4', 'landscape');
		return $pdf->stream('Peminjaman-' . $peminjaman->kode_peminjaman . '-' . time() . '.pdf');
	}

	public function editCatatan($id)
	{
		$data = [
			'title' => 'Edit Catatan Peminjaman',
			'catatan' => Catatan::findOrFail($id)
		];

		return view('admin.peminjaman.catatan', $data);
	}

	public function updateCatatan(Request $request, $id)
	{
		$request->validate([
			'isi_catatan' => 'required'
		], [
			'isi_catatan.required' => 'Catatan harus diisi'
		]);

		$data = $request->only('isi_catatan');

		Catatan::where('id', $id)->update($data);

		notify()->success('Catatan berhasil diubah');
		return redirect()->route('peminjaman.index');
	}
}
