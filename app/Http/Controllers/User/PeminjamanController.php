<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class PeminjamanController extends Controller
{
    public function index()
    {
        $pdf = Pdf::loadView('user.laporan.index')
            ->setPaper('a4', 'landscape');

        return $pdf->download('Pinjam-' . time() . '.pdf');
    }
}
