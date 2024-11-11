<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.index');
    }

    public function indexv2()
    {
        return view('auth.login-v2');
    }

    public function password()
    {
        return view("auth.password-adm");
    }

    public function loginProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_user' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('kode_user', $request->kode_user)->first();

        if ($user) {
            Auth::login($user);

            //redirect
            if ($user->role == 'admin' || $user->role == 'superadmin') {
                notify()->success('Login Berhasil');
                return redirect()->route('password');
            } elseif ($user->role == 'user') {
                notify()->success('Login Berhasil');
                return redirect()->route('options');
            }
        }

        notify()->error('Login Gagal');
        return redirect()->back();
    }

    public function passwordValidation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        if ($user && ($user->role == 'admin' || $user->role == 'superadmin')) {
            if (Hash::check($request->password, $user->password)) {
                notify()->success('Login Berhasil');
                return redirect()->route('dashboard.index');
            } else {
                return redirect()->back()->withErrors(['notValid' => 'Password tidak valid.']);
            }
        }

        notify()->error('Akses tidak sah atau sesi telah berakhir.');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout Berhasil');
    }
}
