<x-app-layout>
    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            {{-- NOTIFIKASI BERHASIL --}}
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" 
                     class="mb-6 p-4 bg-green-500 text-white rounded-3xl shadow-lg flex items-center justify-between animate-pulse">
                    <span class="text-xs font-black uppercase tracking-widest pl-4">🚀 {{ session('success') }}</span>
                    <button @click="show = false" class="text-white/50 hover:text-white">&times;</button>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-[0_30px_80px_rgba(0,0,0,0.05)] rounded-[3.5rem] border border-slate-100">
                <div class="p-10 md:p-16">
                    
                    {{-- HEADER FORM DINAMIS --}}
                    <div class="flex items-center justify-between mb-12 border-b border-slate-50 pb-8">
                        <div class="flex items-center gap-5">
                            <div class="w-14 h-14 bg-sulteng-blue rounded-[1.5rem] flex items-center justify-center text-amber-400 shadow-xl shadow-sulteng-blue/20">
                                @if(request('target') == 'metadata')
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                @elseif(request('target') == 'narasi')
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                                @else
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                @endif
                            </div>
                            <div>
                                <h2 class="text-3xl font-black text-sulteng-blue tracking-tighter uppercase leading-none">
                                    Update @if(request('target') == 'metadata') Judul & Slug @elseif(request('target') == 'narasi') Narasi Teks @else Visual @endif
                                </h2>
                                <p class="text-[10px] text-amber-500 font-bold uppercase tracking-[0.3em] mt-2">Modul: {{ $page['title'] }}</p>
                            </div>
                        </div>
                        <a href="{{ route('pages.index') }}" class="p-3 bg-slate-50 text-slate-400 rounded-full hover:bg-red-50 hover:text-red-500 transition-all shadow-inner">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </a>
                    </div>

                    <form action="{{ route('pages.update', $page['slug']) }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="target" value="{{ request('target') }}">

                        {{-- KONDISI 1: EDIT JUDUL & SLUG --}}
                        @if(request('target') == 'metadata')
                            <div x-data="{ 
                                title: '{{ $page['title'] }}', 
                                slug: '{{ $page['slug'] }}',
                                generateSlug() {
                                    this.slug = this.title.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
                                }
                            }" class="space-y-8">
                                <div class="space-y-3">
                                    <label class="block text-[11px] font-black text-sulteng-blue uppercase tracking-[0.2em] ml-2">Judul Halaman Baru</label>
                                    <input type="text" name="title" x-model="title" @input="generateSlug()"
                                           class="w-full px-8 py-5 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-amber-300 focus:border-amber-400 text-sm font-semibold shadow-inner bg-slate-50 transition">
                                </div>
                                <div class="space-y-3">
                                    <label class="block text-[11px] font-black text-sulteng-blue uppercase tracking-[0.2em] ml-2">Slug URL (Otomatis)</label>
                                    <input type="text" name="slug" x-model="slug" readonly
                                           class="w-full px-8 py-5 border border-slate-100 rounded-2xl bg-slate-100 text-slate-400 text-sm font-mono shadow-inner outline-none cursor-not-allowed">
                                    <p class="text-[9px] text-slate-400 font-bold italic ml-4 uppercase tracking-widest">*Mengubah slug akan berpengaruh pada link navigasi user</p>
                                </div>
                            </div>

                        {{-- KONDISI 2: EDIT NARASI (Sangat Aman Untuk Gambar) --}}
                        @elseif(request('target') == 'narasi')
                            <div class="space-y-6">
                                <input type="hidden" name="title" value="{{ $page['title'] }}">
                                <label class="block text-[11px] font-black text-sulteng-blue uppercase tracking-[0.2em] ml-2">
                                    Konten Deskripsi / Narasi Teks
                                </label>
                                
                                <textarea name="content_text" rows="12" 
                                    placeholder="Ketik narasi atau deskripsi di sini..."
                                    class="w-full px-8 py-7 border border-slate-100 rounded-[2.5rem] focus:ring-2 focus:ring-amber-300 focus:border-amber-400 text-sm font-medium shadow-inner bg-slate-50 transition leading-relaxed">{{ 
                                    /* Logika Pelindung: Hanya tampilkan teks asli, bukan path gambar */
                                    Str::contains($page['content'], 'pages/') ? '' : $page['content'] 
                                }}</textarea>
                                
                                <p class="text-[9px] text-slate-400 font-bold italic ml-4 uppercase tracking-widest">
                                    *Mengisi teks di sini tidak akan menghapus gambar yang sudah diunggah sebelumnya.
                                </p>
                            </div>

                        {{-- KONDISI 3: EDIT VISUAL (DENGAN LIVE PREVIEW) --}}
                        @else
                            <div x-data="{ photoPreview: null }" class="space-y-6">
                                <input type="hidden" name="title" value="{{ $page['title'] }}">
                                <label class="block text-[11px] font-black text-sulteng-blue uppercase tracking-[0.2em] ml-2">Pilih Gambar Konten Baru</label>
                                
                                <div class="relative group">
                                    <div class="relative h-96 border-4 border-dashed border-slate-100 rounded-[3rem] flex flex-col items-center justify-center transition-all group-hover:border-amber-400 group-hover:bg-slate-50 overflow-hidden bg-white shadow-inner">
                                        
                                        <input type="file" name="content_image" id="content_image" class="absolute inset-0 w-full h-auto opacity-0 cursor-pointer z-30"
                                            @change="
                                                const file = $event.target.files[0];
                                                if (file) {
                                                    const reader = new FileReader();
                                                    reader.onload = (e) => { photoPreview = e.target.result; };
                                                    reader.readAsDataURL(file);
                                                }
                                            ">
                                        
                                        {{-- Tampilan Sebelum Pilih Gambar (Preview Gambar Lama) --}}
                                        <div x-show="!photoPreview" class="text-center space-y-4">
                                            @if($page->image)
                                                <img src="{{ asset('storage/' . $page->image) }}" class="max-h-64 rounded-2xl shadow-md mb-4 mx-auto border-4 border-white">
                                                <p class="text-[10px] font-black text-amber-500 uppercase tracking-[0.2em]">Gambar Saat Ini (Klik Untuk Ganti)</p>
                                            @else
                                                <div class="w-24 h-24 bg-slate-50 shadow-lg rounded-[2rem] flex items-center justify-center mx-auto text-slate-300 group-hover:text-amber-500 transition-all group-hover:scale-110">
                                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                </div>
                                                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Belum Ada Gambar. Klik Untuk Unggah.</p>
                                            @endif
                                        </div>

                                        {{-- Tampilan Preview Instan Setelah Pilih File --}}
                                        <div x-show="photoPreview" class="absolute inset-0 z-20 bg-white p-4" x-cloak>
                                            <img :src="photoPreview" class="w-full h-full object-contain rounded-[2.5rem] shadow-2xl">
                                            <div class="absolute bottom-6 inset-x-0 flex justify-center">
                                                <div class="bg-green-500 text-white px-6 py-2 rounded-full text-[9px] font-black uppercase tracking-widest shadow-2xl border border-white/20">✨ Gambar Siap Disimpan</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- BUTTONS ACTION --}}
                        <div class="flex items-center justify-end gap-6 pt-10 border-t border-slate-100">
                            <a href="{{ route('pages.index') }}" 
                               class="text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-red-500 transition-colors duration-300">
                                Batalkan Perubahan
                            </a>

                            <button type="submit" 
                                    class="group relative inline-flex items-center justify-center px-12 py-4 font-black text-[11px] uppercase tracking-[0.2em] text-sulteng-blue bg-amber-400 rounded-[2rem] shadow-[0_10px_30px_rgba(251,191,36,0.4)] hover:bg-sulteng-blue hover:text-white hover:shadow-[0_15px_40px_rgba(0,51,102,0.3)] hover:-translate-y-1 transition-all duration-300">
                                <span class="relative flex items-center gap-2">
                                    Simpan Perubahan
                                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            
            <p class="mt-10 text-center text-[10px] font-bold text-slate-300 uppercase tracking-[0.5em]">Dinas Cikasda Sulteng &copy; 2026</p>
        </div>
    </div>
</x-app-layout>