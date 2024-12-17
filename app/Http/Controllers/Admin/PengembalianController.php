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
            'title' => 'Detail Pengembalian',
            'pengembalian' => Pengembalian::where("uuid", $uuid)->first(),
        ];

        return view('admin.pengembalian.detail', $data);
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
