<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@example.com'], 
            [                         
                'name' => 'Test Admin',
                'username' => 'admin', 
                'password' => Hash::make('bebek'),
                'role' => 'admin'
            ]
        );

        User::firstOrCreate(
            ['email' => 'member@example.com'],
            [
                'name' => 'Test Member',
                'username' => 'member',
                'password' => Hash::make('ayam'),
                'role' => 'member' 
            ]
        );

        User::factory(50)->create();
    }
}