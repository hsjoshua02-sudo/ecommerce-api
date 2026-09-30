<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Usuario de prueba para login
        User::factory()->create([
            'name'     => 'Usuario Test',
            'email'    => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Ejecutar Seeder de Productos
        $this->call([
            ProductSeeder::class,
        ]);
    }
}