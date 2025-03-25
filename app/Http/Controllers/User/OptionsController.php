<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OptionsController extends Controller
{
	public function index()
	{
		if (session()->has('kodePeminjaman')) {
			session()->forget('kodePeminjaman');
		}
		if (session()->has('kodePengembalian')) {
			session()->forget('kodePengembalian');
		}
		session()->forget(['dataPeminjaman', 'BarangData']);

		return view('user.options');
	}

	public function profil()
	{
		$title = 'Profil';
		return view('user.profil', compact('title'));
	}

	public function updateProfil(Request $request)
	{
		$request->validate(
			[
				'nama_lengkap' => 'required',
				'email' => 'required|email|unique:users,email,' . Auth::id(),
				'nip' => 'required|numeric|unique:users,nip,' . Auth::id(),
				'nomor_hp' => 'required|numeric|unique:users,nomor_hp,' . Auth::id(),
				'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
			],
			[
				'nama_lengkap.required' => 'Nama lengkap harus diisi.',
				'email.required' => 'Email harus diisi.',
				'email.email' => 'Format email tidak valid.',
				'email.unique' => 'Email sudah digunakan oleh user lain.',
				'nip.required' => 'NIP harus diisi.',
				'nip.numeric' => 'NIP harus berupa angka.',
				'nip.unique' => 'NIP sudah digunakan oleh user lain.',
				'nomor_hp.required' => 'Nomor HP harus diisi.',
				'nomor_hp.numeric' => 'Nomor HP harus berupa angka.',
				'nomor_hp.unique' => 'Nomor HP sudah digunakan oleh user lain.',
				'foto.file' => 'Foto harus berupa file.',
				'foto.mimes' => 'Format foto harus berupa jpg, jpeg, atau png.',
				'foto.max' => 'Ukuran foto tidak boleh lebih dari 2MB.',
			]
		);

		$user = Auth::user();

		if ($request->hasFile('foto')) {
			if ($user->foto && $user->foto !== 'default.jpeg') {
				Storage::disk('public')->delete('uploads/foto_user/' . $user->foto);
			}
			$file = $request->file('foto');
			$filename = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('uploads/foto_user', $filename, 'public');
			$data_foto = $filename;
		} else {
			$data_foto = $user->foto ?? 'default.jpeg';
		}

		if ($user instanceof User) {
			$user->nama_lengkap = $request->nama_lengkap;
			$user->email = $request->email;
			$user->nip = $request->nip;
			$user->nomor_hp = $request->nomor_hp;
			$user->foto = $data_foto;
			$user->save();
		} else {
			notify()->error('User tidak ditemukan.');
			return redirect()->back();
		}

		notify()->success('Profil berhasil diubah.');
		return redirect()->route('user.option');
	}
}
