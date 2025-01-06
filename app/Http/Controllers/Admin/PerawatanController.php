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
		$data = [
			'title' => 'Perawatan',
			'perawatan' => Perawatan::simplePaginate(10),
		];

		return view('admin.perawatan.index', $data);
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
			'title' => 'Perawatan',
			'barang' => Barang::where('sisa_limit', 0)->simplePaginate(10),
			'count' => Barang::where('sisa_limit', 0)->count()
		];

		return view('admin.perawatan.barang', $data);
	}

	// public function 

	public function resetLimit(string $uuid)
	{
		$barang = Barang::where('uuid', $uuid)->first();
		if ($barang) {
			if ($barang->sisa_limit == $barang->limit) {
				notify()->warning('Barang sudah direset sebelumnya');
				return redirect()->back();
			}

			$barang->update([
				'sisa_limit' => $barang->limit
			]);
			notify()->success('Limit Berhasil Direset');
			return redirect()->route('perawatan.index');
		}
	}

	public function detailBarang(string $uuid)
	{
		$data = [
			'title' => 'Detail Barang',
			'barang' => Barang::where('uuid', $uuid)->first(),
		];

		return view('admin.perawatan.detail-barang', $data);
	}
}
