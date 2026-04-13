<x-app-layout>
    <div class="min-h-screen bg-[#f1f5f9] py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            {{-- HEADER & STATISTIK --}}
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 border-b border-slate-200 pb-10">
                <div class="space-y-2">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="px-3 py-1 bg-sulteng-blue text-white text-[9px] font-black uppercase tracking-[0.2em] rounded-md shadow-sm">Admin Panel</span>
                        <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                    </div>
                    <h1 class="text-5xl font-black text-sulteng-blue uppercase tracking-tighter leading-none">
                        Kelola Konten <span class="text-amber-500">Profil</span>
                    </h1>
                </div>

                <div class="flex items-center gap-6">
                    <div class="text-right border-r border-slate-200 pr-6">
                        <p class="text-[10px] font-black text-sulteng-blue uppercase tracking-widest leading-none">Total Modul</p>
                        <p class="text-3xl font-black text-amber-500 mt-2 leading-none">
                            {{ str_pad($pages->count() ?? 0, 2, '0', STR_PAD_LEFT) }}
                        </p>
                    </div>
                    
                    <a href="{{ route('pages.create') }}" 
                    class="bg-amber-400 text-sulteng-blue hover:bg-sulteng-blue hover:text-white px-8 py-4 rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-xl shadow-amber-200/50 transition-all duration-300 transform hover:-translate-y-1">
                        Tambah Menu Baru +
                    </a>
                </div>
            </div>

            {{-- FITUR ADMIN: SEARCH --}}
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-8">
                <div class="relative w-full md:w-96">
                    <input type="text" placeholder="Cari modul profil..." class="w-full pl-12 pr-4 py-3 rounded-2xl border-none shadow-sm focus:ring-2 focus:ring-amber-400 text-sm font-medium text-slate-600">
                    <svg class="w-5 h-5 absolute left-4 top-3.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>

            {{-- GRID CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($pages as $page)
                <div class="bg-white rounded-[3rem] p-10 shadow-[0_20px_60px_rgba(0,0,0,0.03)] border border-slate-100 flex flex-col justify-between transition-all duration-500 hover:shadow-2xl hover:shadow-sulteng-blue/5">
                    
                    <div>
                        <div class="flex items-center justify-between mb-8 pb-6 border-b border-slate-50">
                            <div class="w-16 h-16 bg-slate-50 text-sulteng-blue rounded-2xl flex items-center justify-center shadow-inner">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </div>
                            <div class="flex flex-col items-end gap-1">
                                <span class="px-3 py-1 bg-green-50 text-green-600 rounded-full text-[9px] font-black uppercase tracking-widest leading-none">Live</span>
                                <span class="text-[8px] font-bold text-slate-300 uppercase tracking-widest">ID: {{ $page->id }}</span>
                            </div>
                        </div>

                        {{-- INFO METADATA --}}
                        <div class="mb-8">
                            <p class="text-[9px] font-black text-amber-500 uppercase tracking-[0.2em] mb-1">Judul Halaman:</p>
                            <h3 class="text-2xl font-black text-sulteng-blue uppercase tracking-tighter leading-tight mb-4">{{ $page->title }}</h3>
                            
                            <p class="text-[9px] font-black text-slate-300 uppercase tracking-[0.2em] mb-1">Path URL:</p>
                            <code class="text-[9px] bg-slate-50 px-3 py-1 rounded-lg text-slate-500 font-mono block w-fit border border-slate-100">/profil/{{ $page->slug }}</code>
                        </div>

                        {{-- OPSI PENGEDITAN SPESIFIK --}}
                        <div class="space-y-3 mb-10">
                            <p class="text-[9px] font-black text-slate-300 uppercase tracking-[0.2em] mb-2 ml-1">Kontrol Detail:</p>
                            
                            {{-- EDIT METADATA --}}
                            <a href="{{ route('pages.edit', $page->slug) }}?target=metadata" class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl hover:bg-amber-50 group transition-all">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-white rounded-lg shadow-sm group-hover:text-amber-500 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    </div>
                                    <span class="text-[10px] font-black text-sulteng-blue uppercase tracking-widest">Ubah Judul & Slug</span>
                                </div>
                                <svg class="w-3 h-3 text-slate-300 group-hover:text-amber-500 transition-all group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                            </a>

                            {{-- EDIT NARASI --}}
                            <a href="{{ route('pages.edit', $page->slug) }}?target=narasi" class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl hover:bg-blue-50 group transition-all">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-white rounded-lg shadow-sm group-hover:text-blue-500 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                                    </div>
                                    <span class="text-[10px] font-black text-sulteng-blue uppercase tracking-widest">Update Teks Narasi</span>
                                </div>
                                <svg class="w-3 h-3 text-slate-300 group-hover:text-blue-500 transition-all group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                            </a>

                            {{-- EDIT VISUAL --}}
                            <a href="{{ route('pages.edit', $page->slug) }}?target=visual" class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl hover:bg-emerald-50 group transition-all">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-white rounded-lg shadow-sm group-hover:text-emerald-500 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <span class="text-[10px] font-black text-sulteng-blue uppercase tracking-widest">Update Gambar/Media</span>
                                </div>
                                <svg class="w-3 h-3 text-slate-300 group-hover:text-emerald-500 transition-all group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </div>
                    </div>

                    {{-- FOOTER KARTU --}}
                    <div class="flex items-center justify-between pt-6 border-t border-slate-50">
                        <div class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 rounded-full bg-green-500"></div>
                            <span class="text-[8px] font-black text-slate-400 uppercase tracking-widest leading-none italic">Synchronized with Front-end</span>
                        </div>
                        <form action="{{ route('pages.destroy', $page->slug) }}" method="POST" onsubmit="return confirm('Hapus seluruh modul {{ $page->title }}?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-10 h-10 bg-red-50 text-red-400 rounded-full flex items-center justify-center hover:bg-red-500 hover:text-white transition-all shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-20 text-center bg-white rounded-[3rem] border-2 border-dashed border-slate-200">
                    <p class="text-slate-400 font-bold uppercase tracking-widest">Belum ada modul profil yang ditambahkan.</p>
                </div>
                @endforelse
            </div>

            {{-- FOOTER INFO --}}
            <div class="mt-24 py-10 border-t border-slate-200 flex flex-col md:flex-row justify-between items-center gap-4 text-center md:text-left">
                <p class="text-[9px] font-black text-slate-300 uppercase tracking-[0.4em]">Sistem Manajemen Konten v2.0</p>
                <div class="flex items-center gap-2">
                    <span class="text-[9px] font-black text-sulteng-blue uppercase tracking-widest opacity-40 italic">Handcrafted for CIKASDA Sulteng</span>
                </div>
            </div>

        </div>
    </div>
</x-app-layout> 