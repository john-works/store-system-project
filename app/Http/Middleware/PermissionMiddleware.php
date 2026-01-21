<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    public function handle(Request $request, Closure $next, string $resource, string $action = 'view')
    {
        $user = Auth::user();

        if (!$user) {
            abort(401);
        }

        if ($user->role === 'admin') {
            return $next($request);
        }

        if (in_array($user->role, ['officer', 'senior_officer', 'manager']) &&
            $user->hasPermission($resource, $action)) {
            return $next($request);
        }

        abort(403);
    }
}
