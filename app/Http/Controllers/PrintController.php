<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class PrintController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Table'
        ];
        return view('barang.table', $data);        
    }

    public function exportPDF(){
        $pdf = PDF::loadView('pdf.testtable')->setPaper('a4', 'landscape');;
        // Mengunduh file PDF
        return $pdf->stream('data_table.pdf');
    }
}
