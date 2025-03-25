<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Barang;
use App\Models\Jabatan;
use App\Models\Peminjaman;
use App\Models\Peruntukan;
use App\Models\JenisBarang;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = User::count();
		$data['barang'] = Barang::count();
		$data['peruntukan'] = Peruntukan::count();
		$data['jenis_barang'] = JenisBarang::count();
		$data['jabatan'] = Jabatan::count();
		$data['barang_tersedia'] = Barang::where('status', 'tersedia')->count();

		$data['barang_hilang'] = Barang::where('status', 'tidak-tersedia')
			->whereHas('detail_pengembalian', function ($query) {
				$query->where('status', 'hilang');
			})->count();

		$data['barang_tidak_tersedia'] = Barang::where('status', 'tidak-tersedia')
			->where('sisa_limit', 0)
			->whereHas('detail_pengembalian', function ($query) {
				$query->where('status', '!=', 'hilang');
			})->count();


		$data['peminjaman'] = Peminjaman::count();
		$data['peminjaman_proses'] = Peminjaman::where('status', 'Proses')->count();
		$data['peminjaman_selesai'] = Peminjaman::where('status', 'Selesai')->count();
		$data['pengembalian'] = Pengembalian::count();
		$data['pengembalian_incomplete'] = Pengembalian::where('status', 'Tidak Lengkap')->groupBy('kode_peminjaman')->count();
		$data['pengembalian_complete'] = Pengembalian::where('status', 'Lengkap')->groupBy('kode_peminjaman')->count();

		return view('admin.dashboard.index', $data);
	}
}
