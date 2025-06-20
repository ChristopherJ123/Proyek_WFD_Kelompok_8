<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'role_id' => 2,
            'username' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Admin123*'),
            'birth_date' => now(),
        ]);

        User::factory()->create([
            'username' => 'marco',
            'email' => 'marco@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Marco123*'),
            'birth_date' => now(),
        ]);

        User::factory()->create([
            'role_id' => 2,
            'username' => 'joey',
            'email' => 'joey@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Joey123*'),
            'birth_date' => now(),
        ]);

        User::factory()->create([
            'role_id' => 2,
            'username' => 'chris',
            'email' => 'chris@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Chris123*'),
            'birth_date' => now(),
        ]);

        User::factory()->create([
            'username' => 'ryan',
            'email' => 'ryan@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Ryan123*'),
            'birth_date' => now(),
        ]);

        User::factory()->create([
            'role_id' => 2,
            'username' => 'deaven',
            'email' => 'deaven@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Deaven123*'),
            'birth_date' => now(),
        ]);

        User::factory(100)->create();
    }
}
