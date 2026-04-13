<style>
    /* CSS Murni agar Dropdown Stabil dan Cepat */
    .dropdown-group:hover .dropdown-box {
        display: block !important;
        opacity: 1 !important;
        transform: translateY(0) !important;
    }
    .dropdown-box {
        display: none;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.2s ease-in-out;
    }
</style>

<nav class="w-full bg-[#003366] border-b border-white/10 sticky top-0 z-[100] shadow-2xl h-20">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-12 h-full">
        <div class="flex justify-between items-center h-full">
            
            {{-- LOGO & BRANDING --}}
            <div class="flex items-center">
                <a href="/" class="flex items-center gap-4 group">
                    <div class="p-1 bg-white rounded-lg shadow-lg transition-transform group-hover:scale-105">
                        <img src="{{ asset('img/logo-sulteng.png') }}" class="h-10 w-auto" alt="Logo">
                    </div>
                    <div class="text-white">
                        <span class="block text-[9px] font-bold uppercase tracking-[0.2em] text-amber-400 leading-none mb-1">Provinsi Sulawesi Tengah</span>
                        <span class="block text-xl font-black tracking-tighter uppercase leading-none">DINAS CIKASDA</span>
                    </div>
                </a>
            </div>

            {{-- NAVIGATION LINKS --}}
            <div class="hidden lg:flex items-center space-x-1 h-full">
                
                {{-- BERANDA --}}
                <a href="/" class="px-4 py-2 text-[11px] font-extrabold text-white uppercase tracking-widest hover:text-amber-400 transition {{ request()->is('/') ? 'text-amber-400' : '' }}">BERANDA</a>
                
                {{-- DROPDOWN PROFIL (SUDAH DINAMIS) --}}
                <div class="relative h-full flex items-center dropdown-group">
                    <button class="flex items-center gap-1 px-4 py-2 text-[11px] font-extrabold text-white uppercase tracking-widest hover:text-amber-400 transition {{ request()->segment(1) == 'profil' ? 'text-amber-400' : '' }}">
                        PROFIL <svg class="w-3 h-3 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="dropdown-box absolute top-[80%] left-0 w-64 p-3 bg-[#002855] border border-white/10 shadow-[0_20px_50px_rgba(0,0,0,0.5)] rounded-2xl z-[110]">
                        <div class="flex flex-col">
                            {{-- LOOPING DARI DATABASE --}}
                            @forelse($nav_profil as $item)
                                <a href="{{ url('/profil/' . $item->slug) }}" 
                                   class="px-4 py-3 text-[10px] font-bold text-white hover:bg-amber-400 hover:text-[#003366] rounded-xl transition uppercase">
                                    {{ $item->title }}
                                </a>
                            @empty
                                <span class="px-4 py-3 text-[10px] font-bold text-white/30 italic text-center uppercase tracking-widest">Belum ada konten</span>
                            @endforelse
                        </div>
                    </div>
                </div>

                {{-- GALERI --}}
                <div class="relative h-full flex items-center dropdown-group">
                    <button class="flex items-center gap-1 px-4 py-2 text-[11px] font-extrabold text-white uppercase tracking-widest hover:text-amber-400 transition">
                        GALERI <svg class="w-3 h-3 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="dropdown-box absolute top-[80%] left-0 w-48 p-3 bg-[#002855] border border-white/10 shadow-2xl rounded-2xl z-[110]">
                        <a href="/galeri/foto" class="block px-4 py-3 text-[10px] font-bold text-white hover:bg-amber-400 hover:text-[#003366] rounded-xl transition uppercase">Foto Kegiatan</a>
                        <a href="/galeri/video" class="block px-4 py-3 text-[10px] font-bold text-white hover:bg-amber-400 hover:text-[#003366] rounded-xl transition uppercase">Video</a>
                    </div>
                </div>

                {{-- INFORMASI PUBLIK --}}
                <div class="relative h-full flex items-center dropdown-group">
                    <button class="flex items-center gap-1 px-4 py-2 text-[11px] font-extrabold text-white uppercase tracking-widest hover:text-amber-400 transition">
                        INFORMASI PUBLIK <svg class="w-3 h-3 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="dropdown-box absolute top-[80%] left-0 w-56 p-3 bg-[#002855] border border-white/10 shadow-2xl rounded-2xl z-[110]">
                        <a href="/informasi/berita" class="block px-4 py-3 text-[10px] font-bold text-white hover:bg-amber-400 hover:text-[#003366] rounded-xl transition uppercase">Berita Terbaru</a>
                        <a href="/informasi/pengumuman" class="block px-4 py-3 text-[10px] font-bold text-white hover:bg-amber-400 hover:text-[#003366] rounded-xl transition uppercase">Pengumuman</a>
                    </div>
                </div>

                {{-- PPID --}}
                <div class="relative h-full flex items-center dropdown-group">
                    <button class="flex items-center gap-1 px-4 py-2 text-[11px] font-extrabold text-white uppercase tracking-widest hover:text-amber-400 transition">
                        PPID <svg class="w-3 h-3 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="dropdown-box absolute top-[80%] left-0 w-64 p-3 bg-[#002855] border border-white/10 shadow-2xl rounded-2xl z-[110]">
                        <a href="/ppid/profil-ppid" class="block px-4 py-3 text-[10px] font-bold text-white hover:bg-amber-400 hover:text-[#003366] rounded-xl transition uppercase">Profil PPID</a>
                        <a href="/ppid/alur-permohonan" class="block px-4 py-3 text-[10px] font-bold text-white hover:bg-amber-400 hover:text-[#003366] rounded-xl transition uppercase">Alur Permohonan</a>
                        <a href="/ppid/formulir-online" class="block px-4 py-3 text-[10px] font-bold text-white hover:bg-amber-400 hover:text-[#003366] rounded-xl transition uppercase">Formulir Online</a>
                    </div>
                </div>

                {{-- LAYANAN --}}
                <div class="relative h-full flex items-center dropdown-group">
                    <button class="flex items-center gap-1 px-4 py-2 text-[11px] font-extrabold text-white uppercase tracking-widest hover:text-amber-400 transition">
                        LAYANAN <svg class="w-3 h-3 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="dropdown-box absolute top-[80%] left-0 w-64 p-3 bg-[#002855] border border-white/10 shadow-2xl rounded-2xl z-[110]">
                        <a href="/layanan/rekomendasi-teknis" class="block px-4 py-3 text-[10px] font-bold text-white hover:bg-amber-400 hover:text-[#003366] rounded-xl transition uppercase">Rekomendasi Teknis</a>
                        <a href="/layanan/pengaduan" class="block px-4 py-3 text-[10px] font-bold text-white hover:bg-amber-400 hover:text-[#003366] rounded-xl transition uppercase">Layanan Pengaduan</a>
                    </div>
                </div>
            </div>

            {{-- SOCIALS & LOGIN --}}
            <div class="flex items-center gap-4">
                <a href="https://instagram.com/cikasdasulteng" target="_blank" rel="noopener noreferrer" class="text-white/70 hover:text-amber-400 transition-colors">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
                <a href="/login" class="px-5 py-2.5 bg-amber-400 text-[#003366] font-black text-[10px] uppercase rounded-full shadow-lg hover:bg-white transition-all transform hover:scale-105">LOGIN PORTAL</a>
            </div>

        </div>
    </div>
</nav>