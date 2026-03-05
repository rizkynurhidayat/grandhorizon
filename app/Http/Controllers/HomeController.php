<?php

namespace App\Http\Controllers;

// Import semua model yang dibutuhkan
use App\Models\Fasilitas;
use App\Models\HeroSection;
use App\Models\Tentang;
<<<<<<< HEAD
use App\Models\Fasilitas;
use Illuminate\Http\Request;
=======
use App\Models\TipeRumah;
>>>>>>> ca64be5e9ad65b844b902bac85d3b9f4180f7825

class HomeController extends Controller
{
    public function index()
    {
        // 1. Mengambil data tunggal (Singleton)
        $hero = HeroSection::first();
        $tentang = Tentang::first(); 
        $fasilitas = Fasilitas::all(); // Ambil semua data fasilitas untuk ditampilkan di halaman depan
        
        // Si kurir mengantarkan data ($hero, $tentang, $fasilitas) ke halaman index.blade.php
        return view('index', compact('hero', 'tentang', 'fasilitas'));
        $tentang = Tentang::first();

        // 2. Mengambil data koleksi (Array/Grid)
        $fasilitas = Fasilitas::all();

        // Menggunakan latest() agar tipe rumah yang baru diinput muncul paling depan
        $tiperumah = TipeRumah::latest()->get();

        // 3. Kirim SEMUA data ke satu halaman (welcome.blade.php)
        return view('index', compact('hero', 'tentang', 'fasilitas', 'tiperumah'));
    }
}
