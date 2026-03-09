<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\FasilitasPerumahan;
use App\Models\HeroSection;
use App\Models\Tentang;
use App\Models\TipeRumah; // Import Model Baru
use App\Models\HubungiKami;

class HomeController extends Controller
{
    public function index()
    {
        $hero = HeroSection::first();
        $tentang = Tentang::first();
        $fasilitas = Fasilitas::all();
        $tiperumah = TipeRumah::latest()->get();
        // Ambil data fasilitas perumahan untuk slider
        $fasilitasperumahan = FasilitasPerumahan::latest()->get();

        return view('index', compact('hero', 'tentang', 'fasilitas', 'tiperumah', 'fasilitasperumahan'));
    }

    public function dashboard()
    {
        $tipeRumahCount = TipeRumah::count();
        $fasilitasCount = Fasilitas::count();
        $pesanCount = HubungiKami::count();

        return view('admin.dashboard', compact('tipeRumahCount', 'fasilitasCount', 'pesanCount'));
    }
}
