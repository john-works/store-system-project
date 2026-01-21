<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'       => 'System Admin',
                'phone'      => '0700000000',
                'password'   => Hash::make('password!'),
                'role'       => 'admin',
                'department' => 'ICT',
            ]
        );

        // ✅ Assign ALL permissions to admin
        $this->assignAllPermissions($admin);
    }

    /**
     * Assign all permissions to admin user
     * ✅ Admin gets ALL resources + ALL actions
     * ✅ Admin can manage permissions for other users
     */
    private function assignAllPermissions(User $admin): void
    {
        $resources = config('permissions.resources');
        $actions = config('permissions.actions');

        foreach ($resources as $resource) {
            foreach ($actions as $action) {
                Permission::updateOrCreate(
                    [
                        'user_id'  => $admin->id,
                        'resource' => $resource,
                        'action'   => $action,
                    ],
                    [
                        'allowed' => true,
                    ]
                );
            }
        }
    }
}

