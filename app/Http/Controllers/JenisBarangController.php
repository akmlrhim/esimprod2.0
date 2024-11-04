<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisBarangController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Jenis Barang',
            'jenis_barang' => JenisBarang::cursorPaginate(10),
        ];
        return view('admin.jenis-barang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_jenis_barang' => 'required|string|unique:jenis_barang,kode_jenis_barang', // Pastikan ini menggunakan nama kolom yang benar
            'jenis_barang' => 'required|string|unique:jenis_barang,jenis_barang',
        ], [
            'kode_jenis_barang.required' => 'Kode Barang harus diisi',
            'kode_jenis_barang.unique' => 'Kode Barang sudah ada',
            'kode_jenis_barang.string' => 'Kode Barang harus berupa string',
            'jenis_barang.required' => 'Jenis Barang harus diisi',
            'jenis_barang.unique' => 'Jenis Barang sudah ada',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('showModal', true);
        }

        JenisBarang::create([
            'uuid' => Str::random(10),
            'kode_jenis_barang' => $request->kode_jenis_barang,
            'jenis_barang' => $request->jenis_barang,
        ]);

        notify()->success('Data Berhasil Disimpan');
        return redirect()->route('jenis-barang.index');
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
    public function edit(string $uuid)
    {
        $jenisBarang = JenisBarang::where('uuid', $uuid)->firstOrFail();
        return response()->json($jenisBarang);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        $validator = Validator::make($request->all(), [
            'kode_jenis_barang' => 'required|string',
            'jenis_barang' => 'required',
        ], [
            'kode_jenis_barang.required' => 'Kode Barang harus diisi',
            'kode_jenis_barang.string' => 'Kode Barang harus berupa string',
            'jenis_barang.required' => 'Jenis Barang harus diisi',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }

        $data = $request->except(['_token', '_method']);

        JenisBarang::where('uuid', $uuid)->update($data);
        notify()->success('Data Berhasil Diperbarui');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        JenisBarang::where('uuid', $uuid)->delete();

        notify()->success('Data Berhasil Dihapus');
        return redirect()->route('admin.jenis-barang.index');
    }
}
