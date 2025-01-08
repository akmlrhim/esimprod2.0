<?php

namespace App\Http\Controllers\Admin;

use App\Models\Barang;
use App\Models\Perawatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PerawatanController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}


	public function limitHabis()
	{
		$data = [
			'title' => 'Limit Habis',
			'barang' => Barang::where('sisa_limit', 0)
				->where('status', 'tidak-tersedia')
				->paginate(10),
		];

		return view('admin.perawatan.limit_habis.barang', $data);
	}

	public function resetLimit(string $uuid)
	{
		$barang = Barang::where('uuid', $uuid)->first();
		if ($barang) {
			if ($barang->sisa_limit == $barang->limit) {
				notify()->warning('Barang sudah direset sebelumnya');
				return redirect()->back();
			}

			$barang->update([
				'sisa_limit' => $barang->limit,
				'status' => 'tersedia'
			]);
			notify()->success('Limit Berhasil Direset');
			return redirect()->route('perawatan.limit.habis.index');
		}
	}

	public function detailBarangHabis(string $uuid)
	{
		$data = [
			'title' => 'Detail Barang',
			'barang' => Barang::where('uuid', $uuid)->first(),
		];

		return view('admin.perawatan.limit_habis.detail', $data);
	}

	public function barangHilang()
	{
		$data = [
			'title' => 'Barang Hilang',
			'barang' => Barang::where('status', 'tidak-tersedia')->paginate(10),
		];

		return view('admin.perawatan.barang_hilang.barang', $data);
	}

	public function detailBarangHilang(string $uuid)
	{
		$data = [
			'title' => 'Detail Barang',
			'barang' => Barang::where('uuid', $uuid)->first(),
		];

		return view('admin.perawatan.barang_hilang.detail', $data);
	}

	public function ubahStatus(string $uuid)
	{
		$barang = Barang::where('uuid', $uuid)->first();
		if ($barang) {

			$barang->update([
				'status' => 'tersedia'
			]);

			notify()->success('Status diubah menjadi Tersedia');
			return redirect()->route('perawatan.barang.hilang.index');
		}
	}
}
