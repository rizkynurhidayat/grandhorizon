<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\HeroSection;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Ini akan tetap jalan (Bikin Admin)
        User::create([
            'name' => 'Admin Grand Horizon',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        // 2. Komentari bagian ini karena filenya belum ada/salah nama
        // $this->call([
        //     GrandHorizonSeeder::class,
        // ]);

        HeroSection::create([
            'deskripsi' => 'Admin Grand Horizon',
            'email' => 'admin@gmail.com',
        ]);

        
    }
}
