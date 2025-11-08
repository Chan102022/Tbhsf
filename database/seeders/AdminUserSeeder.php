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
            ['email' => 'admin@gmail.com.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123'),
                'contact' => '09668810054',
                'role' => 'admin',
            ]
        );
    }
}
