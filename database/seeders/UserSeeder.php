<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Pemilik Toko',
            'email' => 'owner@toko.com',
            'password' => Hash::make('password'),
            'role' => 'owner'
        ]);

        User::create([
            'name' => 'Admin Satu',
            'email' => 'admin@toko.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Supir Pak Budi',
            'email' => 'supir@toko.com',
            'password' => Hash::make('password'),
            'role' => 'supir'
        ]);
    }
}

