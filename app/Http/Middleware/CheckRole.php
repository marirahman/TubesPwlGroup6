<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
{
    if (auth()->user()->role !== $role && auth()->user()->role !== 'owner') {
        return redirect()->route('home')->with('error', 'You do not have access to this page');
    }

    return $next($request);
}

    
}