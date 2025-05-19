<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Création de l'utilisateur administrateur par défaut
        User::create([
            'name' => 'Administrateur',
            'email' => 'admin@centrenganda.com',
            'password' => Hash::make('CentreNganda@2024'),
            'email_verified_at' => now(),
        ]);
    }
}
