<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Inventaris',
            'email' => 'admin@inventaris.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Staff / User biasa
        User::create([
            'name' => 'Staff Inventaris',
            'email' => 'staff@inventaris.com',
            'password' => Hash::make('staff123'),
            'role' => 'user',
        ]);
    }
}
