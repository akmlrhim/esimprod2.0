<?php

namespace App\Http\Controllers\Admin;

use App\Models\Peruntukan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PeruntukanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Peruntukan',
            'peruntukan' => Peruntukan::paginate(5)
        ];
        return view('admin.peruntukan.index', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'peruntukan' => 'required|unique:peruntukan,peruntukan'
        ], [
            'peruntukan.required' => 'Peruntukan harus diisi',
            'peruntukan.unique' => 'Peruntukan sudah ada',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('showModal', true);
        }

        Peruntukan::create([
            'uuid' => Str::uuid(),
            'peruntukan' => $request->peruntukan
        ]);

        notify()->success('Data Berhasil Disimpan');
        return redirect()->route('peruntukan.index');
    }

    public function edit(string $uuid)
    {
        $data = Peruntukan::where('uuid', $uuid)->firstOrFail();
        return response()->json($data);
    }

    public function update(Request $request, string $uuid)
    {
        $validator = Validator::make($request->all(), [
            'peruntukan' => 'required'
        ], [
            'peruntukan.required' => 'Peruntukan harus diisi',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }

        $data = $request->except(['_token', '_method']);

        Peruntukan::where('uuid', $uuid)->update($data);
        notify()->success('Data Berhasil Diperbarui');
        return response()->json(['success' => true]);
    }

    public function destroy(string $uuid)
    {
        Peruntukan::where('uuid', $uuid)->delete();

        notify()->success('Data Berhasil Dihapus');
        return redirect()->route('peruntukan.index');
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $peruntukan = Peruntukan::where('peruntukan', 'like', '%' . $search . '%')
            ->paginate(5)
            ->appends(['search' => $search]);

        $data = [
            'title' => 'Peruntukan',
            'peruntukan' => $peruntukan,
        ];

        return view('admin.peruntukan.index', $data);
    }
}
