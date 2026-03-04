<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\TipeRumahController;

Route::get('/', function () {
    return view('index');
});

// Menampilkan halaman login
Route::get('/login', [AuthController::class, 'login'])->name('login');
// Menangani klik tombol login
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
// Menangani logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Grup Route Admin (Hanya bisa diakses jika sudah Login)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', function () { return view('admin.dashboard'); })->name('admin.dashboard');

    // CRUD untuk masing-masing ERD
    Route::resource('hero', HeroController::class);
    Route::resource('tipe-rumah', TipeRumahController::class);
    // ... tambahkan resource lainnya nanti
});