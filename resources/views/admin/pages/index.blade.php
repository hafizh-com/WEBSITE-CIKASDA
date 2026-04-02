<x-app-layout>
    <div class="min-h-screen bg-[#f1f5f9] py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                <div class="space-y-2">
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 bg-amber-400 text-[#003366] text-[10px] font-black uppercase tracking-[0.2em] rounded-lg">Admin Panel</span>
                        <div class="h-[1px] w-12 bg-slate-300"></div>
                    </div>
                    <h1 class="text-4xl font-black text-sulteng-blue uppercase tracking-tighter leading-none">
                        Kelola Konten <span class="text-amber-500">Profil</span>
                    </h1>
                    <p class="text-slate-400 text-xs font-medium uppercase tracking-widest">Update informasi publik dinas cikasda sulawesi tengah</p>
                </div>

                {{-- TOMBOL TAMBAH (JIKA PERLU DI MASA DEPAN) --}}
                <div class="flex items-center gap-3">
                    <div class="text-right hidden md:block">
                        <p class="text-[10px] font-black text-sulteng-blue uppercase">Total Modul</p>
                        <p class="text-2xl font-black text-amber-500 leading-none">05</p>
                    </div>
                    <div class="w-[1px] h-10 bg-slate-200 mx-2"></div>
                    <button class="bg-sulteng-blue text-white px-6 py-3 rounded-2xl font-black text-[10px] uppercase tracking-widest shadow-xl shadow-sulteng-blue/20 hover:bg-amber-400 hover:text-sulteng-blue transition-all">
                        Tambah Menu Baru +
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $menus = [
                        ['title' => 'Struktur Organisasi', 'slug' => 'struktur-organisasi', 'color' => 'bg-blue-500', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                        ['title' => 'Visi dan Misi', 'slug' => 'visi-misi', 'color' => 'bg-amber-500', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                        ['title' => 'Tugas dan Fungsi', 'slug' => 'tugas-dan-fungsi', 'color' => 'bg-emerald-500', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                        ['title' => 'Sejarah Singkat', 'slug' => 'sejarah-singkat', 'color' => 'bg-purple-500', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['title' => 'Profil Pejabat', 'slug' => 'pejabat', 'color' => 'bg-rose-500', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                    ];
                @endphp

                @foreach($menus as $menu)
                <div class="group relative bg-white rounded-[3rem] p-10 shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-white hover:border-amber-400 transition-all duration-500 hover:-translate-y-3 overflow-hidden">
                    
                    {{-- BG DECORATION --}}
                    <div class="absolute -right-10 -top-10 w-40 h-40 {{ $menu['color'] }} opacity-[0.03] rounded-full group-hover:scale-150 transition-transform duration-700"></div>

                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-8">
                            <div class="w-16 h-16 {{ $menu['color'] }} text-white rounded-3xl flex items-center justify-center shadow-2xl shadow-current/20 group-hover:rotate-6 transition-transform">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $menu['icon'] }}"></path>
                                </svg>
                            </div>
                            <span class="text-[9px] font-black text-slate-300 uppercase tracking-widest group-hover:text-amber-500 transition-colors">Aktif</span>
                        </div>

                        <h3 class="text-xl font-black text-sulteng-blue uppercase tracking-tighter mb-3 group-hover:text-amber-500 transition-colors">
                            {{ $menu['title'] }}
                        </h3>
                        
                        <p class="text-xs text-slate-400 leading-relaxed font-medium mb-10">
                            Modul ini digunakan untuk memperbarui konten visual dan informasi teks pada halaman {{ $menu['title'] }}.
                        </p>

                        <div class="flex items-center justify-between pt-6 border-t border-slate-50">
                            <a href="{{ route('pages.edit', $menu['slug']) }}" class="flex items-center gap-3 text-[10px] font-black uppercase tracking-widest text-sulteng-blue hover:text-amber-500 transition-all">
                                <span class="px-4 py-2 bg-slate-50 rounded-full group-hover:bg-amber-400 group-hover:text-white transition-colors shadow-sm">Atur Konten</span>
                            </a>
                            
                            <div class="flex gap-2">
                                <button class="p-2 text-slate-300 hover:text-red-500 transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-20 py-8 border-t border-slate-200 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-[9px] font-black text-slate-300 uppercase tracking-[0.4em]">Sistem Informasi Manajemen Konten v2.0</p>
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                    <span class="text-[9px] font-black text-sulteng-blue uppercase tracking-widest opacity-40">Server Sulawesi Tengah Online</span>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>