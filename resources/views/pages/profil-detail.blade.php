<x-guest-layout>
<div class="min-h-screen bg-slate-50 py-16 relative" x-data="{ isZoomed: false }">

    {{-- 1. TOMBOL KEMBALI PREMIUM --}}
    <div class="fixed top-24 left-8 z-[2000] hidden lg:block">
        <a href="{{ url('/') }}"
           class="group flex items-center gap-4 bg-white/80 backdrop-blur-xl px-7 py-4 rounded-[2rem] shadow-[0_20px_50px_rgba(0,0,0,0.1)] border border-white/50 hover:bg-sulteng-blue hover:text-white transition-all duration-500 transform hover:-translate-x-3 text-decoration-none">
            <div class="w-11 h-11 bg-sulteng-blue rounded-2xl flex items-center justify-center group-hover:bg-amber-400 group-hover:rotate-[-15deg] transition-all duration-500 shadow-lg text-white group-hover:text-sulteng-blue">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </div>
            <div class="flex flex-col items-start leading-none">
                <span class="text-[9px] font-black uppercase tracking-[0.3em] text-sulteng-blue/40 group-hover:text-amber-200 transition-colors">Navigasi</span>
                <span class="text-[13px] font-black uppercase tracking-tighter text-sulteng-blue group-hover:text-white transition-colors">Ke Beranda</span>
            </div>
        </a>
    </div>

    <div class="container mx-auto px-6 max-w-6xl">
        
        {{-- 2. HEADER --}}
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 bg-amber-400 text-sulteng-blue text-[9px] font-black uppercase tracking-[0.3em] rounded-full mb-4 shadow-lg shadow-amber-200">
                Eksplorasi Profil
            </span>
            <h1 class="text-3xl md:text-5xl font-black text-sulteng-blue uppercase tracking-tighter leading-tight">
                {{ $page['title'] ?? 'Informasi CIKASDA' }}
            </h1>
            <div class="w-20 h-1.5 bg-amber-400 mx-auto mt-6 rounded-full"></div>
        </div>

        {{-- 3. KONTEN BOX --}}
        <div class="bg-white p-6 md:p-16 rounded-[4rem] shadow-[0_40px_100px_rgba(0,0,0,0.04)] border border-slate-100 min-h-[500px]">
            
            @php
                // AMBIL DATA DARI DUA SUMBER (Kolom image atau content sebagai cadangan)
                $imageSource = $page['image'] ?? $page['content'];
                $textContent = $page['content'];

                // LOGIKA DETEKSI GAMBAR YANG LEBIH KUAT
                $isImage = Str::contains($imageSource, ['pages/', '.jpg', '.jpeg', '.png', '.webp', '.gif']);
                $finalImagePath = null;

                if ($isImage) {
                    // Bersihkan semua kemungkinan double path
                    $cleanPath = str_replace(['storage/', 'public/'], '', $imageSource);
                    $finalImagePath = asset('storage/' . $cleanPath);
                }

                // Cek apakah kolom content benar-benar berisi teks narasi (bukan path gambar)
                $isTextValid = $textContent && !Str::contains($textContent, ['pages/', '.jpg', '.png']);
            @endphp

            <div class="flex flex-col gap-16">
                
                {{-- TAMPILAN GAMBAR --}}
                @if($finalImagePath)
                <div class="relative group cursor-zoom-in" @click="isZoomed = true">
                    <div class="overflow-hidden rounded-[3rem] border-[12px] border-slate-50 shadow-inner bg-slate-50 text-center">
                        <img src="{{ $finalImagePath }}" class="mx-auto max-w-full h-auto block transition duration-700 group-hover:scale-[1.02]" onerror="this.style.display='none'">
                    </div>
                    <div class="absolute inset-0 bg-sulteng-blue/10 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500 backdrop-blur-[2px] rounded-[3rem]">
                        <div class="bg-white text-sulteng-blue px-8 py-3 rounded-full font-black text-[10px] uppercase shadow-2xl">
                            Perbesar Gambar
                        </div>
                    </div>
                </div>
                @endif

                {{-- TAMPILAN TEKS --}}
                @if($isTextValid)
                <div class="relative">
                    <div class="absolute -left-6 -top-4 text-amber-400 opacity-20 text-7xl font-serif">“</div>
                    <div class="prose prose-slate lg:prose-xl max-w-none px-2 md:px-10">
                        <div class="text-slate-600 leading-[2.2] text-justify font-medium tracking-wide first-letter:text-6xl first-letter:font-black first-letter:text-sulteng-blue first-letter:mr-3 first-letter:float-left first-letter:mt-2">
                            {!! nl2br(e($textContent)) !!}
                        </div>
                    </div>
                </div>
                @endif

                {{-- JIKA KOSONG TOTAL --}}
                @if(!$finalImagePath && !$isTextValid)
                <div class="flex flex-col items-center justify-center py-20 text-center text-slate-300">
                    <svg class="w-20 h-20 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <p class="font-black uppercase tracking-widest text-xs text-slate-400">Konten Belum Tersedia di Database</p>
                </div>
                @endif

            </div>

            {{-- MODAL ZOOM --}}
            @if($finalImagePath)
            <template x-teleport="body">
                <div x-show="isZoomed" x-transition x-cloak
                     class="fixed inset-0 z-[3000] flex items-center justify-center bg-[#001a35]/95 backdrop-blur-2xl p-4 md:p-12">
                    <button @click="isZoomed = false" class="absolute top-10 right-10 z-[3001] bg-white/10 hover:bg-red-500 text-white p-4 rounded-full transition-all">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                    <img src="{{ $finalImagePath }}" @click.away="isZoomed = false" class="max-w-[90%] max-h-[90%] object-contain rounded-xl shadow-2xl border border-white/10">
                </div>
            </template>
            @endif

        </div>

        {{-- 4. FOOTER --}}
        <div class="mt-16 border-t border-slate-200 pt-10 text-center">
            <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.5em]">
                &copy; 2026 DINAS CIPTA KARYA & SUMBER DAYA AIR PROVINSI SULAWESI TENGAH
            </p>
        </div>
    </div>
</div>
</x-guest-layout>