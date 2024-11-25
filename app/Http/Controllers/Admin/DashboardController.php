<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'barang' => Barang::where('sisa_limit', '>', 0)->count(),
            'user' => User::count(),
            'perawatan' => Barang::where('sisa_limit', 0)->count(),
        ];
        return view('admin.dashboard.index', $data);
    }
}
