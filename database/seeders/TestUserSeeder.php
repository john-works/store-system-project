<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    /**
     * Create test users with different roles
     * ✅ Automatically assigns default permissions based on role
     */
    public function run(): void
    {
        $testUsers = [
            [
                'name' => 'Officer Test',
                'email' => 'officer@test.com',
                'password' => Hash::make('password'),
                'role' => 'officer',
                'phone' => '555-0001',
                'department' => 'Operations',
            ],
            [
                'name' => 'Senior Officer Test',
                'email' => 'senior_officer@test.com',
                'password' => Hash::make('password'),
                'role' => 'senior_officer',
                'phone' => '555-0002',
                'department' => 'Management',
            ],
            [
                'name' => 'Manager Test',
                'email' => 'manager@test.com',
                'password' => Hash::make('password'),
                'role' => 'manager',
                'phone' => '555-0003',
                'department' => 'Executive',
            ],
        ];

        $roleDefaults = config('permissions.role_defaults');

        foreach ($testUsers as $userData) {
            $user = User::firstOrCreate(
                ['email' => $userData['email']],
                $userData
            );

            // ✅ Assign default permissions if user has a role in config
            if (isset($roleDefaults[$user->role])) {
                $this->assignDefaultPermissions($user, $roleDefaults[$user->role]);
            }
        }

        // $this->command->info('✅ Test users created with default permissions!');
    }

    /**
     * Assign default permissions to a user based on role
     */
    private function assignDefaultPermissions(User $user, array $rolePermissions): void
    {
        foreach ($rolePermissions as $resource => $actions) {
            foreach ($actions as $action) {
                Permission::updateOrCreate(
                    [
                        'user_id'  => $user->id,
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
