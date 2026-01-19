<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
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
    public function handle(Request $request, Closure $next, $resource, $action = null)
    {
        $user = Auth::user();

        // Check if user is logged in
        if (!$user) {
            abort(403, 'Unauthorized');
        }

        // If user is admin, allow everything
        if (method_exists($user, 'isAdmin') && $user->isAdmin()) {
            return $next($request);
        }

        // If action is not provided, default to 'view'
        if (!$action) {
            $action = 'view';
        }

        // Check permission on the user model
        if (!method_exists($user, 'hasPermission') || !$user->hasPermission($resource, $action)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
