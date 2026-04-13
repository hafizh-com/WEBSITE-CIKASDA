<nav x-data="{ profilOpen: false, userOpen: false }" 
     class="fixed top-0 left-0 right-0 w-full h-20 bg-[#003366] border-b border-white/10 shadow-lg z-999999">
    
    <div class="max-w-7xl mx-auto px-4 h-full flex justify-between items-center relative z-999999">
        
        <div class="flex items-center gap-8">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 cursor-pointer relative z-999999">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                    <img src="{{ asset('img/logo-cikasda.png') }}" class="w-6 h-6 object-contain">
                </div>
                <div class="flex flex-col text-white font-bold leading-none">
                    <span class="text-[8px] opacity-50 uppercase tracking-widest">Administrator</span>
                    <span class="text-lg tracking-tighter">CIKASDA</span>
                </div>
            </a>

            <div class="hidden md:flex items-center space-x-6 ml-4">
                <a href="{{ route('dashboard') }}" class="text-xs font-bold uppercase tracking-wider text-white hover:text-amber-400 transition-all cursor-pointer">
                    Beranda
                </a>

                <div class="relative inline-block text-left">
                    <button @click="profilOpen = !profilOpen" @click.away="profilOpen = false" 
                            type="button"
                            class="flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-white hover:text-amber-400 outline-none cursor-pointer border-none bg-transparent py-2">
                        <span>Profil</span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="profilOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>

                    <div x-show="profilOpen" 
                         x-cloak 
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         class="absolute left-0 mt-3 w-64 bg-white rounded-xl shadow-2xl py-2 z-1000000 border border-slate-100 ring-1 ring-black ring-opacity-5 focus:outline-none">
                        
                        <a href="{{ route('pages.index') }}" class="block px-6 py-3 text-[10px] font-black text-amber-500 uppercase hover:bg-amber-50 border-b border-slate-50 cursor-pointer">
                             Kelola Semua Modul
                        </a>

                        @php
                            $listProfil = \App\Models\Page::select('title', 'slug')->get();
                        @endphp

                        @forelse($listProfil as $item)
                            <a href="{{ route('profil.show', $item->slug) }}" class="block px-6 py-3 text-[10px] font-bold text-slate-600 uppercase hover:bg-slate-50 hover:text-[#003366] cursor-pointer">
                                {{ $item->title }}
                            </a>
                        @empty
                            <p class="px-6 py-3 text-[9px] text-slate-400 italic">Belum ada modul</p>
                        @endforelse
                    </div>
                </div>

                <a href="#" class="text-xs font-bold uppercase tracking-wider text-white hover:text-amber-400 cursor-pointer">Galeri</a>
            </div>
        </div>

        <div class="relative">
            <button @click="userOpen = !userOpen" @click.away="userOpen = false" 
                    class="flex items-center gap-3 bg-white/10 px-4 py-2 rounded-lg border border-white/10 outline-none cursor-pointer">
                <span class="text-[10px] font-bold text-white uppercase">{{ Auth::user()->name }}</span>
                <div class="w-8 h-8 bg-amber-400 rounded-md flex items-center justify-center text-[#003366] font-bold">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
            </button>

            <div x-show="userOpen" x-cloak class="absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-2xl py-2 z-1000000 border border-slate-100">
                <a href="{{ route('profile.edit') }}" class="block px-6 py-3 text-[10px] font-bold text-slate-600 uppercase hover:bg-slate-50 cursor-pointer">Akun Saya</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-6 py-3 text-[10px] font-bold text-red-500 uppercase hover:bg-red-50 cursor-pointer">Keluar</button>
                </form>
            </div>
        </div>
    </div>
</nav>