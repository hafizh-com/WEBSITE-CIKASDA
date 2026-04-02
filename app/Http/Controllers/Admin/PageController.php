<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page; 
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Menampilkan daftar halaman profil untuk dikelola Admin
     */
    public function index()
    {
        // Jika nanti sudah ada database: $pages = Page::all();
        return view('admin.pages.index');
    }

    /**
     * Form edit konten (Tempat Admin upload gambar)
     * Karena pakai Route::resource, parameternya adalah $page (berisi slug)
     */
    public function edit($page) 
    {
        // Logika sementara: Buat data dummy berdasarkan slug agar form tidak error
        $data = [
            'title' => ucwords(str_replace('-', ' ', $page)),
            'slug'  => $page,
            'content' => null, // Nanti ambil dari DB: $pageModel->content
        ];

        return view('admin.pages.edit', ['page' => $data]);
    }

    /**
     * Memproses upload gambar dan update konten ke Database
     */
    public function update(Request $request, $page)
    {
        // 1. Validasi Input
        $request->validate([
            'content_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'title'         => 'required|string|max:255',
        ]);

        // 2. Logika Simpan Gambar
        if ($request->hasFile('content_image')) {
            
            // Simpan file ke folder: public/storage/pages
            $path = $request->file('content_image')->store('pages', 'public');
            
            // Link yang akan disimpan ke database adalah: 'storage/' . $path
            $fullPath = 'storage/' . $path;

            /* LOGIKA DATABASE (Aktifkan jika Model Page sudah siap):
               $pageModel = Page::where('slug', $page)->first();
               
               // Hapus gambar lama jika ada agar hosting tidak penuh
               if ($pageModel->content) {
                   Storage::disk('public')->delete(str_replace('storage/', '', $pageModel->content));
               }

               $pageModel->update([
                   'content' => $fullPath,
                   'type'    => 'image'
               ]);
            */
        }

        return redirect()->route('pages.index')->with('success', 'Konten Halaman Berhasil Diperbarui!');
    }

    /**
     * Menampilkan detail profil di sisi USER (Masyarakat)
     */
    public function show($slug)
    {
        // Ambil data dari database berdasarkan slug
        // $pageData = Page::where('slug', $slug)->first();

        // Data dummy sementara agar tampilan user tetap rapi
        $page = [
            'title'   => ucwords(str_replace('-', ' ', $slug)),
            'content' => null, // Biarkan null agar muncul pesan "Konten Belum Tersedia"
            'type'    => null
        ];

        return view('pages.profil-detail', compact('page'));
    }
}