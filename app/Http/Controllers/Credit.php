<?php

namespace App\Http\Controllers;

use App\Models\CreditModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Credit extends Controller
{
    protected $creditModel;

    public function __construct()
    {
        $this->creditModel = new CreditModel();
    }

    public function index()
    {
        $data = [
            'credit' => $this->creditModel->all(),
            'title' => 'Credit',
        ];
        return view('credit.index', $data);
    }

    public function edit($uuid)
    {
        $credit = $this->creditModel->where('uuid', $uuid)->firstOrFail();
        return response()->json($credit);
    }

    public function update(Request $request, $uuid)
    {
        $request->validate([
            'project_leader' => 'required|string',
            'system_analyst' => 'required|string',
            'frontend_developer' => 'required|string',
            'backend_developer' => 'required|string',
            'uiux_designer' => 'required|string',
            'administrator_contact' => 'required|string',
            'guidebook' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $data = $request->except(['_token', '_method', 'guidebook']);

        if ($request->hasFile('guidebook')) {
            $file = $request->file('guidebook');
            $randomName = Str::random(16) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads/guidebooks', $randomName, 'public');
            $data['guidebook'] = $randomName;
        }

        $this->creditModel->where('uuid', $uuid)->update($data);

        return response()->json(['success' => true, 'message' => 'Update Berhasil !']);
    }


    public function guidebook($uuid)
    {
        $credit = $this->creditModel->where('uuid', $uuid)->firstOrFail();

        $data = [
            'title' => 'Guidebook',
            'fileUrl' => $credit->guidebook ? asset('storage/uploads/guidebooks/' . $credit->guidebook) : null
        ];
        return view('credit.guidebook', $data);
    }
}
