<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $allowedRoles = explode(',', $roles);

        // If user has the required role, allow
        if (in_array($user->role, $allowedRoles)) {
            return $next($request);
        }

        // If user is admin, allow
        if ($user->role === 'admin') {
            return $next($request);
        }

        // Check permissions
        $routeName = $request->route()->getName();
        if ($routeName) {
            $parts = explode('.', $routeName);
            if (count($parts) >= 2) {
                $resource = $parts[0];
                $action = $parts[1];
                $permission = \App\Models\Permission::where('user_id', $user->id)
                    ->where('resource', $resource)
                    ->where('action', $action)
                    ->where('allowed', true)
                    ->first();
                if ($permission) {
                    return $next($request);
                }
            }
        }

        abort(403, 'Unauthorized');
    }
}
