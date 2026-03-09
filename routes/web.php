<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FasilitasPerumahanController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HubungiKamiController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\TipeRumahController;
use Illuminate\Support\Facades\Route;

// --- HALAMAN DEPAN ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/hubungi-kami/store', [HubungiKamiController::class, 'store'])->name('hubungi-kami.store');

// --- AUTH ---
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- ADMIN AREA ---
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Route::get('/', function () {
    //     return view('admin.dashboard');
    // })->name('admin.dashboard');

    Route::get('/', [HomeController::class, 'dashboard'])->name('admin.dashboard');

    // Fasilitas Sekitar (CRUD Lengkap)
    Route::resource('fasilitas', \App\Http\Controllers\FasilitasController::class);

    // Tipe rumah
    Route::resource('tiperumah', TipeRumahController::class);

    // Hero Section
    Route::get('/hero/edit', [HeroSectionController::class, 'edit'])->name('hero.edit');
    Route::put('/hero/update', [HeroSectionController::class, 'update'])->name('hero.update');

    // Tentang Kami (Sistem Edit Tunggal)
    Route::get('/tentang/edit/', [TentangController::class, 'edit'])->name('tentang.edit');
    Route::put('/tentang/update/{tentang}', [TentangController::class, 'update'])->name('tentang.update');

    // Pesan Masuk
    Route::get('/hubungi-kami', [HubungiKamiController::class, 'index'])->name('admin.hubungi-kami.index');
    Route::delete('/hubungi-kami/{id}', [HubungiKamiController::class, 'destroy'])->name('admin.hubungi-kami.destroy');

    // Fasilitas
    Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');
    Route::get('/fasilitas/create', [FasilitasController::class, 'create'])->name('fasilitas.create');
    Route::post('/fasilitas/store', [FasilitasController::class, 'store'])->name('fasilitas.store');
    Route::get('/fasilitas/edit/{fasilitas}', [FasilitasController::class, 'edit'])->name('fasilitas.edit');
    Route::put('/fasilitas/update/{fasilitas}', [FasilitasController::class, 'update'])->name('fasilitas.update');
    Route::delete('/fasilitas/delete/{fasilitas}', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy');

    // --- TAMBAHAN: Fasilitas Perumahan (Slider) ---
    Route::resource('fasilitasperumahan', FasilitasPerumahanController::class);
});
