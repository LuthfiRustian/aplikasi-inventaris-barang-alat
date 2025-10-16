<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'name' => 'Admin Sistem',
                'email' => 'admin@example.com',
                'password' => 'password123',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Petugas Gudang',
                'email' => 'petugas@example.com',
                'password' => 'password123',
                'role' => 'petugas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Biasa',
                'email' => 'user@example.com',
                'password' => 'password123',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
    }
}
