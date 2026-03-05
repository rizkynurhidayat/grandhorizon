<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HeroSectionController; // Pakai yang ini sesuai file yang kita buat tadi
use App\Http\Controllers\TentangController;

// Halaman Depan
use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index'])->name('home');

// --- AUTHENTICATION ---
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- ADMIN AREA (Harus Login) ---
Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    // Dashboard Utama
    Route::get('/', function () { 
        return view('admin.dashboard'); 
    })->name('admin.dashboard');

    // Fitur Hero Section
    // URL: /admin/hero/edit
    Route::get('/hero/edit', [HeroSectionController::class, 'edit'])->name('hero.edit');
    Route::put('/hero/update', [HeroSectionController::class, 'update'])->name('hero.update');
    
    // CRUD Tentang 
    // URL-nya nanti otomatis jadi: /admin/tentang
    Route::resource('tentang', TentangController::class);
});