<x-app-layout>
    <div class="min-h-screen bg-[#f4f7fa] relative overflow-hidden flex flex-col">
        
        {{-- 1. BACKGROUND DYNAMIC --}}
        <div class="absolute top-0 left-0 w-full h-125 bg-linear-to-br from-[#002a52] via-[#004488] to-sulteng-blue -skew-y-6 origin-top-left shadow-2xl z-0">
            <div class="absolute inset-0 bg-black/15"></div>
        </div>

        {{-- 2. MAIN CONTENT AREA (TANPA SIDEBAR) --}}
        <main class="flex-1 relative z-10 p-6 md:p-12 overflow-y-auto h-screen">
            
            {{-- HEADER / TOPBAR --}}
            <header class="flex items-center justify-between mb-12">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-lg rotate-3">
                        <img src="{{ asset('img/logo-cikasda.png') }}" class="w-6 h-6 object-contain" onerror="this.src='https://ui-avatars.com/api/?name=C&background=fff&color=003366'">
                    </div>
                    <div>
                        <h2 class="text-amber-400 text-[9px] font-black uppercase tracking-[0.4em] drop-shadow-sm">System Overview</h2>
                        <p class="text-white text-xl font-black uppercase tracking-tighter drop-shadow-md leading-none">Command Center</p>
                    </div>
                </div>

                <div class="bg-black/20 backdrop-blur-2xl px-5 py-2.5 rounded-2xl border border-white/20 flex items-center gap-3">
                    <div class="h-2.5 w-2.5 bg-green-500 rounded-full animate-pulse shadow-[0_0_8px_#22c55e]"></div>
                    <span class="text-[9px] font-black text-white uppercase tracking-widest">Sistem Online</span>
                </div>
            </header>

            {{-- WELCOME AREA (FONT SUDAH DIKECILKAN) --}}
            <div class="mb-16 flex flex-col lg:flex-row items-center gap-10">
                <div class="flex-1 text-center lg:text-left">
                    <h1 class="text-5xl md:text-7xl font-black text-white tracking-tighter uppercase leading-[0.9] mb-6">
                        HALO, <span class="text-amber-400 drop-shadow-lg">{{ Auth::user()->name }}</span>
                    </h1>
                    <p class="text-white text-xs font-bold uppercase tracking-[0.3em] leading-relaxed max-w-xl opacity-90 border-l-2 border-amber-400 pl-4">
                        Pusat kendali informasi Dinas Cikasda Sulteng. Kelola data dengan integritas tinggi.
                    </p>
                </div>
                <div class="hidden lg:block w-56 h-56 bg-white/10 backdrop-blur-3xl rounded-[4rem] border border-white/10 p-6 rotate-3 shadow-2xl">
                    <img src="https://cdn-icons-png.flaticon.com/512/6024/6024190.png" class="w-full h-full object-contain filter drop-shadow-xl">
                </div>
            </div>

            {{-- STATS GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-16">
                @php
                    $stats = [
                        ['label' => 'Total Modul', 'value' => str_pad($countProfil ?? 0, 2, '0', STR_PAD_LEFT), 'icon' => 'folder'],
                        ['label' => 'Berita Baru', 'value' => str_pad($countBerita ?? 0, 2, '0', STR_PAD_LEFT), 'icon' => 'mail'],
                        ['label' => 'Foto Galeri', 'value' => str_pad($countGaleri ?? 0, 2, '0', STR_PAD_LEFT), 'icon' => 'image'],
                        ['label' => 'Visitor', 'value' => $countVisitor ?? '00', 'icon' => 'eye'],
                    ];
                @endphp

                @foreach($stats as $s)
                <div class="bg-white rounded-[3rem] p-8 shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-white hover:-translate-y-2 transition-all duration-500">
                    <div class="w-12 h-12 bg-slate-50 rounded-xl flex items-center justify-center text-sulteng-blue mb-5 shadow-inner">
                        <svg class="w-6 h-6 stroke-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if($s['icon'] == 'folder') <path d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                            @elseif($s['icon'] == 'mail') <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            @elseif($s['icon'] == 'image') <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            @else <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            @endif
                        </svg>
                    </div>
                    <h4 class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">{{ $s['label'] }}</h4>
                    <span class="text-4xl font-black text-sulteng-blue tracking-tighter">{{ $s['value'] }}</span>
                </div>
                @endforeach
            </div>

            {{-- LOG AKTIVITAS (SIMPLIFIED) --}}
            <div class="max-w-xl">
                <div class="bg-[#002a52] rounded-[3.5rem] p-10 text-white shadow-2xl border border-white/10">
                    <h3 class="text-lg font-black uppercase tracking-tighter mb-8 flex items-center gap-3">
                        <span class="w-1.5 h-6 bg-amber-400 rounded-full"></span>
                        Aktivitas
                    </h3>
                    <div class="space-y-8">
                        @forelse($recentActivities as $activity)
                        <div class="flex items-center gap-5">
                            <div class="w-2.5 h-2.5 bg-amber-400 rounded-full animate-pulse shadow-[0_0_10px_#fbbf24]"></div>
                            <div class="flex flex-col leading-tight">
                                <span class="text-[11px] font-black uppercase tracking-widest">{{ Auth::user()->name }}</span>
                                <span class="text-[9px] text-white/40 font-bold uppercase">Update: {{ $activity->title }} • {{ $activity->updated_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        @empty
                        <p class="text-[9px] text-white/20 font-black uppercase tracking-widest">Belum ada aktivitas</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>