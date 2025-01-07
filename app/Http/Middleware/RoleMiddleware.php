<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Debug nilai role
        dd(Auth::user()->role);

        if (!Auth::check()) {
            return redirect('/'); // Redirect jika tidak login
        }

        $user = Auth::user();

        // Validasi peran pengguna
        if (!in_array($user->role, $roles)) {
            abort(403, 'Unauthorized action.'); // Tampilkan 403 jika tidak punya izin
        }

        return $next($request);
    }
}
