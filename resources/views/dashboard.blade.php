<x-app-layout>
    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-10 h-[2px] bg-amber-400"></span>
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em]">Administrator Portal</span>
                    </div>
                    <h1 class="text-4xl font-black text-sulteng-blue uppercase tracking-tighter leading-none">
                        Halo, <span class="text-amber-500">{{ Auth::user()->name }}</span>
                    </h1>
                </div>
                <div class="bg-white px-6 py-3 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4">
                    <div class="text-right">
                        <p class="text-[9px] font-black text-slate-300 uppercase leading-none">Status Server</p>
                        <p class="text-[10px] font-black text-green-500 uppercase mt-1">Sistem Online</p>
                    </div>
                    <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-xl shadow-slate-200/50 group hover:bg-sulteng-blue transition-all duration-500">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 group-hover:text-white/60 transition-colors">Modul Profil</p>
                    <div class="flex items-center justify-between">
                        <h4 class="text-4xl font-black text-sulteng-blue group-hover:text-white transition-colors">
                            {{ str_pad($countProfil ?? 0, 2, '0', STR_PAD_LEFT) }}
                        </h4>
                        <div class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center text-sulteng-blue group-hover:bg-white/10 group-hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-xl shadow-slate-200/50 group hover:bg-amber-500 transition-all duration-500">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 group-hover:text-white/60 transition-colors">Berita Aktif</p>
                    <div class="flex items-center justify-between">
                        <h4 class="text-4xl font-black text-sulteng-blue group-hover:text-white transition-colors">
                            {{ str_pad($countBerita ?? 0, 2, '0', STR_PAD_LEFT) }}
                        </h4>
                        <div class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center text-sulteng-blue group-hover:bg-white/10 group-hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-xl shadow-slate-200/50 group hover:bg-emerald-500 transition-all duration-500">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 group-hover:text-white/60 transition-colors">Foto Galeri</p>
                    <div class="flex items-center justify-between">
                        <h4 class="text-4xl font-black text-sulteng-blue group-hover:text-white transition-colors">
                            {{ str_pad($countGaleri ?? 0, 2, '0', STR_PAD_LEFT) }}
                        </h4>
                        <div class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center text-sulteng-blue group-hover:bg-white/10 group-hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-xl shadow-slate-200/50 group hover:bg-rose-500 transition-all duration-500">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 group-hover:text-white/60 transition-colors">Total Visitor</p>
                    <div class="flex items-center justify-between">
                        <h4 class="text-4xl font-black text-amber-500 group-hover:text-white transition-colors">
                            {{ $countVisitor ?? 0 }}
                        </h4>
                        <div class="w-10 h-10 bg-slate-50 rounded-xl flex items-center justify-center text-sulteng-blue group-hover:bg-white/10 group-hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-10 rounded-[3rem] shadow-2xl border border-slate-100 group transition-all hover:border-amber-400">
                    <div class="flex items-center gap-6 mb-8">
                        <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-3xl flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-black text-sulteng-blue uppercase tracking-tighter">Kelola Beranda</h3>
                            <p class="text-xs text-slate-400 font-medium">Atur foto gedung, slogan, dan link front-end.</p>
                        </div>
                    </div>
                    <a href="/admin/hero-settings" class="block w-full py-4 bg-sulteng-blue text-white rounded-2xl text-center font-black text-[10px] uppercase tracking-widest hover:bg-amber-400 hover:text-sulteng-blue transition-all">Atur Tampilan Depan</a>
                </div>

                <div class="bg-white p-10 rounded-[3rem] shadow-2xl border border-slate-100 group transition-all hover:border-amber-400">
                    <div class="flex items-center gap-6 mb-8">
                        <div class="w-16 h-16 bg-amber-50 text-amber-600 rounded-3xl flex items-center justify-center group-hover:bg-amber-500 group-hover:text-white transition-all">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-black text-sulteng-blue uppercase tracking-tighter">Kelola Navigasi</h3>
                            <p class="text-xs text-slate-400 font-medium">Atur link Navbar dan konten Footer website.</p>
                        </div>
                    </div>
                    <a href="/admin/nav-settings" class="block w-full py-4 bg-slate-100 text-slate-600 rounded-2xl text-center font-black text-[10px] uppercase tracking-widest hover:bg-amber-400 hover:text-sulteng-blue transition-all">Atur Menu Navigasi</a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>