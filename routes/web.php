<?php

use App\Http\Controllers\Admin\TipeRumahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HubungiKamiController;
use Illuminate\Support\Facades\Route;

// Halaman Depan
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HeroSectionController; // Pakai yang ini sesuai file yang kita buat tadi
use App\Http\Controllers\TentangController;

// Halaman Depan
use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index'])->name('home');

// Form Store (Pindahkan ke sini agar bersih)
Route::post('/hubungi-kami/store', [HubungiKamiController::class, 'store'])->name('hubungi-kami.store');

// Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Area
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/hero/edit', [HeroSectionController::class, 'edit'])->name('hero.edit');
    Route::put('/hero/update', [HeroSectionController::class, 'update'])->name('hero.update');

    // Route::resource('tipe-rumah', TipeRumahController::class);

    // Route Index & Delete untuk Admin
    Route::get('/hubungi-kami', [HubungiKamiController::class, 'index'])->name('admin.hubungi-kami.index');
    Route::delete('/hubungi-kami/{id}', [HubungiKamiController::class, 'destroy'])->name('admin.hubungi-kami.destroy');
});
    
    // CRUD Tentang 
    // URL-nya nanti otomatis jadi: /admin/tentang
    Route::resource('tentang', TentangController::class);
});
