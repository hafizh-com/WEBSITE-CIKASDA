<nav x-data="{ open: false, profilOpen: false, userOpen: false }" 
     class="fixed top-0 left-0 right-0 w-full h-24 bg-[#003366] border-b border-white/10 flex items-center shadow-2xl isolate"
     style="background-color: #003366 !important; z-index: 9999999 !important; position: fixed !important; pointer-events: auto !important;">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full relative z-[10000000] pointer-events-auto">
        <div class="flex justify-between items-center h-full">
            
            <div class="flex items-center gap-12">
                <div class="shrink-0 flex items-center relative z-[10000001]">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group pointer-events-auto cursor-pointer">
                        <div class="w-11 h-11 bg-white rounded-xl flex items-center justify-center shadow-lg group-hover:rotate-6 transition-all duration-500">
                            <img src="{{ asset('img/logo-cikasda.png') }}" class="w-7 h-7 object-contain" onerror="this.src='https://ui-avatars.com/api/?name=C&background=fff&color=003366'">
                        </div>
                        <div class="flex flex-col leading-none">
                            <span class="text-[9px] font-black text-white/40 uppercase tracking-[0.4em]">Administrator</span>
                            <span class="text-xl font-black text-white uppercase tracking-tighter">CIKASDA</span>
                        </div>
                    </a>
                </div>

                <div class="hidden space-x-10 sm:flex items-center relative z-[10000001] pointer-events-auto">
                    
                    <a href="{{ route('dashboard') }}" 
                       class="text-[13px] font-black uppercase tracking-[0.2em] {{ request()->routeIs('dashboard') ? 'text-amber-400' : 'text-white hover:text-amber-200' }} transition-all duration-300 pointer-events-auto cursor-pointer">
                        BERANDA
                    </a>

                    <div class="relative pointer-events-auto" @click.away="profilOpen = false">
                        <button @click="profilOpen = !profilOpen" type="button"
                                class="flex items-center gap-2 text-[13px] font-black uppercase tracking-[0.2em] {{ request()->routeIs('pages.*') ? 'text-amber-400' : 'text-white hover:text-amber-200' }} transition-all cursor-pointer pointer-events-auto bg-transparent border-none outline-none py-4">
                            <span>PROFIL</span>
                            <svg class="w-4 h-4 transition-transform duration-300" :class="profilOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <div x-show="profilOpen" 
                             x-cloak 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             class="absolute left-0 mt-2 w-64 bg-white rounded-[2rem] shadow-[0_30px_60px_rgba(0,0,0,0.5)] py-4 border border-slate-100 z-[10000002] pointer-events-auto overflow-hidden">
                            
                            <a href="{{ route('pages.index') }}" 
                               class="block px-8 py-4 text-[11px] font-black text-sulteng-blue uppercase tracking-widest hover:bg-slate-50 hover:text-amber-500 transition-all cursor-pointer">
                                Kelola Modul Profil
                            </a>
                        </div>
                    </div>

                    <a href="#" class="text-[13px] font-black uppercase tracking-[0.2em] text-white hover:text-amber-200 transition-all cursor-pointer pointer-events-auto">GALERI</a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center relative z-[10000001] pointer-events-auto">
                <div class="relative" @click.away="userOpen = false">
                    <button @click="userOpen = !userOpen" type="button"
                            class="flex items-center gap-4 bg-white/10 hover:bg-white/20 px-6 py-3 rounded-2xl border border-white/10 transition-all duration-500 shadow-inner cursor-pointer pointer-events-auto outline-none">
                        <div class="flex flex-col items-end leading-none text-white font-black">
                            <span class="text-[11px] uppercase tracking-tighter">{{ Auth::user()->name }}</span>
                            <span class="text-[8px] text-amber-400 uppercase tracking-[0.3em] mt-1">Super Admin</span>
                        </div>
                        <div class="w-10 h-10 bg-amber-400 rounded-xl flex items-center justify-center text-sulteng-blue font-black text-sm shadow-lg">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                    </button>

                    <div x-show="userOpen" x-cloak x-transition class="absolute right-0 mt-4 w-56 bg-white rounded-[2rem] shadow-2xl py-3 border border-slate-100 overflow-hidden z-[10000002] pointer-events-auto">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-8 py-4 text-[11px] font-black text-red-500 uppercase tracking-widest hover:bg-red-50 transition-all flex items-center gap-3 cursor-pointer border-none bg-transparent">
                                Keluar Sistem
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</nav>