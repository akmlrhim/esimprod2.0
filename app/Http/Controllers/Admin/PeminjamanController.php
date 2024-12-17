<?php

namespace App\Http\Controllers\Admin;

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
        ];

        return view('admin.peminjaman.index', $data);
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
    public function show(string $uuid)
    {
        $data = [
            'title' => 'Detail Peminjaman',
            'peminjaman' => Peminjaman::where('uuid', $uuid)->first(),
        ];

        return view('admin.peminjaman.detail', $data);
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

        $pdf = Pdf::loadView('admin.peminjaman.pdf', ['peminjaman' => $peminjaman])->setPaper('A4', 'landscape');
        return $pdf->stream('Peminjaman-' . $peminjaman->kode_peminjaman . '-' . time() . '.pdf');
    }
}
