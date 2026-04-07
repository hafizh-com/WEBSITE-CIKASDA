<x-app-layout>
    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Tambahkan Alpine.js x-data di sini untuk kontrol judul dan slug --}}
            <div x-data="{ 
                title: '', 
                slug: '',
                generateSlug() {
                    this.slug = this.title
                        .toLowerCase()
                        .replace(/[^\w ]+/g, '')
                        .replace(/ +/g, '-');
                }
            }" class="bg-white overflow-hidden shadow-2xl rounded-[3.5rem] border border-slate-100">
                
                <div class="p-10 md:p-16">
                    
                    {{-- HEADER FORM --}}
                    <div class="flex items-center justify-between mb-12 border-b border-slate-100 pb-8">
                        <div class="flex items-center gap-5">
                            <div class="w-16 h-16 bg-sulteng-blue rounded-3xl flex items-center justify-center text-amber-400 shadow-xl shadow-sulteng-blue/20">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            </div>
                            <div>
                                <h2 class="text-3xl font-black text-sulteng-blue tracking-tighter uppercase leading-none">Buat Menu <span class="text-amber-500">Baru</span></h2>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-[0.3em] mt-2">Tambahkan modul profil baru ke website</p>
                            </div>
                        </div>
                        <a href="{{ route('pages.index') }}" class="p-3 bg-slate-50 text-slate-400 rounded-full hover:bg-red-50 hover:text-red-500 transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </a>
                    </div>

                    <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                        @csrf

                        {{-- INPUT JUDUL MENU --}}
                        <div class="space-y-3">
                            <label class="block text-[11px] font-black text-sulteng-blue uppercase tracking-[0.2em] ml-2">Judul Menu Profil</label>
                            <input type="text" name="title" x-model="title" @input="generateSlug()"
                                placeholder="Contoh: Sejarah Dinas, Maklumat Pelayanan, dll." 
                                class="w-full px-8 py-5 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-amber-300 focus:border-amber-400 text-sm font-semibold shadow-inner bg-slate-50 transition" required>
                        </div>

                        {{-- INPUT SLUG (OTOMATIS TERISI) --}}
                        <div class="space-y-3">
                            <label class="block text-[11px] font-black text-sulteng-blue uppercase tracking-[0.2em] ml-2">Slug URL (Otomatis)</label>
                            <input type="text" name="slug" x-model="slug" readonly
                                placeholder="sejarah-dinas" 
                                class="w-full px-8 py-5 border border-slate-100 rounded-2xl bg-slate-100 text-slate-500 text-xs font-mono shadow-inner outline-none">
                            <p class="text-[9px] text-slate-400 italic ml-2">*Slug akan terisi otomatis berdasarkan judul untuk keperluan URL.</p>
                        </div>

                        {{-- AREA UPLOAD GAMBAR DENGAN PREVIEW --}}
                        <div x-data="{ photoPreview: null }" class="space-y-4">
                            <label class="block text-[11px] font-black text-sulteng-blue uppercase tracking-[0.2em] ml-2">Upload Gambar Konten (Optional)</label>
                            
                            <div class="relative h-80 border-4 border-dashed border-slate-100 rounded-[2.5rem] flex flex-col items-center justify-center transition hover:border-amber-400 group bg-slate-50 overflow-hidden shadow-inner">
                                <input type="file" name="content_image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20"
                                    @change="
                                        const file = $event.target.files[0];
                                        if (file) {
                                            const reader = new FileReader();
                                            reader.onload = (e) => { photoPreview = e.target.result; };
                                            reader.readAsDataURL(file);
                                        }
                                    ">
                                
                                <div x-show="!photoPreview" class="text-center space-y-3">
                                    <svg class="mx-auto h-12 w-12 text-slate-300 group-hover:text-amber-500 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Klik atau seret gambar ke sini</p>
                                </div>

                                <div x-show="photoPreview" x-cloak class="absolute inset-0 p-4 bg-white z-10 flex items-center justify-center">
                                    <img :src="photoPreview" class="max-w-full max-h-full object-contain rounded-[2rem] shadow-2xl">
                                    <div class="absolute bottom-4 bg-amber-400 text-sulteng-blue px-4 py-1 rounded-full text-[9px] font-black uppercase shadow-lg">Preview Gambar</div>
                                </div>
                            </div>
                        </div>

                        {{-- BUTTONS --}}
                        <div class="flex items-center justify-end gap-6 pt-10 border-t border-slate-100">
                            <a href="{{ route('pages.index') }}" class="text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-red-500 transition-colors">
                                Batal
                            </a>
                            <button type="submit" class="px-12 py-4 bg-sulteng-blue text-white rounded-[2rem] font-black text-[11px] uppercase tracking-[0.2em] shadow-xl shadow-sulteng-blue/30 hover:bg-amber-400 hover:text-sulteng-blue transition-all duration-300">
                                Buat Menu Sekarang
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>