<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$data = [
			'title' => "Pengembalian",
			'pengembalian' => Pengembalian::paginate(5)
		];
		return view('admin.pengembalian.index', $data);
	}


	/**
	 * Display the specified resource.
	 */
	public function show(string $uuid)
	{
		$data = [
			'title' => 'Detail Pengembalian',
			'pengembalian' => Pengembalian::where("uuid", $uuid)->first(),
		];

		return view('admin.pengembalian.detail', $data);
	}

	public function search(Request $request)
	{
		$search = $request->search;
		$pengembalian = Pengembalian::where('kode_pengembalian', 'like', "%" . $search . "%")
			->paginate(10)
			->appends(['search' => $search]);

		$data = [
			'title' => 'Pengembalian',
			'pengembalian' => $pengembalian
		];

		return view('admin.pengembalian.index', $data);
	}
}
