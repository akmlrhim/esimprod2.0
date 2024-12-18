<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\JenisBarang;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Barang',
            'barang' => Barang::where('sisa_limit', '>', 0)
                ->orderBy('created_at', 'DESC')
                ->paginate(5),
        ];

        return view('admin.barang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Barang',
            'jenis_barang' => JenisBarang::all()
        ];

        return view('admin.barang.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|unique:barang,nama_barang',
            'merk' => 'required',
            'nomor_seri' => 'required',
            'jenis_barang_id' => 'required|exists:jenis_barang,id',
            'limit' => 'required|numeric',
            'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nama_barang.required' => 'Nama barang wajib diisi.',
            'nama_barang.unique' => 'Nama barang sudah ada.',
            'merk.required' => 'Merk wajib diisi.',
            'nomor_seri.required' => 'Nomor Seri wajib diisi.',
            'jenis_barang_id.required' => 'Jenis Barang wajib diisi.',
            'jenis_barang_id.exists' => 'Jenis barang tidak ditemukan.',
            'limit.required' => 'Limit wajib diisi.',
            'limit.numeric' => 'Limit harus berupa angka.',
            'foto.mimes' => 'File harus dalam format jpg, jpeg, png.',
            'foto.max' => 'Ukuran file maksimal adalah 2MB.',
        ]);

        $kode_barang = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 12);
        $qrCode = QrCode::format('png')->size(200)->generate($kode_barang);
        $qrCodeFileName = time() . '_qr.png';
        Storage::disk('public')->put('uploads/qr_codes_barang/' . $qrCodeFileName, $qrCode);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads/foto_barang', $filename, 'public');
            $data['foto'] = $filename;
        } else {
            $data['foto'] = 'default.jpg';
        }

        Barang::create([
            'uuid' => Str::uuid(),
            'kode_barang' => $kode_barang,
            'nama_barang' => $request->nama_barang,
            'nomor_seri' => $request->nomor_seri,
            'merk' => $request->merk,
            'jenis_barang_id' => $request->jenis_barang_id,
            'status' => $request->limit == 0 ? 'tidak-tersedia' : 'tersedia',
            'limit' => $request->limit,
            'sisa_limit' => $request->limit,
            'foto' => $data['foto'],
            'deskripsi' => $request->deskripsi,
            'qr_code' => $qrCodeFileName,
        ]);

        notify()->success('Barang Berhasil Ditambahkan');
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        $data = [
            'title' => 'Detail Barang',
            'barang' => Barang::where('uuid', $uuid)->first(),
        ];

        return view('admin.barang.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $data = [
            'title' => 'Edit Barang',
            'barang' => Barang::where('uuid', $uuid)->first(),
            'jenis_barang' => JenisBarang::all()
        ];

        return view('admin.barang.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        $request->validate([
            'nama_barang' => 'required',
            'nomor_seri' => 'required',
            'merk' => 'required',
            'jenis_barang_id' => 'required|exists:jenis_barang,id',
            'limit' => 'required|numeric',
            'sisa_limit' => 'required|numeric',
            'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nama_barang.required' => 'Nama barang wajib diisi.',
            'nomor_seri.required' => 'Nomor Seri wajib diisi.',
            'merk.required' => 'Merk wajib diisi.',
            'jenis_barang_id.required' => 'Jenis Barang wajib diisi.',
            'jenis_barang_id.exists' => 'Jenis barang tidak ditemukan.',
            'limit.required' => 'Limit wajib diisi.',
            'limit.numeric' => 'Limit harus berupa angka.',
            'sisa_limit.required' => 'Sisa Limit wajib diisi.',
            'sisa_limit.numeric' => 'Sisa Limit harus berupa angka.',
            'foto.mimes' => 'File harus dalam format jpg, jpeg, png.',
            'foto.max' => 'Ukuran file maksimal adalah 2MB.',
        ]);

        $barang = Barang::where('uuid', $uuid)->firstOrFail();

        $filename = $barang->foto;
        if ($request->hasFile('foto')) {
            if ($barang->foto && $barang->foto !== 'default.jpg') {
                Storage::disk('public')->delete('uploads/foto_barang/' . $barang->foto);
            }

            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads/foto_barang', $filename, 'public');
        }

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'nomor_seri' => $request->nomor_seri,
            'merk' => $request->merk,
            'jenis_barang_id' => $request->jenis_barang_id,
            'status' => $request->sisa_limit == 0 ? 'tidak-tersedia' : 'tersedia',
            'limit' => $request->limit,
            'sisa_limit' => $request->sisa_limit,
            'deskripsi' => $request->deskripsi,
            'foto' => $filename,
        ]);

        notify()->success('Barang Berhasil Diupdate');
        return redirect()->route('barang.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $barang = Barang::where('uuid', $uuid)->first();
        if ($barang) {

            if ($barang->qr_code) {
                Storage::disk('public')->delete('uploads/qr_codes_barang/' . $barang->qr_code);
            }

            if ($barang->foto && $barang->foto !== 'default.jpg') {
                Storage::disk('public')->delete('uploads/foto_barang/' . $barang->foto);
            }

            $barang->delete();
            notify()->success('Barang Berhasil Dihapus');
            return redirect()->route('barang.index');
        }
    }

    public function printBarang()
    {
        $data['barang'] = Barang::get();

        if ($data['barang']->isEmpty()) {
            notify()->error('Barang tidak ditemukan');
            return redirect()->route('barang.index');
        }

        $pdf = Pdf::loadView('admin.barang.barang_pdf', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('Barang-' . time() . '.pdf');
    }

    public function printQrCode()
    {
        $data['barang'] = Barang::all();

        if ($data['barang']->isEmpty()) {
            notify()->error('Barang tidak ditemukan');
            return redirect()->route('barang.index');
        }

        $pdf = Pdf::loadView('admin.barang.qrcode_pdf', $data)->setPaper('a4', 'potrait');
        return $pdf->stream('QRCode-Barang-' . time() . '.pdf');
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $barang = Barang::where('nama_barang', 'like', '%' . $search . '%')
            ->orWhereHas('jenisBarang', function ($q) use ($search) {
                $q->where('jenis_barang', 'like', '%' . $search . '%');
            })->paginate(5)
            ->appends(['search' => $search]);

        $data = [
            'title' => 'Barang',
            'barang' => $barang,
        ];

        return view('admin.barang.index', $data);
    }

    public function jenisBarang(JenisBarang $jenisBarang)
    {
        $barang = $jenisBarang->barang()->with('jenisBarang')->paginate(5);

        $data = [
            'title' => 'Jenis Barang : ' . $jenisBarang->jenis_barang,
            'barang' => $barang,
            'count' => $barang->count()
        ];
        return view('admin.barang.index', $data);
    }
}
