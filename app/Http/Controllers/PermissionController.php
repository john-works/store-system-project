<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use App\Services\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected PermissionService $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }
    public function index()
    {
        $permissions = Permission::with('user')
            ->get()
            ->groupBy('user_id');

        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        $users = User::all();
        
        // ✅ Load from config instead of hardcoding
        $resources = config('permissions.resources');
        $actions = config('permissions.actions');

        return view('permissions.create', compact('users', 'resources', 'actions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'  => 'required|exists:users,id',
            'resource' => 'required|string',
            'actions'  => 'required|array',
        ]);

        foreach ($request->actions as $action) {
            Permission::updateOrCreate(
                [
                    'user_id'  => $request->user_id,
                    'resource' => $request->resource,
                    'action'   => $action,
                ],
                [
                    'allowed' => true,
                ]
            );
        }

        // ✅ Invalidate user's permission cache
        $this->permissionService->invalidateCache($request->user_id);

        return redirect()
            ->route('permissions.index')
            ->with('success', 'Permissions granted successfully');
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        $permissions = Permission::where('user_id', $id)
            ->get()
            ->groupBy('resource');

        // ✅ Load from config instead of hardcoding
        $resources = config('permissions.resources');
        $actions = config('permissions.actions');

        return view('permissions.edit', compact(
            'user',
            'permissions',
            'resources',
            'actions'
        ));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'resource' => 'required|string',
            'actions'  => 'required|array',
        ]);

        Permission::where('user_id', $id)
            ->where('resource', $request->resource)
            ->delete();

        foreach ($request->actions as $action) {
            Permission::create([
                'user_id'  => $id,
                'resource' => $request->resource,
                'action'   => $action,
                'allowed'  => true,
            ]);
        }

        // ✅ Invalidate user's permission cache
        $this->permissionService->invalidateCache((int)$id);

        return redirect()
            ->route('permissions.index')
            ->with('success', 'Permissions updated successfully');
    }

    public function destroy(string $id)
    {
        Permission::where('user_id', $id)->delete();

        // ✅ Invalidate user's permission cache
        $this->permissionService->invalidateCache((int)$id);

        return redirect()
            ->route('permissions.index')
            ->with('success', 'All permissions removed');
    }
}
