<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class ProfileController extends Controller
{
	public function index()
	{
		$data['title'] = 'Profile';
		return view('admin.profile.index', $data);
	}

	public function editProfil()
	{
		$data['title'] = 'Ubah Profil';
		return view('admin.profile.edit-profil', $data);
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

			//kompres foto
			$manager = new ImageManager(new Driver());
			$image = $manager->read($file)->encodeByExtension(extension: $file->getClientOriginalExtension(), quality: 10);

			Storage::disk('public')->put('uploads/foto_user/' . $filename, $image);
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
		return redirect()->route('profil.index');
	}

	public function editPassword()
	{
		$data['title'] = 'Ubah Password';
		return view("admin.profile.edit-password", $data);
	}

	public function updatePassword(Request $request)
	{
		$request->validate(
			[
				'current_password' => 'required',
				'new_password' => 'required|min:8|confirmed',
			],
			[
				'current_password.required' => 'Password saat ini harus diisi.',
				'new_password.required' => 'Password baru harus diisi.',
				'new_password.min' => 'Password baru minimal 8 karakter.',
				'new_password.confirmed' => 'Password baru tidak cocok.',
			]
		);

		$user = Auth::user();

		if (!Hash::check($request->current_password, $user->password)) {
			return back()->with('notValid', 'Password saat ini salah.')->withInput();
		}

		if ($user instanceof User) {
			$user->password = Hash::make($request->new_password);
			$user->save();
		} else {
			notify()->error('User tidak ditemukan.');
			return redirect()->back();
		}

		notify()->success('Password berhasil diubah.');
		return redirect()->route('profil.index')->withInput();
	}
}
