<?php

namespace App\Http\Controllers;

use App\Models\HeroSection; // Ini supaya kurir tahu tabel mana yang mau diambil
use App\Models\Tentang;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Si kurir mengambil data pertama dari tabel hero
        $hero = HeroSection::first();
        $tentang = Tentang::first(); 
        $fasilitas = Fasilitas::all(); // Ambil semua data fasilitas untuk ditampilkan di halaman depan
        
        // Si kurir mengantarkan data ($hero, $tentang, $fasilitas) ke halaman index.blade.php
        return view('index', compact('hero', 'tentang', 'fasilitas'));
    }
}