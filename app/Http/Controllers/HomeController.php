<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\HeroSection;
use App\Models\Tentang; // Tambahkan ini agar kurir tahu tabel fasilitas

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data satu persatu untuk Hero dan Tentang
        $hero = HeroSection::first();
        $tentang = Tentang::first();

        // Mengambil SEMUA data fasilitas (karena fasilitas jumlahnya banyak/grid)
        $fasilitas = Fasilitas::all();

        // Si kurir mengantarkan semua data ke halaman index.blade.php
        return view('index', compact('hero', 'tentang', 'fasilitas'));
    }
}
