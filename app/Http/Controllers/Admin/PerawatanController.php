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
        $data = [
            'title' => 'Tambah Perawatan',
            'barang' => Barang::where('sisa_limit', 0)->get()
        ];

        return view('admin.perawatan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required|unique:barang,kode_barang',
            'jenis_perawatan' => 'required'
        ], [
            'kode_barang.required' => 'Kode barang harus diisi',
            'kode_barang.unique' => 'Kode barang sudah ada, silakan pilih kode barang lain',
            'jenis_perawatan.required' => 'Jenis perawatan harus diisi'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Perawatan::create([
            'uuid' => Str::random(12),
            'kode_perawatan' => 'PRW' . now('Asia/Makassar')->format('Ymd-His'),
            'kode_barang' => $request->kode_barang,
            'jenis_perawatan' => $request->jenis_perawatan,
            'status' => 'proses',
            'keterangan' => $request->keterangan
        ]);

        notify()->success('Data Berhasil Disimpan');
        return redirect()->route('perawatan.index');
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


    public function barangTidakTersedia()
    {
        $data = [
            'title' => 'Barang Tidak Tersedia',
            'barang' => Barang::where('sisa_limit', 0)->simplePaginate(10),
            'count' => Barang::where('sisa_limit', 0)->count()
        ];

        return view('admin.perawatan.barang', $data);
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
