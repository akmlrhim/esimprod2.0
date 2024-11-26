<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class PeminjamanController extends Controller
{
    public function index()
    {
        return view('user.peminjaman.index');
    }

    public function cetak()
    {
        $pdf = Pdf::loadview('user.laporan.index')->setPaper('a4', 'landscape');
        return $pdf->download('peminjaman.pdf');
    }
}
