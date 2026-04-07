<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Menampilkan daftar semua menu profil di dashboard admin.
     */
    public function index()
    {
        // Mengambil semua data dari database
        $pages = Page::all(); 
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Menampilkan form untuk membuat menu profil baru.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Menyimpan menu profil baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $slug = Str::slug($request->title);
        $contentPath = null;
        $type = 'text';

        if ($request->hasFile('content_image')) {
            $path = $request->file('content_image')->store('pages', 'public');
            $contentPath = 'storage/' . $path;
            $type = 'image';
        }

        // SEKARANG KITA AKTIFKAN (Pastikan Model Page sudah ada)
        Page::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $contentPath,
            'type' => $type,
        ]);

        return redirect()->route('pages.index')->with('success', 'Menu Profil ' . $request->title . ' Berhasil Ditambahkan!');
    }

    /**
     * Form edit konten (Tempat Admin upload ulang gambar/update teks)
     */
    public function edit($page) 
    {
        // Cari data asli dari database berdasarkan slug
        $pageData = Page::where('slug', $page)->firstOrFail();

        return view('admin.pages.edit', ['page' => $pageData]);
    }

    /**
     * Memproses update gambar dan update konten yang sudah ada.
     */
    public function update(Request $request, $page)
    {
        $request->validate([
            'content_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'title'         => 'required|string|max:255',
        ]);

        $pageModel = Page::where('slug', $page)->firstOrFail();

        if ($request->hasFile('content_image')) {
            // Hapus gambar lama jika ada
            if ($pageModel->content && file_exists(public_path($pageModel->content))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $pageModel->content));
            }

            $path = $request->file('content_image')->store('pages', 'public');
            $pageModel->content = 'storage/' . $path;
            $pageModel->type = 'image';
        }

        $pageModel->title = $request->title;
        $pageModel->save();

        return redirect()->route('pages.index')->with('success', 'Konten Halaman Berhasil Diperbarui!');
    }

    /**
     * Menampilkan detail profil di sisi USER (Masyarakat)
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('pages.profil-detail', compact('page'));
    }

    /**
     * Menghapus menu profil
     */
    public function destroy($page)
    {
        $pageModel = Page::where('slug', $page)->firstOrFail();
        
        // Hapus file gambarnya juga
        if ($pageModel->content) {
            Storage::disk('public')->delete(str_replace('storage/', '', $pageModel->content));
        }

        $pageModel->delete();

        return redirect()->route('pages.index')->with('success', 'Menu Berhasil Dihapus!');
    }
}