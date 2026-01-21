<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;

class DefaultPermissionSeeder extends Seeder
{
    /**
     * Seed default permissions for users based on their role
     * ✅ This is OPTIONAL - admins can manually grant permissions instead
     * ✅ Only creates permissions if none exist for the user
     */
    public function run(): void
    {
        $roleDefaults = config('permissions.role_defaults');

        foreach ($roleDefaults as $role => $resources) {
            // Find all users with this role
            $users = User::where('role', $role)->get();

            foreach ($users as $user) {
                // Only seed if user has NO permissions yet
                if ($user->permissions()->count() === 0) {
                    foreach ($resources as $resource => $actions) {
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
        }

        // $this->command->info('✅ Default permissions seeded successfully!');
    }
}
