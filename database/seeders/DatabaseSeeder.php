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
        // 1. Bikin Akun Admin Utama
        User::create([
            'name' => 'Admin Grand Horizon',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'), // Passwordnya nanti: admin123
        ]);

        // 2. Panggil Seeder Konten yang Isinya (Tipe Rumah, Hero, dll)
        // Pastikan file GrandHorizonSeeder.php sudah ada isinya ya!
        $this->call([
            GrandHorizonSeeder::class,
        ]);
    }
}