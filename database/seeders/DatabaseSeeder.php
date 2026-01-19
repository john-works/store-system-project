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

        // OPTIONAL: create test users (comment out in production)
        // \App\Models\User::factory(10)->create();
    }
}
