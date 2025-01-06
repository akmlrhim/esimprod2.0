<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifiedPassword
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next): Response
	{

		$user = Auth::user();

		if ($user && ($user->role == 'admin' || $user->role == 'superadmin')) {
			if (!session()->has('passwordVerified') || session('passwordVerified') !== true) {
				return redirect()->back()->with('error', 'Silahkan masukkan password terlebih dahulu !');
			}
		}

		return $next($request);
	}
}
