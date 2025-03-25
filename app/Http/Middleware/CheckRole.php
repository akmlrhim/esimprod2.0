<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next, ...$roles)
	{
		if (!empty($roles) && !in_array(Auth::user()->role, $roles)) {
			if ($request->expectsJson()) {
				return response()->json([
					'status' => 'error',
					'message' => 'Access denied. You do not have permission to access this page.',
				], 403);
			}

			notify()->error('Anda tidak memiliki akses ke halaman ini!');
			return redirect()->back();
		}

		return $next($request);
	}
}
