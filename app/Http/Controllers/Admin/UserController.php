<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$currentUser = Auth::user();
		$query = User::query();

		if ($currentUser->role !== 'superadmin') {
			$query->whereIn('role', ['admin', 'user']);
		}

		$data = [
			'title' => 'User',
			'user' => $query->where('id', '!=', $currentUser->id)->paginate(10),
			// 'user' => User::paginate(10)
		];

		return view('admin.user.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$title = 'Tambah User';
		$jabatan = Jabatan::where('jabatan', '!=', 'Administrator')->get();

		return view('admin.user.create', compact('title', 'jabatan'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{

		$request->validate(
			[
				'nama_lengkap' => 'required',
				'email' => 'required|email|unique:users,email',
				'nomor_hp' => 'required|numeric',
				'role' => 'required',
				'jabatan_id' => 'required',
				'nip' => 'required|numeric|unique:users,nip',
				'foto' => 'nullable|file|mimes:jpg,jpeg,png',
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
				'nip.unique' => 'NIP sudah terdaftar.',
				'foto.mimes' => 'File harus dalam format jpg, jpeg, png.',
			]
		);

		$kode_user = 'USR' . random_int(1, 999999);
		$qrCode = QrCode::format('png')->size(200)->generate($kode_user);
		$qrCodeFilename = time() . '_qr.png';
		Storage::disk('public')->put('uploads/qr_codes_user/' . $qrCodeFilename, $qrCode);


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
			'foto' => NULL,
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
			'jabatan' => Jabatan::where('jabatan', '!=', 'Administrator')->get(['id', 'jabatan'])
		];
		return view('admin.user.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $uuid)
	{
		$request->validate(
			[
				'nama_lengkap' => 'required',
				'email' => 'required|email',
				'nomor_hp' => 'required|numeric',
				'role' => 'required',
				'jabatan_id' => 'required',
				'nip' => 'required|numeric',
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
			]
		);

		$user = User::where('uuid', $uuid)->firstOrFail();

		$filename = $user->foto;
		if ($request->hasFile('foto')) {
			if ($user->foto && $user->foto !== 'default.jpeg') {
				Storage::disk('public')->delete('uploads/foto_user/' . $user->foto);
			}
			$file = $request->file('foto');
			$filename = $user->foto ?? time() . '.' . $file->getClientOriginalExtension();
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
		$currentUser = Auth::user();
		$title = 'User';
		$role = $request->role;
		$jabatan = Jabatan::get(['id', 'jabatan']);

		if ($role) {
			$user = User::where('role', $role)->where('id', '!=', $currentUser->id)->paginate(5);
		} else {
			$user = User::paginate(5);
		}

		$user = $user->appends(['role' => $role]);


		return view('admin.user.index', compact('user', 'title', 'role', 'jabatan'));
	}

	public function filterByJabatan(Request $request)
	{
		$currentUser = Auth::user();
		$title = 'User';
		$jabatanId = $request->id;

		if ($jabatanId) {
			$user = User::where('jabatan_id', $jabatanId)->where('id', '!=', $currentUser->id)->paginate(5);
		} else {
			$user = User::paginate(5);
		}

		$jabatan = Jabatan::get(['id', 'jabatan']);

		$user->appends(['id' => $jabatanId]);

		return view('admin.user.index', compact('title', 'user', 'jabatan'));
	}


	public function search(Request $request)
	{
		$currentUser = Auth::user();
		$search = $request->search;

		$user = User::where('nama_lengkap', 'like', '%' . $search . '%')
			->where('id', '!=', $currentUser->id)
			->paginate(5)
			->appends(['search' => $search]);

		$data = [
			'title' => 'User',
			'user' => $user,
			'jabatan' => Jabatan::get(),
		];

		return view('admin.user.index', $data);
	}

	public function printIDCard($uuid)
	{
		$user = User::where('uuid', $uuid)->first();
		if (!$user) {
			notify()->error('User tidak ditemukan !');
			return redirect()->back();
		}
		$pdf = Pdf::loadView('admin.user.id-card', ['user' => $user])->setPaper('A4', 'portrait');
		return $pdf->stream('ID-Card-' . $user->nama_lengkap . '-' . time() . '.pdf');
	}

	public function log(string $uuid)
	{
		$user = User::where('uuid', $uuid)->first();
		$title = 'Log User';

		$logs = $user->logs()->orderBy('created_at', 'desc')->paginate(10);

		return view('admin.user.log', compact('title', 'logs'));
	}
}
