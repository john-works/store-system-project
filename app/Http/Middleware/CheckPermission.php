<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\PermissionService;

class CheckPermission
{
    /**
     * Permission service instance
     */
    protected PermissionService $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $resource, string $action = 'index')
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

        // ✅ Allowed roles (but permissions must exist in database)
        $allowedRoles = ['officer', 'senior_officer', 'manager'];

        if (in_array($user->role, $allowedRoles)) {
            // ✅ Use PermissionService with caching
            if ($this->permissionService->hasPermission($user, $resource, $action)) {
                return $next($request);
            }

            abort(403, 'Permission not granted.');
        }

        // ❌ Any other role is blocked
        abort(403, 'Unauthorized role.');
    }
}
