<?php

namespace App\Http\Controllers;

// Import semua model yang dibutuhkan
use App\Models\Fasilitas;
use App\Models\HeroSection;
use App\Models\Tentang;
use App\Models\TipeRumah;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Mengambil data tunggal (Singleton)
        $hero = HeroSection::first();
        $tentang = Tentang::first();

        // 2. Mengambil data koleksi (Array/Grid)
        $fasilitas = Fasilitas::all();

        // Menggunakan latest() agar tipe rumah yang baru diinput muncul paling depan
        $tiperumah = TipeRumah::latest()->get();

        // 3. Kirim SEMUA data ke satu halaman (welcome.blade.php)
        return view('index', compact('hero', 'tentang', 'fasilitas', 'tiperumah'));
    }
}
