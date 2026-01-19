<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'       => 'System Admin',
                'phone'      => '0700000000',
                'password'   => Hash::make('password!'),
                'role'       => 'admin',
                'department' => 'ICT',
            ]
        );
    }
}
