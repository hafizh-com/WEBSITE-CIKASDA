<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all(); 
        return view('admin.pages.index', compact('pages'));
    }

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
        $imagePath = null;
        $type = 'text';

        if ($request->hasFile('content_image')) {
            // SIMPAN PATH MURNI: pages/namafile.jpg (Tanpa tambahan 'storage/')
            $imagePath = $request->file('content_image')->store('pages', 'public');
            $type = 'image';
        }

        Page::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content_text ?? null, // Simpan teks jika ada
            'image' => $imagePath, // MASUKKAN KE KOLOM IMAGE
            'type' => $type,
        ]);

        return redirect()->route('pages.index')->with('success', 'Menu Profil ' . $request->title . ' Berhasil Ditambahkan!');
    }

    public function edit($slug) 
    {
        $pageData = Page::where('slug', $slug)->firstOrFail();
        return view('admin.pages.edit', ['page' => $pageData]);
    }

    /**
     * Memproses update metadata, narasi, atau visual.
     */
            public function update(Request $request, $slug)
            {
                // Cari data berdasarkan slug asli
                $page = Page::where('slug', $slug)->firstOrFail();

                // 1. Update Metadata (Judul & Slug)
                if ($request->target == 'metadata') {
                    $page->update([
                        'title' => $request->title,
                        // Jika judul berubah, slug juga ikut berubah otomatis
                        'slug' => Str::slug($request->title)
                    ]);
                } 
                
                // 2. Update Narasi (Hanya update kolom content, gambar di kolom image TETAP AMAN)
                else if ($request->target == 'narasi') {
                    $page->update([
                        'content' => $request->content_text
                    ]);
                } 
                
                // 3. Update Visual (Hanya update kolom image, teks di kolom content TETAP AMAN)
                else if ($request->target == 'visual') {
                    if ($request->hasFile('content_image')) {
                        // Hapus foto lama di storage jika ada agar tidak memenuhi server
                        if ($page->image) {
                            Storage::disk('public')->delete($page->image);
                        }

                        // Simpan file ke folder storage/app/public/pages
                        $path = $request->file('content_image')->store('pages', 'public');
                        
                        // Simpan path MURNI ke database
                        $page->update([
                            'image' => $path,
                            'type' => 'hybrid' // Kita beri label hybrid agar sistem tahu ada teks & gambar
                        ]);
                    }   
                }

                // Kembali ke index dengan pesan sukses dinamis
                return redirect()->route('pages.index')->with('success', 'Modul ' . $page->title . ' bagian ' . $request->target . ' berhasil diperbarui!');
            }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('pages.profil-detail', compact('page'));
    }

    public function destroy($slug)
    {
        $pageModel = Page::where('slug', $slug)->firstOrFail();
        
        // Hapus file fisik jika ada
        if ($pageModel->image) {
            Storage::disk('public')->delete($pageModel->image);
        }

        $pageModel->delete();
        return redirect()->route('pages.index')->with('success', 'Menu Berhasil Dihapus!');
    }
}