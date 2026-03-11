<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use App\Models\TipeRumah;
use App\Models\Fasilitas;          
use App\Models\FasilitasPerumahan;
use App\Models\HeroSection;
use App\Models\Tentang;

class HomeController extends Controller
{
    /**
     * Menampilkan Halaman Utama (Landing Page)
     */
    public function index()
    {
        // 1. Ambil data Testimoni
        $testimonis = Testimoni::all();

        // 2. Ambil data Tipe Rumah (Gunakan huruf kecil sesuai permintaan Blade)
        $tiperumah = TipeRumah::all();

        // 3. Ambil data Fasilitas (Sekitar)
        $fasilitas = Fasilitas::all();

        // 4. Ambil data Fasilitas Perumahan (Slider)
        // Kita buat variabel ganda agar tidak error jika Blade memanggil nama berbeda
        $fasilitasperumahan = FasilitasPerumahan::all();

        // 5. Ambil data Tentang Kami
        // Jika data di database kosong, buat objek kosong agar tidak error "Attempt to read property on null"
        $tentang = Tentang::first() ?? new Tentang();

        $hero = HeroSection::firstOrCreate(
            ['id' => 1],
            [
                'judul'      => 'GRAND HORIZON',
                'subjudul'   => 'Perumahan Modern dan Nyaman untuk keluarga',
                'alamat'     => 'Jl. Raya Cilegon, Drangong, Taktakan Serang',
                'tekstombol' => 'Lihat Selengkapnya',
                'gambar'     => 'default.jpg',
            ]
        );

        // Kirim semua variabel ke view index.blade.php
        return view('index', compact(
            'testimonis', 
            'tiperumah', 
            'fasilitas', 
            'fasilitasperumahan', 
            'tentang',
            'hero'
        ));
    }

    /**
     * Menampilkan Dashboard Admin
     */
    public function dashboard()
    {
        return view('admin.dashboard', [
            'tipeRumahCount' => TipeRumah::count(),
            'fasilitasPerumahanCount' => FasilitasPerumahan::count(),
            'testimoniCount' => Testimoni::count()
        ]);
    }
}