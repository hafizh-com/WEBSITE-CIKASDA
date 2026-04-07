<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\GalleryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| RUTE UNTUK MASYARAKAT (USER) - TAMPILAN DEPAN
|--------------------------------------------------------------------------
*/

// Halaman Beranda
Route::get('/', function () {
    return view('pages.welcome');
});

// Rute Otomatis untuk dropdown Profil (Visi Misi, Sejarah, Pejabat)
// Ini yang bakal ngehubungin ke file profil-detail.blade.php kamu
Route::get('/profil/{slug}', [PageController::class, 'show'])->name('user.profil.show');

// Rute untuk Galeri (Tampilan User)
Route::get('/galeri', [GalleryController::class, 'index'])->name('user.galeri.index');


/*
|--------------------------------------------------------------------------
| RUTE UNTUK ADMIN (DASHBOARD) - PERLU LOGIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Cari baris ini dan ganti:
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    // Kelola Akun Admin
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- KELOLA KONTEN (ADMIN) ---
    Route::resource('admin/pages', PageController::class)->names('pages');
    Route::resource('admin/galleries', GalleryController::class)->names('galleries');
});

require __DIR__.'/auth.php';