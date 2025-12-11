<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::with('user')->get()->groupBy('user_id');
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $resources = ['suppliers', 'invoices', 'contracts', 'items', 'disposals', 'services', 'goods', 'borrowings', 'moverments', 'requisitions'];
        $actions = ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'];
        return view('permissions.create', compact('users', 'resources', 'actions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'resource' => 'required|string',
            'actions' => 'required|array',
        ]);

        foreach ($request->actions as $action) {
            Permission::updateOrCreate(
                ['user_id' => $request->user_id, 'resource' => $request->resource, 'action' => $action],
                ['allowed' => true]
            );
        }

        return redirect()->route('permissions.index')->with('success', 'Permissions granted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $permissions = Permission::where('user_id', $id)->get();
        return view('permissions.show', compact('user', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $permissions = Permission::where('user_id', $id)->get();
        $resources = ['suppliers', 'invoices', 'contracts', 'items', 'disposals', 'services', 'goods', 'borrowings', 'moverments', 'requisitions'];
        $actions = ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'];
        return view('permissions.edit', compact('user', 'permissions', 'resources', 'actions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'resource' => 'required|string',
            'actions' => 'required|array',
        ]);

        // Remove existing permissions for this user and resource
        Permission::where('user_id', $id)->where('resource', $request->resource)->delete();

        // Add new permissions
        foreach ($request->actions as $action) {
            Permission::create([
                'user_id' => $id,
                'resource' => $request->resource,
                'action' => $action,
                'allowed' => true,
            ]);
        }

        return redirect()->route('permissions.index')->with('success', 'Permissions updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Permission::where('user_id', $id)->delete();
        return redirect()->route('permissions.index')->with('success', 'All permissions for user removed successfully.');
    }
}
