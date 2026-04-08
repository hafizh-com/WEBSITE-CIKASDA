<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Menghitung jumlah konten secara Real-Time
        try {
            $countProfil = Page::count();
            
            // 2. Mengambil 3 Aktivitas Terbaru (Data yang terakhir diupdate)
            // Ini akan mengisi bagian "Aktivitas Sistem" di Dashboard
            $recentActivities = Page::orderBy('updated_at', 'desc')
                                    ->take(3)
                                    ->get();
        } catch (\Exception $e) {
            $countProfil = 0;
            $recentActivities = collect(); // Koleksi kosong jika error
        }

        // Placeholder untuk fitur yang akan datang
        $countBerita = 0; 
        $countGaleri = 0; 
        $countVisitor = 128; // Simulasi, bisa dikembangkan dengan Session/Analytics

        return view('dashboard', compact(
            'countProfil', 
            'countBerita', 
            'countGaleri', 
            'countVisitor', 
            'recentActivities'
        ));
    }
}