<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Pickleball',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1'), // Mật khẩu là 1
        ]);
    }
}