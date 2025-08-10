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
                'password' => Hash::make('bebek'),
            ]
        );

        User::firstOrCreate(
            ['email' => 'member@example.com'], 
            [
                'name' => 'Test Member',
                'password' => Hash::make('ayam'),
            ]
        );

        User::factory(50)->create();
    }
}