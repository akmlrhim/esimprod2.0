<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jabatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Jabatan',
            'jabatan' => Jabatan::paginate(5)
        ];

        return view('admin.jabatan.index', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jabatan' => 'required|unique:jabatan,jabatan'
        ], [
            'jabatan.required' => 'Jabatan harus diisi',
            'jabatan.unique' => 'Jabatan sudah ada',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('showModal', true);
        }

        Jabatan::create([
            'uuid' => Str::uuid(),
            'jabatan' => $request->jabatan
        ]);

        notify()->success('Data Berhasil Disimpan');
        return redirect()->route('jabatan.index');
    }

    public function edit(string $uuid)
    {
        $jabatan = Jabatan::where('uuid', $uuid)->firstOrFail();
        return response()->json($jabatan);
    }

    public function update(Request $request, string $uuid)
    {
        $validator = Validator::make($request->all(), [
            'jabatan' => 'required'
        ], [
            'jabatan.required' => 'Jabatan harus diisi',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }

        $data = $request->except(['_token', '_method']);

        Jabatan::where('uuid', $uuid)->update($data);
        notify()->success('Data Berhasil Diperbarui');
        return response()->json(['success' => true]);
    }

    public function destroy(string $uuid)
    {
        $jabatan = Jabatan::where('uuid', $uuid)->first();

        if ($jabatan) {
            $isRelate = User::where('jabatan_id', $jabatan->id)->first();

            if ($isRelate) {
                notify()->error('Jabatan ini tidak dapat dihapus karena masih digunakan pada data user lainnya.');
                return redirect()->route('jabatan.index');
            } else {
                Jabatan::where('uuid', $uuid)->delete();
                notify()->success('Data Berhasil Dihapus');
                return redirect()->route('jabatan.index');
            }
        }
    }
}
