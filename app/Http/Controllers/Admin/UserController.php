<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'User',
            'jabatan' => Jabatan::get(['id', 'jabatan']),
            'user' => User::where('id', '!=', Auth::id())->paginate(5),
        ];
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah User';
        $jabatan = Jabatan::get(['id', 'jabatan']);
        return view('admin.user.create', compact('title', 'jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama_lengkap' => 'required',
                'email' => 'required|email|unique:users,email',
                'nomor_hp' => 'required|numeric',
                'role' => 'required',
                'jabatan_id' => 'required',
                'nip' => 'required|numeric',
                'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'nama_lengkap.required' => 'Nama Lengkap wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Email tidak valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'nomor_hp.required' => 'Nomor HP wajib diisi.',
                'nomor_hp.numeric' => 'Nomor HP harus berupa angka.',
                'role.required' => 'Role wajib diisi.',
                'jabatan_id.required' => 'Jabatan wajib diisi.',
                'nip.required' => 'NIP wajib diisi.',
                'nip.numeric' => 'NIP harus berupa angka.',
                'foto.mimes' => 'File harus dalam format jpg, jpeg, png.',
                'foto.max' => 'Ukuran file maksimal adalah 2MB.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $kode_user = 'USR' . random_int(1, 999999);
        $qrCode = QrCode::format('png')->size(200)->generate($kode_user);
        $qrCodeFilename = time() . '_qr.png';
        Storage::disk('public')->put('uploads/qr_codes_user/' . $qrCodeFilename, $qrCode);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads/foto_user', $filename, 'public');
            $data['foto'] = $filename;
        } else {
            $data['foto'] = 'default.jpeg';
        }

        $password = in_array($request->role, ['admin', 'superadmin'])
            ? Hash::make($request->password)
            : null;

        User::create([
            'uuid' => Str::uuid(),
            'kode_user' => $kode_user,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => $password,
            'jabatan_id' => $request->jabatan_id,
            'nomor_hp' => $request->nomor_hp,
            'nip' => $request->nip,
            'role' => $request->role,
            'qr_code' => $qrCodeFilename,
            'foto' => $data['foto'],
        ]);

        notify()->success('User Berhasil Ditambahkan');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        $data = [
            'title' => 'Detail User',
            'user' => User::where('uuid', $uuid)->first(),
        ];

        return view('admin.user.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $data = [
            'title' => 'Edit User',
            'user' => User::where('uuid', $uuid)->first(),
            'jabatan' => Jabatan::get(['id', 'jabatan']),
        ];
        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $uuid)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama_lengkap' => 'required',
                'email' => 'required|email',
                'nomor_hp' => 'required|numeric',
                'role' => 'required',
                'jabatan_id' => 'required',
                'nip' => 'required|numeric',
                'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'nama_lengkap.required' => 'Nama Lengkap wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Email tidak valid.',
                'nomor_hp.required' => 'Nomor HP wajib diisi.',
                'nomor_hp.numeric' => 'Nomor HP harus berupa angka.',
                'role.required' => 'Role wajib diisi.',
                'jabatan_id.required' => 'Jabatan wajib diisi.',
                'nip.required' => 'NIP wajib diisi.',
                'nip.numeric' => 'NIP harus berupa angka.',
                'foto.mimes' => 'File harus dalam format jpg, jpeg, png.',
                'foto.max' => 'Ukuran file maksimal adalah 2MB.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('uuid', $uuid)->firstOrFail();

        $filename = $user->foto;
        if ($request->hasFile('foto')) {
            if ($user->foto && $user->foto !== 'default.jpeg') {
                Storage::disk('public')->delete('uploads/foto_user/' . $user->foto);
            }
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads/foto_user', $filename, 'public');
        }

        $user->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'role' => $request->role,
            'jabatan_id' => $request->jabatan_id,
            'nip' => $request->nip,
            'foto' => $filename
        ]);

        notify()->success('User Berhasil Diupdate');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $user = User::where('uuid', $uuid)->first();
        if ($user) {
            if ($user->qr_code) {
                Storage::disk('public')->delete('uploads/qr_codes/' . $user->qr_code);
            }

            if ($user->foto && $user->foto !== 'default.jpeg') {
                Storage::disk('public')->delete('uploads/foto_user/' . $user->foto);
            }

            $user->delete();
            notify()->success('user Berhasil Dihapus');
            return redirect()->route('users.index');
        }
    }

    public function filterByRole(Request $request)
    {
        $title = 'User';
        $role = $request->role;
        $jabatan = Jabatan::get(['id', 'jabatan']);

        if ($role) {
            $user = User::where('role', $role)->paginate(5);
        } else {
            $user = User::paginate(5);
        }

        $user = $user->appends(['role' => $role]);


        return view('admin.user.index', compact('user', 'title', 'role', 'jabatan'));
    }

    public function filterByJabatan(Request $request)
    {
        $title = 'User';
        $jabatanId = $request->id;

        if ($jabatanId) {
            $user = User::where('jabatan_id', $jabatanId)->paginate(5);
        } else {
            $user = User::paginate(5);
        }

        $jabatan = Jabatan::get(['id', 'jabatan']);

        $user->appends(['id' => $jabatanId]);

        return view('admin.user.index', compact('title', 'user', 'jabatan'));
    }


    public function search(Request $request)
    {
        $search = $request->search;

        $user = User::where('nama_lengkap', 'like', '%' . $search . '%')
            ->paginate(5)
            ->appends(['search' => $search]);

        $data = [
            'title' => 'User',
            'user' => $user,
            'jabatan' => Jabatan::get(['id', 'jabatan']),
        ];

        return view('admin.user.index', $data);
    }
}
