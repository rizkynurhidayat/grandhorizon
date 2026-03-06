<?php

namespace App\Http\Controllers;

// PASTIKAN SEMUA MODEL DI-IMPORT DI SINI
use App\Models\Fasilitas;
use App\Models\HeroSection;
use App\Models\Tentang;
use App\Models\TipeRumah; // Jangan sampai ketinggalan
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil semua data dari database
        $hero = HeroSection::first();
        $tentang = Tentang::first();
        $fasilitas = Fasilitas::all();
        $tiperumah = TipeRumah::latest()->get(); // Ini yang tadi "ketinggalan"

        // 2. Kirim SEMUA data sekaligus dalam SATU return
        return view('index', compact('hero', 'tentang', 'fasilitas', 'tiperumah'));
    }
}