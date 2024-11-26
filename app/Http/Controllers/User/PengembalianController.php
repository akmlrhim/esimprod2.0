<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DetailPeminjaman;
use Exception;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\DetailPengembalian;
use App\Models\Barang;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    public function index()
    {
        if (!session()->has('peminjamanCode')) {
            return redirect('options');
        }

        $detailpeminjaman = DetailPeminjaman::where('kode_peminjaman', session()->get('peminjamanCode'))->get();
        $peminjaman = Peminjaman::where('kode_peminjaman', session()->get('peminjamanCode'))->first();
        $barang = [];
        foreach ($detailpeminjaman as $detail) {
            // Ambil data barang berdasarkan kode_barang
            $dataBarang = Barang::where('kode_barang', $detail->kode_barang)->first();

            if ($dataBarang) {
                $barang[] = [
                    'uuid' => $dataBarang->uuid,
                    'nama_barang' => $dataBarang->nama_barang,
                    'merk' => $dataBarang->merk,
                    'kode_barang' => $dataBarang->kode_barang,
                    'nomor_seri' => $dataBarang->nomor_seri,
                    'status' => $dataBarang->status,
                    // Tambahkan atribut lain sesuai kebutuhan
                ];
            }
        }
        $dataPeminjaman = [
            'nomor_peminjaman' => $peminjaman->nomor_surat,
            'tanggal_peminjaman' => $peminjaman->tanggal_peminjaman,
            'tanggal_kembali' => $peminjaman->tanggal_kembali,
            'peruntukan' => $peminjaman->peruntukan->uuid,
        ];
        session()->put('dataPeminjaman', $dataPeminjaman);
        session()->put('BarangData', $barang);
        return view('user.pengembalian.index', compact('peminjaman', 'barang'));
    }

    public function checkPeminjaman(Request $request)
    {
        $request->validate([
            'code' => 'required|string'
        ]);

        // Cari kode peminjaman di database
        $peminjaman = Peminjaman::where('kode_peminjaman', $request->code)->first();

        if ($peminjaman) {
            session()->put('peminjamanCode', $peminjaman->kode_peminjaman);
            return response()->json([
                'success' => true,
                'message' => 'Kode ditemukan, silakan lakukan pengembalian.',
            ], 200);
        }
        // Response jika kode tidak ditemukan
        return response()->json([
            'success' => false,
            'message' => 'Kode tidak ditemukan.'
        ], 404);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                '*.item_uuid' => 'required|string',
                '*.item_code' => 'required|string',
                '*.condition' => 'required|',
                '*.isChecked' => 'required|boolean',
            ]);

            // Proses data yang sudah valid
            $valData = $request->all();
            $dataPeminjaman = session('dataPeminjaman');
            Log::info($dataPeminjaman);

            // Simpan data Pengembalian
            $pengembalian = Pengembalian::create([
                'uuid' => Str::uuid(),
                'kode_pengembalian' => 'PG' . time(),
                'kode_peminjaman' => session('nomor_peminjaman'),
                'tanggal_kembali' => now(),
                'petugas' => 'admin',
                'peminjam' => 'uuid',
            ]);

            // Simpan data DetailPengembalian
            foreach ($valData as $item) {
                DetailPengembalian::create([
                    'uuid' => Str::uuid(),
                    'kode_detail_pengembalian' => 'DPG' . Str::random(8),
                    'kode_pengembalian' => $pengembalian->kode_pengembalian,
                    'kode_barang' => $item['item_code'],
                    'status' => $item['condition'],
                    'deskripsi' => $item['isChecked'] ? null : 'Barang Telah Dikembalikan',
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Data pengembalian berhasil disimpan',
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menyimpan data pengembalian',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function validateItem(Request $request)
    {
        $request->validate([
            'itemCode' => 'required|string'
        ]);

        $itemCode = $request->itemCode;
        $dataPeminjaman = session()->get('BarangData', []);
        $isExist = collect($dataPeminjaman)->contains(function ($item) use ($itemCode) {
            return $item['kode_barang'] === $itemCode;
        });

        if ($isExist) {
            // Response jika kode ditemukan
            return response()->json([
                'success' => true,
                'message' => 'Kode ditemukan,Validasi Berhasil.',
            ], 200);
        }

        // Response jika kode tidak ditemukan
        return response()->json([
            'success' => false,
            'message' => 'Gagal Validasi.'
        ], 404);
    }

    public function report(Request $request)
    {
        return view('user.laporan.pengembalian.index');
    }

    public function editDescription(Request $request) {}

    public function print(Request $request) {}
}
