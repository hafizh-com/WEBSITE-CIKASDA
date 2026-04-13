<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| RUTE UNTUK MASYARAKAT (USER) - TAMPILAN DEPAN
|--------------------------------------------------------------------------
*/

// Halaman Beranda Publik
Route::get('/', function () {
    return view('pages.welcome');
});

// Rute Dinamis untuk menampilkan Detail Profil (Struktur, Visi Misi, dll)
// Nama route 'profil.show' ini harus SAMA dengan yang dipanggil di Navbar
Route::get('/profil/{slug}', [PageController::class, 'show'])->name('profil.show');

// Rute Galeri untuk Publik
Route::get('/galeri', [GalleryController::class, 'index'])->name('user.galeri.index');


/*
|--------------------------------------------------------------------------
| RUTE UNTUK ADMIN (DASHBOARD) - PERLU LOGIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Halaman Utama Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Kelola Akun Admin (Bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- KELOLA KONTEN (ADMIN) ---
    // Kita tambahkan parameter 'pages' => 'slug' agar Laravel tahu 
    // kalau kita mencari data berdasarkan SLUG, bukan ID angka di URL.
    Route::resource('admin/pages', PageController::class)->names('pages')->parameters([
        'pages' => 'slug'
    ]);

    // Kelola Galeri
    Route::resource('admin/galleries', GalleryController::class)->names('galleries');
});

require __DIR__.'/auth.php';