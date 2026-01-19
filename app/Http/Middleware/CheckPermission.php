<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $resource
     * @param  string|null  $action
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $resource, string $action = null)
    {
        $user = Auth::user();

        // If user is admin, allow everything
        if ($user && $user->role === 'admin') {
            return $next($request);
        }

        // Check permission
        if ($user && $user->hasPermission($resource, $action ?? 'view')) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
