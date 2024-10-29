<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\JenisBarang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisBarangController extends Controller
{

    protected $jenisBarang;
    public function __construct(JenisBarang $jenisBarang)
    {
        $this->jenisBarang = $jenisBarang;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = [
            'title' => 'Jenis Barang',
            'jenis_barang' => $this->jenisBarang->all(),
=======
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Jenis Barang',
>>>>>>> 1f47649 (fix)
        ];

        return view('jenis_barang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
<<<<<<< HEAD
    public function create() {}
=======
    public function create()
    {
        //
    }
>>>>>>> 1f47649 (fix)

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $validator = Validator::make($request->all(), [
            'kode_jenis_barang' => 'required|string|unique:jenis_barang,kode_jenis_barang', // Pastikan ini menggunakan nama kolom yang benar
            'jenis_barang' => 'required|string|unique:jenis_barang,jenis_barang',
        ], [
            'kode_jenis_barang.required' => 'Kode Barang harus diisi',
            'kode_jenis_barang.unique' => 'Kode Barang sudah ada',
            'kode_jenis_barang.string' => 'Kode Barang harus berupa string',
            'jenis_barang.required' => 'Jenis Barang harus diisi',
            'jenis_barang.unique' => 'Jenis Barang sudah ada',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('showModal', true);
        }

        $this->jenisBarang->create([
            'uuid' => Str::random(10),
            'kode_jenis_barang' => $request->kode_jenis_barang,
            'jenis_barang' => $request->jenis_barang,
        ]);

        notify()->success('Data Berhasil Disimpan');
        return redirect()->route('jenis_barang.index');
    }


=======
        //
    }

>>>>>>> 1f47649 (fix)
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
<<<<<<< HEAD
    public function edit(string $uuid)
    {
        $jenisBarang = $this->jenisBarang->where('uuid', $uuid)->firstOrFail();
        return response()->json($jenisBarang);
=======
    public function edit(string $id)
    {
        //
>>>>>>> 1f47649 (fix)
    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<< HEAD
    public function update(Request $request, string $uuid)
    {
        $validator = Validator::make($request->all(), [
            'kode_jenis_barang' => 'required|string',
            'jenis_barang' => 'required',
        ], [
            'kode_jenis_barang.required' => 'Kode Barang harus diisi',
            'kode_jenis_barang.string' => 'Kode Barang harus berupa string',
            'jenis_barang.required' => 'Jenis Barang harus diisi',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }

        $data = $request->except(['_token', '_method']);

        $this->jenisBarang->where('uuid', $uuid)->update($data);
        notify()->success('Data Berhasil Diperbarui');
        return response()->json(['success' => true]);
=======
    public function update(Request $request, string $id)
    {
        //
>>>>>>> 1f47649 (fix)
    }

    /**
     * Remove the specified resource from storage.
     */
<<<<<<< HEAD
    public function destroy(Request $request)
    {
        $uuid = $request->uuid;
        $this->jenisBarang->where('uuid', $uuid)->delete();

        notify()->success('Data Berhasil Dihapus');
        return redirect()->route('jenis_barang.index');
=======
    public function destroy(string $id)
    {
        //
>>>>>>> 1f47649 (fix)
    }
}
