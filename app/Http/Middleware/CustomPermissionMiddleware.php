<?php

namespace App\Http\Middleware;

use Closure;

class CustomPermissionMiddleware
{
    public function handle($request, Closure $next, $permission)
    {
        \Log::info("Permission middleware triggered: {$permission}");

        if (auth()->guest() || ! auth()->user()->can($permission)) {
            abort(403);
        }

        return $next($request);
    }
}
