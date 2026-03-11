<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\HeroSection;
use App\Models\Tentang;
use App\Models\Fasilitas;
use App\Models\TipeRumah;
use App\Models\FasilitasPerumahan;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Menggunakan email sebagai kunci unik untuk User
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Grand Horizon',
                'password' => Hash::make('admin123'),
            ]
        );

        // 2. Komentari bagian ini karena filenya belum ada/salah nama
        // $this->call([
        //     GrandHorizonSeeder::class,
        // ]);

        // 3. Menggunakan email sebagai kunci unik untuk HeroSection
        HeroSection::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'deskripsi' => 'Admin Grand Horizon',
            ]
        );

        // 4. Menggunakan judul sebagai kunci unik untuk Tentang
        Tentang::updateOrCreate(
            ['judul' => 'Tentang Grand Horizon'],
            [
                'subjudul' => 'Grand Horizon adalah kawasan perumahan modern yang menawarkan hunian nyaman, aman, dan cocok untuk keluarga.',
                'gambar' => 'tentang_horizon.jpg',
                'deskripsi' => 'Berlokasi strategis dan mudah diakses, perumahan ini dekat dengan berbagai fasilitas umum seperti sekolah, pusat perbelanjaan, rumah sakit, dan akses transportasi.',
                'logo' => 'logo.png',
                'tekstombol' => 'Lihat Selengkapnya',
                'judul_unggulan_1' => 'Legalitas Terjamin',
                'desc_unggulan_1' => 'Semua dokumen dan perizinan lengkap serta resmi.',
                'logo_unggulan_1' => 'terjamin.png',
                'judul_unggulan_2' => 'Kredit Mudah',
                'desc_unggulan_2' => 'Proses pembiayaan mudah dan cicilan terjangkau.', 
                'logo_unggulan_2' => 'credit murah.png',
                'judul_unggulan_3' => 'Bebas Banjir',
                'desc_unggulan_3' => 'Lokasi aman dari genangan dan banjir.', 
                'logo_unggulan_3' => 'bebas banjir.svg',
                'judul_unggulan_4' => 'Lokasi Mudah di Akses',
                'desc_unggulan_4' => 'Mudah diakses dan dekat dengan fasilitas umum.', 
                'logo_unggulan_4' => '',
            ]
        );  
        //5.fasilitas
         Fasilitas::updateOrCreate(
            ['judul' => 'Fasilitas Sekitar Grand Horizon'],
            [
                'deskripsi' => 'Sekolah' . ' ' . 'Rumah Sakit' . ' ' . 'Pusat Perbelanjaan' . ' ' . 'Akses Transportasi',
                'gambar'=> ''
            ] 
        );
         //6.tipe rumah
         TipeRumah::updateOrCreate(
            ['judul' => 'Tipe Rumah Grand Horizon'],
            [
                'nama_tipe_rumah' => 'Admin Grand Horizon',
                'luas_bangunan'=> 'Admin Grand Horizon',
                'harga'=> 'Rp900 Juta- Rp1,2 Miliar',
                'cicilan'=> 'Cicilan mulai 3,0 JT-an',
                'kamar_tidur'=> '2',
                'kamar_mandi'=> '2',
                'garasi'=> '1',
                'gambar'=> 'horizon_lite.png',
                'tekstombol'=> 'Cek Ketersediaan Unit',
            ]
            
        );
        //7.fasilitas perumahan
         FasilitasPerumahan::updateOrCreate(
            ['judul' => 'Fasilitas Perumahan Grand Horizon'],
            [
                'gambar'=> ''
            ] 
        );
        //8.Testiimoni
         Testimoni::updateOrCreate(
            ['judul' => 'Testimoni Grand Horizon'],
            [
                'nama'=> 'John Doe',
                'jabatan'=> 'Penghuni',
                'isi_testimoni'=> 'Saya sangat puas dengan kualitas rumah dan fasilitas yang disediakan di Grand Horizon.',
                'gambar'=> 'john_doe.jpg'
            ] 
        );
    }
}