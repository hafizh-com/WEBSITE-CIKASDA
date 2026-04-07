<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah konten di tabel pages secara real-time
        // Gunakan try-catch agar tidak error jika tabel belum dibuat
        try {
            $countProfil = Page::count();
        } catch (\Exception $e) {
            $countProfil = 0;
        }

        $countBerita = 0; // Nanti hubungkan ke model News
        $countGaleri = 0; // Nanti hubungkan ke model Gallery
        $countVisitor = 128; // Ini bisa pakai logic session nantinya

        return view('dashboard', compact('countProfil', 'countBerita', 'countGaleri', 'countVisitor'));
    }
}