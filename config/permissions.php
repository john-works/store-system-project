<?php

return [
    /**
     * System Resources
     * Add new resources here for permission management
     */
    'resources' => [
        'suppliers',
        'items',
        'contracts',
        'borrowings',
        'moverments',
        'requisitions',
        'goods',
        'services',
        'disposals',
        'users',
        'permissions',
    ],

    /**
     * System Actions
     * Standard CRUD + workflow actions
     */
    'actions' => [
        'index',    // List all
        'create',   // Show create form
        'store',    // Save to database
        'show',     // View single item
        'edit',     // Show edit form
        'update',   // Update in database
        'destroy',  // Delete
        'approve',  // Workflow approval
        'reject',   // Workflow rejection
    ],

    /**
     * Role-based default permissions
     * ✅ REFERENCE ONLY - Used by DefaultPermissionSeeder
     * ✅ NOT enforced - Admins can grant custom permissions instead
     * ✅ Actual permissions are stored in the 'permissions' database table
     * 
     * To apply these defaults:
     * php artisan db:seed --class=DefaultPermissionSeeder
     * 
     * Manual grants OVERRIDE these defaults
     */
    'role_defaults' => [
        'officer' => [
            'suppliers' => ['index', 'show'],
            'items' => ['index', 'show'],
            'contracts' => ['index', 'show'],
            'borrowings' => ['index', 'create', 'store', 'show'],
            'moverments' => ['index', 'show'],
            'requisitions' => ['index', 'create', 'store', 'show'],
            'goods' => ['index', 'show'],
            'services' => ['index', 'show'],
            'disposals' => ['index', 'show'],
        ],
        'senior_officer' => [
            'suppliers' => ['index', 'create', 'store', 'show', 'edit', 'update'],
            'items' => ['index', 'create', 'store', 'show', 'edit', 'update'],
            'contracts' => ['index', 'create', 'store', 'show', 'edit', 'update'],
            'borrowings' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'moverments' => ['index', 'create', 'store', 'show', 'edit', 'update'],
            'requisitions' => ['index', 'create', 'store', 'show', 'edit', 'update'],
            'goods' => ['index', 'create', 'store', 'show', 'edit', 'update', 'approve', 'reject'],
            'services' => ['index', 'create', 'store', 'show', 'edit', 'update', 'approve', 'reject'],
            'disposals' => ['index', 'create', 'store', 'show', 'edit', 'update'],
        ],
        'manager' => [
            'suppliers' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'items' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'contracts' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'borrowings' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'moverments' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'requisitions' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'goods' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy', 'approve', 'reject'],
            'services' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy', 'approve', 'reject'],
            'disposals' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'],
            'users' => ['index', 'show'],
            'permissions' => ['index', 'create', 'store'],
        ],
    ],
];
