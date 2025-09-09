<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Jordi Llobet',
            'email' => 'jordillps@gmail.com',
            'password' => bcrypt('joibla068'),
            'role' => 'admin',
            'active' => true,
            'birthdate' => '1968-07-28',
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'active' => true,
            'birthdate' => '1968-07-28',
        ]);
    }
}
