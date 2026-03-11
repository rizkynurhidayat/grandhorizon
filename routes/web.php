<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\FasilitasPerumahanController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HubungiKamiController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\TipeRumahController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\FooterController;
use Illuminate\Support\Facades\Route;

// --- HALAMAN DEPAN (GUEST) ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/hubungi-kami/store', [HubungiKamiController::class, 'store'])->name('hubungi-kami.store');

// --- AUTHENTICATION ---
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- ADMIN AREA (PROTECTED BY AUTH) ---
Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    // Main Dashboard
    Route::get('/', [HomeController::class, 'dashboard'])->name('admin.dashboard');

    // 1. Fasilitas Sekitar (CRUD Lengkap via Resource)
    Route::resource('fasilitas', FasilitasController::class);

    // 2. Tipe Rumah (CRUD Lengkap via Resource)
    Route::resource('tiperumah', TipeRumahController::class);

    // 3. Hero Section (Edit & Update saja)
    Route::get('/hero/edit', [HeroSectionController::class, 'edit'])->name('hero.edit');
    Route::put('/hero/update', [HeroSectionController::class, 'update'])->name('hero.update');

    // 4. Tentang Kami (Sistem Edit Tunggal)
    Route::get('/tentang/edit/', [TentangController::class, 'edit'])->name('tentang.edit');
    Route::put('/tentang/update/{tentang}', [TentangController::class, 'update'])->name('tentang.update');

    // 5. Pesan Masuk (Inbox)
    Route::get('/hubungi-kami', [HubungiKamiController::class, 'index'])->name('admin.hubungi-kami.index');
    Route::delete('/hubungi-kami/{id}', [HubungiKamiController::class, 'destroy'])->name('admin.hubungi-kami.destroy');
    Route::post('/hubungi-kami/{id}/read', [HubungiKamiController::class, 'markAsRead'])->name('admin.hubungi-kami.read');

    // 6. Fasilitas Perumahan (CRUD Manual / Slider)
    Route::get('/fasilitas-perumahan', [FasilitasController::class, 'index'])->name('fasilitas.index');
    Route::get('/fasilitas-perumahan/create', [FasilitasController::class, 'create'])->name('fasilitas.create');
    Route::post('/fasilitas-perumahan/store', [FasilitasController::class, 'store'])->name('fasilitas.store');
    Route::get('/fasilitas-perumahan/edit/{fasilitas}', [FasilitasController::class, 'edit'])->name('fasilitas.edit');
    Route::put('/fasilitas-perumahan/update/{fasilitas}', [FasilitasController::class, 'update'])->name('fasilitas.update');
    Route::delete('/fasilitas-perumahan/delete/{fasilitas}', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy');

    // 7. Galeri / Fasilitas Perumahan (Resource)
    Route::resource('fasilitasperumahan', FasilitasPerumahanController::class);

    // 8. Testimoni (Resource Otomatis: testimoni.index, testimoni.store, dll)
    Route::resource('testimoni', TestimoniController::class);

    // 9. Footer (CRUD)
    Route::resource('footer', FooterController::class)
        ->except(['show', 'create'])
        ->names([
            'index'   => 'admin.footer.index',
            'store'   => 'admin.footer.store',
            'edit'    => 'admin.footer.edit',
            'update'  => 'admin.footer.update',
            'destroy' => 'admin.footer.destroy',
        ]);
    Route::post('footer/{footer}/activate', [FooterController::class, 'activate'])->name('admin.footer.activate');

});