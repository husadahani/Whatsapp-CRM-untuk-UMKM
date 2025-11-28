<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin IndoWhatCRM',
            'email' => 'admin@indowhatcrm.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Demo User
        User::create([
            'name' => 'Demo User',
            'email' => 'demo@indowhatcrm.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Test UMKM User
        User::create([
            'name' => 'Toko Berkah Jaya',
            'email' => 'toko@berkah.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
    }
}

