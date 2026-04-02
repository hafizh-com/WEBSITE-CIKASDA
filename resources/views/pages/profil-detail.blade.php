<x-guest-layout>
<div class="min-h-screen bg-slate-50 py-16">
    <div class="container mx-auto px-6 max-w-6xl">
        
        {{-- JUDUL HALAMAN DINAMIS --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-black text-sulteng-blue uppercase tracking-tighter">
                {{ $page['title'] ?? 'Informasi CIKASDA' }}
            </h1>
            <div class="w-20 h-1.5 bg-amber-400 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="bg-white p-8 md:p-12 rounded-[3.5rem] shadow-2xl border border-slate-100 overflow-hidden min-h-[450px] flex flex-col justify-center">
            
            {{-- LOGIKA: TAMPILKAN HANYA JIKA ADA DATA DARI DATABASE --}}
            @if(isset($page['content']) && !empty($page['content']))

                {{-- 1. JIKA DATA BERUPA GAMBAR (STRUKTUR/VISI MISI HASIL UPLOAD ADMIN) --}}
                @if(isset($page['type']) && $page['type'] == 'image')
                    <div x-data="{ open: false }">
                        <div class="relative group cursor-zoom-in" @click="open = true">
                            <div class="overflow-hidden rounded-3xl border-4 border-slate-100 shadow-inner bg-slate-50">
                                <img src="{{ asset($page['content']) }}" class="w-full h-auto block transition duration-500 group-hover:scale-[1.01]">
                            </div>
                            <div class="absolute inset-0 bg-sulteng-blue/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                                <span class="bg-white text-sulteng-blue px-6 py-2 rounded-full font-black text-[10px] uppercase shadow-2xl">Klik Untuk Memperbesar</span>
                            </div>
                        </div>

                        {{-- MODAL ZOOM --}}
                        <div x-show="open" x-cloak 
                             class="fixed inset-0 z-[999] flex items-center justify-center bg-[#001a35]/95 backdrop-blur-xl p-4 md:p-12" 
                             @click="open = false" @keydown.escape.window="open = false">
                            <img src="{{ asset($page['content']) }}" class="max-w-full max-h-full object-contain rounded-lg shadow-2xl transition-transform transform scale-100">
                        </div>
                    </div>

                {{-- 2. JIKA DATA BERUPA TEKS/ARTIKEL (HASIL KETIKAN ADMIN) --}}
                @else
                    <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed text-justify">
                        {!! $page['content'] !!}
                    </div>
                @endif

            {{-- 3. JIKA KOSONG (ADMIN BELUM MENGISI) --}}
            @else
                <div class="text-center py-12">
                    <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner border border-slate-100">
                        <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Konten Belum Tersedia</h3>
                    <p class="text-slate-400 text-xs font-medium italic max-w-sm mx-auto">
                        Maaf, informasi untuk halaman ini sedang dalam tahap pembaharuan oleh Admin Dinas CIKASDA Sulteng.
                    </p>
                </div>
            @endif

        </div>
    </div>
</div>
</x-guest-layout>