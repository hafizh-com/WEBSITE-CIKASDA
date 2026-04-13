namespace App\Http\Controllers;

use App\Models\Page; // Sesuaikan dengan nama model tabel pages kamu
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfilController extends Controller
{
    // Ini untuk menampilkan halaman ke publik/user
    public function show($slug)
    {
        // Ambil data dari tabel pages berdasarkan slug
        $page = Page::where('slug', $slug)->firstOrFail();

        return view('pages.profil-detail', compact('page'));
    }

    // Ini fungsi yang kamu inginkan: Admin menginput/update modul ke DB
    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Logika Upload Gambar jika ada
        $imagePath = $request->old_image; // default pakai yang lama
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('pages', 'public');
        }

        // Simpan ke Database (Jika slug sudah ada, dia akan update. Jika belum, dia buat baru)
        Page::updateOrCreate(
            ['slug' => Str::slug($request->title)],
            [
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath,
            ]
        );

        return back()->with('success', 'Modul profil berhasil diperbarui di database!');
    }
}