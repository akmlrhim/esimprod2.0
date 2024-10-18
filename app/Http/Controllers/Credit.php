<?php

namespace App\Http\Controllers;

use App\Models\CreditModel;

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
        $data = [
            'credit' => $this->creditModel->first(),
            'title' => 'Edit Credit',
        ];
        return view('credit.edit', $data);
    }

    public function update($uuid)
    {
        $data = [
            'project_leader' => request('project_leader'),
            'system_analyst' => request('system_analyst'),
            'frontend_developer' => request('frontend_developer'),
            'backend_developer' => request('backend_developer'),
            'ui/ux_designer' => request('ui/ux_designer'),
            'administrator_contact' => request('administrator_contact'),
            'guidebook' => request('guidebook'),
            'updated_at' => now(),
        ];
        $this->creditModel->where('uuid', $uuid)->update($data);
        return redirect()->route('credit.index')->with('success', 'Credit updated successfully');
    }
}
