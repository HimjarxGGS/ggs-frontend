<?php

namespace Database\Seeders;

use App\Models\Event;
// Hapus User dan Hash karena tidak digunakan langsung di sini
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Event::factory(10)->create();
        $this->call([
            UserSeeder::class,
        ]);
    }
}