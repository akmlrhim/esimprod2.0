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
            'peruntukan' => Peruntukan::all(),
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
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Peruntukan::create([
            'uuid ' => Str::uuid(),
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

    public function update(Request $request, string $uuid) {}
}
