<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $resource, string $action = 'view')
    {
        $user = Auth::user();

        // ❌ Not logged in
        if (!$user) {
            abort(401, 'Unauthenticated.');
        }

        // ✅ Admin bypasses ALL permission checks
        if ($user->role === 'admin') {
            return $next($request);
        }

        // ✅ Allowed roles (but permissions must exist)
        $allowedRoles = ['officer', 'senior_officer', 'manager'];

        if (in_array($user->role, $allowedRoles)) {

            // Check DB permission granted by admin
            if ($user->hasPermission($resource, $action)) {
                return $next($request);
            }

            abort(403, 'Permission not granted.');
        }

        // ❌ Any other role is blocked
        abort(403, 'Unauthorized role.');
    }
}
