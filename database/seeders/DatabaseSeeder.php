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

        //Crear 2 roles de usuario: admin y user
        \App\Models\Rol::factory()->create([
            'name' => 'admin',
            'description' => 'Administrador del sistema',
        ]);
        \App\Models\Rol::factory()->create([
            'name' => 'user',
            'description' => 'Usuario del sistema',
        ]);

        User::factory()->create([
            'name' => 'Jordi Llobet',
            'email' => 'jordillps@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'active' => true,
            'birthdate' => '1968-07-28',
            'phone' => '610464690',
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
            'active' => true,
            'birthdate' => '1968-07-28',
            'phone' => '123456789',
        ]);


    }
}
