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
use App\Models\HubungiKami;
use App\Models\Footer;
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
                'subjudul' => 'Perumahan Modern dan Nyaman untuk keluarga',
                'alamat' => 'Jl. Raya Cilegon, Drangong, Taktakan Serang, Kota Serang, Banten 42162 REAL ESTATE INDONESIA (REI)',
                'gambar' => 'null',
                'tekstombol' => 'cek selengkapnya'
            ]
        );

        // 4. Menggunakan judul sebagai kunci unik untuk Tentang
        Tentang::updateOrCreate(
            ['judul' => 'Tentang Grand Horizon'],
            [
                'subjudul' => 'Grand Horizon adalah kawasan perumahan modern yang menawarkan hunian nyaman, aman, dan cocok untuk keluarga.',
                'gambar' => 'null',
                'deskripsi' => 'Berlokasi strategis dan mudah diakses, perumahan ini dekat dengan berbagai fasilitas umum seperti sekolah, pusat perbelanjaan, rumah sakit, dan akses transportasi.',
                'logo' => 'null',
                'tekstombol' => 'Lihat Selengkapnya',
                'judul_unggulan_1' => 'Legalitas Terjamin',
                'desc_unggulan_1' => 'Semua dokumen dan perizinan lengkap serta resmi.',
                'logo_unggulan_1' => 'null',
                'judul_unggulan_2' => 'Kredit Mudah',
                'desc_unggulan_2' => 'Proses pembiayaan mudah dan cicilan terjangkau.', 
                'logo_unggulan_2' => 'null',
                'judul_unggulan_3' => 'Bebas Banjir',
                'desc_unggulan_3' => 'Lokasi aman dari genangan dan banjir.', 
                'logo_unggulan_3' => 'null',
                'judul_unggulan_4' => 'Lokasi Mudah di Akses',
                'desc_unggulan_4' => 'Mudah diakses dan dekat dengan fasilitas umum.', 
                'logo_unggulan_4' => 'null',
            ]
        );  
        //5.fasilitas
         Fasilitas::updateOrCreate(
            ['judul' => 'Fasilitas Sekitar Grand Horizon'],
            [
                'deskripsi' => 'Akses Jalan' . ' ' . 'Kantor Pemerintah' . ' ' . 'Sarana Transportasi' . ' ' . 'Pasar Tradisional' . ' ' . 'Pusat Perbelanjaan' . ' ' . 'Sekolah' . ' ' . 'Rumah Sakit' . ' ' . 'Perguruan Tinggi' . ' ' . 'Lainya',
                'gambar'=> 'null'
            ] 
        );
         //6.tipe rumah
         TipeRumah::updateOrCreate(
            ['judul' => 'Tipe Rumah Grand Horizon'],
            [
                'nama_tipe_rumah' => 'Admin Grand Horizon',
                'luas_bangunan'=> 'LT 40m LB 60m',
                'harga'=> 'Rp900 Juta- Rp1,2 Miliar',
                'cicilan'=> 'Cicilan mulai 3,0 JT-an',
                'kamar_tidur'=> '2',
                'kamar_mandi'=> '2',
                'garasi'=> '1',
                'gambar'=> 'null',
                'tekstombol'=> 'Cek Ketersediaan Unit',
            ]
            
        );
        //7.fasilitas perumahan
         FasilitasPerumahan::updateOrCreate(
            ['judul' => 'Fasilitas Perumahan Grand Horizon'],
            [
                'gambar'=> 'null'
            ] 
        );
        //8.Testiimoni
         Testimoni::updateOrCreate(
            ['judul' => 'Testimoni Klien'],
            [
                'rating'=> '5',
                'pesan'=> '“Grand Horizon adalah tempat tinggal yang nyaman dan tenang. Lingkungannya rapi, aman, dan cocok untuk keluarga.”',
                'profile'=> 'null',
                'user'=> 'john doe'
            ] 
        );
         //9.hubungi kami
         HubungiKami::updateOrCreate(
            ['judul' => 'Hubungi Kami'],
            [
                'user' => 'John Doe',
                'no_hp' => '081234567890',
                'email' => 'admin@gmail.com',
                'tanggal' => '2024-06-01',
                'pesan'=> 'Saya tertarik dengan perumahan ini, bagaimana cara mendapatkan informasi lebih lanjut?',
                'teks_tombol' => 'Kirim Pesan',
                'link_tombol' => 'https://wa.me/081234567890',
            ]
        );
        //10.footer
         Footer::updateOrCreate(
            ['judul' => 'Lokasi Grand Horizon'],
            [
                'address' => 'Alamat Grand Horizon : Jl. Raya Cilegon, Drangong, Taktakan Serang, Kota Serang, Banten 42162',
                'phone' => '081234567890',
                'email' => 'grandhorizon@gmail.com',
                'copyright' => '© 2025 Grand Horizon. All rights reserved.',
                'fb_name' => 'Grand Horizon',
                'fb_url' => 'https://www.facebook.com/grandhorizon',
                'tw_name' => 'Grand Horizon',
                'tw_url' => 'https://www.twitter.com/grandhorizon',
                'ig_name' => 'Grand Horizon',
                'ig_url' => 'https://www.instagram.com/grandhorizon',
                'biaya_judul' => 'Biaya KPR',
                'biaya_items' =>json_encode(['cicilan ringan', 'GRATIS 1 unit AC','Hadiah menarik lainnya GRATIS','PPN GRATIS','KPR GRATIS','DP GRATIS','GRATIS biaya surat-surat']),
            ]
        );
           
    }
}