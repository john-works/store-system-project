<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PermissionMiddleware
{
    public function handle(Request $request, Closure $next, $resource, $action)
    {
        if (!auth()->check() || !auth()->user()->hasPermission($resource, $action)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
