<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;
class OptionsController extends Controller
{
    public function index()
    {
        if (session()->has('kodePeminjaman')) {
            session()->forget('kodePeminjaman');
        }
        if (session()->has('kodePengembalian')) {
            session()->forget('kodePengembalian');
        }
        Session()->forget(['dataPeminjaman', 'BarangData']);

        return view('user.options');
    }
}
