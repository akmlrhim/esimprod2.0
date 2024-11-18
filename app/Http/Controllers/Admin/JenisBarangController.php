<?php

namespace App\Http\Controllers\Admin;

use App\Models\Barang;
use App\Models\JenisBarang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            'jenis_barang' => JenisBarang::paginate(5),
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
            'jenis_barang' => 'required|string|unique:jenis_barang,jenis_barang',
        ], [
            'jenis_barang.required' => 'Jenis Barang harus diisi',
            'jenis_barang.unique' => 'Jenis Barang sudah ada',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('showModal', true);
        }

        JenisBarang::create([
            'uuid' => Str::uuid(),
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
            'jenis_barang' => 'required',
        ], [
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
        $jenisBarang = JenisBarang::where('uuid', $uuid)->first();

        if ($jenisBarang) {
            $isRelate = Barang::where('jenis_barang_id', $jenisBarang->id)->first();

            if ($isRelate) {
                notify()->error('Jenis barang ini tidak dapat dihapus karena masih digunakan pada data barang lainnya.');
                return redirect()->route('jenis-barang.index');
            } else {
                JenisBarang::where('uuid', $uuid)->delete();
                notify()->success('Data Berhasil Dihapus');
                return redirect()->route('jenis-barang.index');
            }
        }
    }
}
