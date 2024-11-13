<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return view('admin.user.create', compact('title'));
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
                'password' => 'required|min:8',
                'role' => 'required',
                'jabatan' => 'required',
                'nip' => 'required|numeric',
                'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'nama_lengkap.required' => 'Nama Lengkap wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Email tidak valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'role.required' => 'Role wajib diisi.',
                'jabatan.required' => 'Jabatan wajib diisi.',
                'nip.required' => 'NIP wajib diisi.',
                'nip.numeric' => 'NIP harus berupa angka.',
                'foto.mimes' => 'File harus dalam format jpg, jpeg, png.',
                'foto.max' => 'Ukuran file maksimal adalah 2MB.',
                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal 8 karakter.',
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

        User::create([
            'uuid' => Str::random(16),
            'kode_user' => $kode_user,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jabatan' => $request->jabatan,
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

        if ($role) {
            $user = User::where('role', $role)->paginate(5);
        } else {
            $user = User::paginate(5);
        }

        $user = $user->appends(['role' => $role]);


        return view('admin.user.index', compact('user', 'title', 'role'));
    }
}
