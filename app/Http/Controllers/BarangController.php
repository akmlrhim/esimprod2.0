<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\JenisBarang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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
            'barang' => Barang::all(),
        ];

        return view('barang.index', $data);
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

        return view('barang.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'jenis_barang_id' => 'required',
            'status' => 'required',
            'limit' => 'required|numeric',
            'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nama_barang.required' => 'Nama barang wajib diisi.',
            'jenis_barang_id.required' => 'Jenis Barang wajib diisi.',
            'status.required' => 'Status wajib diisi.',
            'limit.required' => 'Limit wajib diisi.',
            'limit.numeric' => 'Limit harus berupa angka.',
            'foto.mimes' => 'File harus dalam format jpg, jpeg, png.',
            'foto.max' => 'Ukuran file maksimal adalah 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $uuid = Str::random(10);
        $qrCode = QrCode::format('png')->size(200)->generate($uuid);
        $qrCodeFileName = time() . '_qr.png';
        Storage::disk('public')->put('uploads/qr_codes/' . $qrCodeFileName, $qrCode);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $randomName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads/foto_barang', $randomName, 'public');
            $data['foto'] = $randomName;
        }
        Barang::create([
            'uuid' => $uuid,
            'nama_barang' => $request->nama_barang,
            'jenis_barang_id' => $request->jenis_barang_id,
            'status' => $request->status,
            'limit' => $request->limit,
            'sisa_limit' => $request->limit,
            'foto' => $data['foto'] ?? null,
            'qr_code' => $qrCodeFileName,
        ]);

        notify()->success('Barang Berhasil Ditambahkan');
        return redirect()->route('barang.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
