<x-guest-layout>
<div class="min-h-screen bg-slate-50 py-16 relative" x-data="{ isZoomed: false }">

    {{-- TOMBOL KEMBALI PREMIUM --}}
    {{-- Saya ganti ke href="/" atau link dinamis supaya tidak mengandalkan history yang sering error di modal --}}
    <div class="fixed top-24 left-8 z-[2000] hidden lg:block">
        <a href="{{ url('/') }}"
           class="group flex items-center gap-4 bg-white/80 backdrop-blur-xl px-7 py-4 rounded-[2rem] shadow-[0_20px_50px_rgba(0,0,0,0.1)] border border-white/50 hover:bg-sulteng-blue hover:shadow-sulteng-blue/30 transition-all duration-500 transform hover:-translate-x-3">
            
            <div class="w-11 h-11 bg-sulteng-blue rounded-2xl flex items-center justify-center group-hover:bg-amber-400 group-hover:rotate-[-15deg] transition-all duration-500 shadow-lg">
                <svg class="w-5 h-5 text-white group-hover:text-sulteng-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </div>

            <div class="flex flex-col items-start leading-none">
                <span class="text-[9px] font-black uppercase tracking-[0.3em] text-sulteng-blue/40 group-hover:text-amber-200 transition-colors">Navigasi</span>
                <span class="text-[13px] font-black uppercase tracking-tighter text-sulteng-blue group-hover:text-white transition-colors">Kembali</span>
            </div>
        </a>
    </div>

    <div class="container mx-auto px-6 max-w-6xl">
        {{-- HEADER --}}
        <div class="text-center mb-12">
            <span class="inline-block px-4 py-1.5 bg-amber-400 text-sulteng-blue text-[9px] font-black uppercase tracking-[0.3em] rounded-full mb-4 shadow-lg shadow-amber-200">
                Informasi Profil
            </span>
            <h1 class="text-3xl md:text-5xl font-black text-sulteng-blue uppercase tracking-tighter leading-tight">
                {{ $page['title'] ?? 'Informasi CIKASDA' }}
            </h1>
            <div class="w-20 h-1.5 bg-amber-400 mx-auto mt-6 rounded-full"></div>
        </div>

        {{-- KONTEN BOX --}}
        <div class="bg-white p-6 md:p-12 rounded-[3.5rem] shadow-[0_40px_100px_rgba(0,0,0,0.04)] border border-slate-100 overflow-hidden min-h-[500px]">
            
            @if(isset($page['content']) && !empty($page['content']))
                @if(isset($page['type']) && $page['type'] == 'image')
                    {{-- AREA GAMBAR --}}
                    <div class="relative group cursor-zoom-in" @click="isZoomed = true">
                        <div class="overflow-hidden rounded-[2.5rem] border-4 border-slate-50 shadow-inner bg-slate-50">
                            <img src="{{ asset($page['content']) }}" class="w-full h-auto block transition duration-700 group-hover:scale-[1.02]">
                        </div>
                        <div class="absolute inset-0 bg-sulteng-blue/10 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500 backdrop-blur-[2px]">
                            <div class="bg-white text-sulteng-blue px-8 py-3 rounded-full font-black text-[10px] uppercase shadow-2xl transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                Klik Untuk Memperbesar
                            </div>
                        </div>
                    </div>

                    {{-- MODAL ZOOM --}}
                    <template x-teleport="body">
                        <div x-show="isZoomed" 
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             class="fixed inset-0 z-[3000] flex items-center justify-center bg-[#001a35]/95 backdrop-blur-2xl p-4 md:p-12"
                             x-cloak>
                            
                            {{-- Tombol Close X yang SANGAT JELAS --}}
                            <button @click="isZoomed = false" class="absolute top-10 right-10 z-[3001] bg-white/10 hover:bg-red-500 text-white p-4 rounded-full transition-all shadow-2xl group">
                                <svg class="w-8 h-8 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>

                            <img src="{{ asset($page['content']) }}" 
                                 @click.away="isZoomed = false" 
                                 class="max-w-[90%] max-h-[90%] object-contain rounded-xl shadow-[0_0_50px_rgba(0,0,0,0.5)] border border-white/10">
                        </div>
                    </template>
                @else
                    {{-- AREA TEKS --}}
                    <div class="prose prose-slate lg:prose-lg max-w-none text-slate-600 leading-[2] text-justify px-2 md:px-6">
                        {!! nl2br(e($page['content'])) !!}
                    </div>
                @endif
            @else
                {{-- KONTEN KOSONG --}}
                <div class="flex flex-col items-center justify-center py-20 text-center">
                    <div class="w-24 h-24 bg-slate-50 rounded-[2rem] flex items-center justify-center mb-8 shadow-inner border border-slate-100 text-slate-300">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-black text-sulteng-blue uppercase tracking-[0.2em] mb-3">Konten Sedang Diperbarui</h3>
                </div>
            @endif
        </div>
    </div>
</div>
</x-guest-layout>