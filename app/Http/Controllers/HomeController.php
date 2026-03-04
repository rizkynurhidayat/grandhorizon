<?php

namespace App\Http\Controllers;

use App\Models\HeroSection; // Ini supaya kurir tahu tabel mana yang mau diambil
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Si kurir mengambil data pertama dari tabel hero
        $hero = HeroSection::first();
        
        // Si kurir mengantarkan data ($hero) ke halaman index.blade.php
        return view('index', compact('hero'));
    }
}