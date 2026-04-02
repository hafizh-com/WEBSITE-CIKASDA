<x-app-layout>
    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            {{-- NOTIFIKASI BERHASIL --}}
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" 
                     class="mb-6 p-4 bg-green-500 text-white rounded-3xl shadow-lg flex items-center justify-between">
                    <span class="text-xs font-black uppercase tracking-widest pl-4">🚀 {{ session('success') }}</span>
                    <button @click="show = false" class="text-white/50 hover:text-white">&times;</button>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-[0_30px_80px_rgba(0,0,0,0.05)] rounded-[3.5rem] border border-slate-100">
                <div class="p-10 md:p-16">
                    
                    {{-- HEADER FORM --}}
                    <div class="flex items-center justify-between mb-12">
                        <div class="flex items-center gap-5">
                            <div class="w-14 h-14 bg-sulteng-blue rounded-[1.5rem] flex items-center justify-center text-amber-400 shadow-xl shadow-sulteng-blue/20">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                            </div>
                            <div>
                                <h2 class="text-3xl font-black text-sulteng-blue tracking-tighter uppercase leading-none">Update Visual</h2>
                                <p class="text-[10px] text-amber-500 font-bold uppercase tracking-[0.3em] mt-2">Halaman: {{ $page['title'] }}</p>
                            </div>
                        </div>
                        <a href="{{ route('pages.index') }}" class="p-3 bg-slate-50 text-slate-400 rounded-full hover:bg-red-50 hover:text-red-500 transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </a>
                    </div>

                    <form action="{{ route('pages.update', $page['slug']) }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                        @csrf
                        @method('PUT')

                        {{-- INPUT JUDUL (OTOMATIS) --}}
                        <input type="hidden" name="title" value="{{ $page['title'] }}">

                        {{-- GANTI BAGIAN AREA UPLOAD DI FILE EDIT.BLADE.PHP DENGAN INI --}}
                        <div x-data="{ photoPreview: null }" class="space-y-6">
                            <label class="block text-[11px] font-black text-sulteng-blue uppercase tracking-[0.2em] ml-2">
                                Pilih Gambar Konten
                            </label>
                            
                            <div class="relative group">
                                {{-- Dropzone & Preview Box --}}
                                <div class="relative h-96 border-4 border-dashed border-slate-100 rounded-[3rem] flex flex-col items-center justify-center transition-all group-hover:border-amber-400 group-hover:bg-slate-50 overflow-hidden bg-white shadow-inner">
                                    
                                    {{-- Input File (Hidden but clickable) --}}
                                    <input type="file" name="content_image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-30"
                                        @change="
                                                const file = $event.target.files[0];
                                                if (file) {
                                                    const reader = new FileReader();
                                                    reader.onload = (e) => { photoPreview = e.target.result; };
                                                    reader.readAsDataURL(file);
                                                }
                                        ">
                                    
                                    {{-- 1. TAMPILAN AWAL (KOSONG) --}}
                                    <div x-show="!photoPreview" class="text-center space-y-4">
                                        <div class="w-24 h-24 bg-slate-50 shadow-lg rounded-[2rem] flex items-center justify-center mx-auto text-slate-300 group-hover:text-amber-500 transition-all group-hover:scale-110">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Klik atau Seret Gambar Ke Sini</p>
                                    </div>

                                    {{-- 2. TAMPILAN PREVIEW (SETELAH PILIH GAMBAR) --}}
                                    <div x-show="photoPreview" x-cloak class="absolute inset-0 z-20 bg-white p-2">
                                        <img :src="photoPreview" class="w-full h-full object-contain rounded-[2.5rem] shadow-2xl">
                                        
                                        {{-- Overlay Informasi --}}
                                        <div class="absolute bottom-6 inset-x-0 flex justify-center">
                                            <div class="bg-sulteng-blue/90 backdrop-blur-md text-white px-6 py-2 rounded-full text-[9px] font-black uppercase tracking-widest shadow-2xl border border-white/20">
                                                ✨ Pratinjau Gambar Baru
                                            </div>
                                        </div>

                                        {{-- Tombol Ganti Cepat --}}
                                        <div class="absolute top-6 right-6">
                                            <div class="bg-amber-400 text-[#003366] px-4 py-2 rounded-2xl text-[9px] font-black uppercase shadow-xl">
                                                Siap Diunggah
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-[9px] text-slate-400 font-bold italic ml-4 uppercase tracking-widest">*Pastikan resolusi gambar tinggi agar tidak pecah</p>
                        </div>
                        {{-- BUTTONS --}}
                        <div class="flex items-center justify-end gap-4 pt-6">
                            <a href="{{ route('pages.index') }}" class="px-10 py-4 bg-slate-100 text-slate-500 rounded-2xl font-black text-[11px] uppercase tracking-widest hover:bg-red-50 hover:text-red-600 transition-all">
                                Batal
                            </a>
                            <button type="submit" class="px-12 py-4 bg-sulteng-blue text-white rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-2xl shadow-sulteng-blue/30 hover:bg-amber-400 hover:text-sulteng-blue hover:-translate-y-1 transition-all duration-300">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            
            {{-- FOOTER KECIL --}}
            <p class="mt-10 text-center text-[10px] font-bold text-slate-300 uppercase tracking-[0.5em]">Dinas Cikasda Sulteng &copy; 2026</p>
        </div>
    </div>
</x-app-layout>