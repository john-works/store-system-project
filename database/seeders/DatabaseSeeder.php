<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default admin user
        $this->call(AdminUserSeeder::class);

        // Create test users with different roles (optional)
        $this->call(TestUserSeeder::class);

        // Seed default permissions based on roles
        $this->call(DefaultPermissionSeeder::class);

        // OPTIONAL: create additional test users
        // \App\Models\User::factory(10)->create();
    }
}
