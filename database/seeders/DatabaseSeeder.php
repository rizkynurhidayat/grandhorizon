<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Ini akan tetap jalan (Bikin Admin)
        \App\Models\User::create([
            'name' => 'Admin Grand Horizon',
            'email' => 'admin@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
        ]);

        // 2. Komentari bagian ini karena filenya belum ada/salah nama
        // $this->call([
        //     GrandHorizonSeeder::class,
        // ]);
    }
}
