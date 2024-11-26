<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
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
            return redirect()->back()->withInput()->with('error', 'Kolom input tidak boleh kosong !');
        }

        $user = User::where('kode_user', $request->kode_user)->first();

        if ($user) {
            Auth::login($user);

            //redirect
            if ($user->role == 'admin' || $user->role == 'superadmin') {
                return redirect()->route('password')->with('success', 'Berhasil, silahkan isi password anda');
            } elseif ($user->role == 'user') {
                notify()->success('Login Berhasil');
                return redirect()->route('options')
                    ->with('success', 'Berhasil login, silahkan pilih apakah anda ingin meminjam atau mengembalikan ?');
            }
        }

        return redirect()->back()->with('error', 'Kode user tidak terdaftar !');
    }

    public function passwordValidation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
        ], [
            'password.required' => 'Password harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Password tidak boleh kosong');
        }

        $user = Auth::user();
        if ($user && ($user->role == 'admin' || $user->role == 'superadmin')) {
            if (Hash::check($request->password, $user->password)) {
                notify()->success('Login Berhasil');
                return redirect()->route('dashboard.index');
            } else {
                return redirect()->back()->with('error', 'Password tidak valid !');
            }
        }

        return redirect()->back()->with('error', 'Akses tidak sah atau sesi telah berakhir.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout Berhasil');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function forgotPasswordProcess(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(string $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPasswordProcess(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
