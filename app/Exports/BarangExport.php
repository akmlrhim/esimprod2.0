<?php

namespace App\Exports;

use App\Models\Barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BarangExport implements FromView
{

  public function view(): View
  {
    $data['barang'] = Barang::all();

    return view('admin.barang.export', $data);
  }
}
