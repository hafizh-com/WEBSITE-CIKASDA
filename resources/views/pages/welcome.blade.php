<x-guest-layout>

    {{-- ==========================================
         HERO SECTION: FULL SCREEN & SINEMATIK
         ========================================== --}}
    <div class="relative w-full h-screen min-h-[700px] overflow-hidden bg-sulteng-blue">
        <div class="absolute inset-0 bg-gradient-to-r from-sulteng-blue via-sulteng-blue/60 to-transparent z-10"></div>
        
        <img src="{{ asset('img/hero-cikasda.jpg') }}" 
             alt="Gedung CIKASDA" 
             class="absolute inset-0 w-full h-full object-cover z-0 transition-transform duration-[30000ms] hover:scale-110">
        
        <div class="container mx-auto px-6 md:px-12 h-full flex items-center relative z-20">
            <div class="max-w-4xl space-y-8">
                <div class="inline-flex items-center gap-3 px-4 py-2 bg-amber-400 text-sulteng-blue font-black text-[10px] uppercase rounded-full tracking-[0.2em] shadow-blue animate-bounce">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sulteng-blue opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-sulteng-blue"></span>
                    </span>
                    Official Website
                </div>

                <h1 class="text-5xl md:text-8xl font-black text-white leading-[1] tracking-tighter drop-shadow-2xl">
                    Membangun <br>
                    <span class="text-amber-400 italic">Infrastruktur</span> <br>
                    Lebih Tangguh
                </h1>

                <p class="text-lg md:text-xl text-white/80 max-w-xl font-medium leading-relaxed drop-shadow-md">
                    Dedikasi kami dalam mengelola Cipta Karya dan Sumber Daya Air untuk kesejahteraan masyarakat Sulawesi Tengah yang berkelanjutan.
                </p>

                <div class="flex flex-wrap gap-5 pt-4">
                    <a href="#layanan" class="px-10 py-4 bg-amber-400 text-sulteng-blue font-black text-xs uppercase rounded-2xl shadow-blue hover:bg-white hover:-translate-y-1.5 transition-all duration-300">
                        Lihat Layanan
                    </a>
                    <a href="/profil/sejarah-singkat" class="px-10 py-4 bg-white/10 backdrop-blur-md text-white border-2 border-white/20 font-black text-xs uppercase rounded-2xl hover:bg-white/20 hover:border-white hover:-translate-y-1.5 transition-all duration-300">
                        Pelajari Profil
                    </a>
                </div>
            </div>
        </div>

        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-20 animate-bounce">
            <svg class="w-6 h-6 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </div>
    </div>


    {{-- ==========================================
         SECTION 2: FORMULIR LAYANAN (FLOATING CARD)
         ========================================== --}}
    <div class="bg-white py-32 relative z-30">
        <div class="container mx-auto px-6">
            <a href="https://docs.google.com/forms/d/e/1FAIpQLScV-9WxQTrPBMYkH0bg7tzy7M0wJOfWD2eW50dGdf9T3okh8A/viewform" target="_blank" rel="noopener noreferrer" class="block group">
                <div class="max-w-6xl mx-auto p-1 bg-gradient-to-br from-amber-400 to-sulteng-blue rounded-[4rem] shadow-blue-lg overflow-hidden transition-transform duration-500 group-hover:scale-[1.01]">
                    <div class="bg-white rounded-[3.9rem] p-10 md:p-16 flex flex-col md:flex-row items-center gap-12 relative overflow-hidden">
                        
                        <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-amber-100 rounded-full blur-3xl opacity-50 group-hover:opacity-100 transition duration-500"></div>

                        <div class="relative z-10 p-8 bg-slate-50 rounded-[3rem] border border-slate-100 shadow-inner group-hover:bg-amber-400 group-hover:text-sulteng-blue transition-all duration-500">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>

                        <div class="relative z-10 flex-grow space-y-4 text-center md:text-left">
                            <span class="text-[11px] font-bold text-amber-500 uppercase tracking-[0.3em]">Portal Pelayanan</span>
                            <h3 class="text-4xl font-black text-sulteng-blue tracking-tighter uppercase">Formulir Permohonan Informasi</h3>
                            <p class="text-base text-slate-500 font-light leading-relaxed max-w-2xl">
                                Ajukan permohonan informasi publik secara resmi kepada Dinas CIKASDA Sulteng melalui formulir online kami. Proses cepat, transparan, dan akuntabel.
                            </p>
                        </div>

                        <div class="relative z-10 w-16 h-16 flex items-center justify-center rounded-full bg-sulteng-blue text-white group-hover:bg-amber-400 group-hover:text-sulteng-blue transition-all duration-500 group-hover:translate-x-3">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>


    {{-- ==========================================
         SECTION 3: BERITA (MODERN MASONRY STYLE)
         ========================================== --}}
    <div id="berita" class="bg-slate-50 py-32 border-t border-slate-100 shadow-inner">
        <div class="container mx-auto px-6 max-w-7xl">
            
            <div class="flex flex-col md:flex-row justify-between items-end gap-10 mb-20">
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-1 bg-amber-400 rounded-full"></div>
                        <h4 class="text-xs font-bold text-amber-500 uppercase tracking-widest">Warta Terkini</h4>
                    </div>
                    <h3 class="text-5xl font-black text-sulteng-blue tracking-tighter uppercase">Berita & Artikel</h3>
                </div>
                <a href="#" class="group px-8 py-4 bg-sulteng-blue text-white font-bold text-[11px] uppercase rounded-2xl hover:bg-amber-400 hover:text-sulteng-blue transition-all duration-300 shadow-blue flex items-center gap-3">
                    Lihat Semua Berita
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @php
                    $beritas = [
                        ['tag' => 'Pembangunan', 'judul' => 'Peninjauan Progress Irigasi Sigi demi Ketahanan Pangan', 'tgl' => '24 Mar 2026'],
                        ['tag' => 'Lingkungan', 'judul' => 'Modernisasi Pengelolaan Limbah Air Domestik Palu', 'tgl' => '22 Mar 2026'],
                        ['tag' => 'Pelayanan', 'judul' => 'Workshop Kapasitas SDM PPID Dinas CIKASDA', 'tgl' => '20 Mar 2026'],
                    ];
                @endphp

                @foreach($beritas as $b)
                <article class="bg-white rounded-[3.5rem] shadow-blue hover:shadow-blue-lg overflow-hidden group hover:-translate-y-4 transition-all duration-500 border border-slate-100">
                    <div class="h-72 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1596464716127-f2a82984de30?q=80&w=600&h=400&auto=format&fit=crop" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-sulteng-blue/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        <span class="absolute top-8 left-8 px-5 py-2 bg-amber-400 text-sulteng-blue font-black text-[9px] uppercase rounded-full shadow-lg">{{ $b['tag'] }}</span>
                    </div>
                    <div class="p-12 space-y-6">
                        <h2 class="text-2xl font-black text-sulteng-blue leading-tight transition-colors group-hover:text-amber-500">
                            {{ $b['judul'] }}
                        </h2>
                        <div class="flex items-center justify-between pt-6 border-t border-slate-50">
                            <div class="flex items-center gap-2 text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $b['tgl'] }}
                            </div>
                            <span class="text-amber-500 font-black text-[10px] uppercase tracking-widest group-hover:translate-x-2 transition-transform italic">Baca Selengkapnya →</span>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>

</x-guest-layout>