@php
    $agency    = config('site.agency');
    $socials   = config('site.socials');
    $officials = config('site.officials');
@endphp

<footer class="bg-[#001a35] border-t border-white/10 pt-12 pb-8 text-white">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

            {{-- KOLOM 1: Logo & Kontak Instansi --}}
            <div class="lg:col-span-4 space-y-6">
                <div class="flex items-center gap-4 mb-6">
                    <img src="{{ asset($agency['logo']) }}"
                         alt="Logo {{ $agency['name_short'] }}"
                         class="h-12 w-auto">
                    <div>
                        <span class="block text-[11px] font-black text-amber-400 uppercase tracking-widest leading-none">
                            {{ $agency['name_short'] }}
                        </span>
                        <span class="block text-xl font-black text-white uppercase mt-1">
                            {{ $agency['province'] }}
                        </span>
                    </div>
                </div>

                <div class="space-y-4 text-sm text-white font-medium">
                    {{-- Alamat --}}
                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5 text-white opacity-80 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>{{ $agency['address'] }}</span>
                    </div>

                    {{-- Email --}}
                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5 text-white opacity-80 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <a href="mailto:{{ $agency['email'] }}"
                           class="hover:text-amber-400 transition-colors">
                            {{ $agency['email'] }}
                        </a>
                    </div>

                    {{-- Telepon --}}
                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5 text-white opacity-80 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span>{{ $agency['phone'] }}</span>
                    </div>
                </div>
            </div>

            {{-- KOLOM 2: Ikuti Kami --}}
            <div class="lg:col-span-3 space-y-6">
                <h4 class="text-[11px] font-black uppercase tracking-[0.3em] text-amber-400">Ikuti Kami</h4>
                <div class="flex flex-col gap-3">
                    @foreach($socials as $social)
                        <x-site.social-link-item :social="$social" />
                    @endforeach
                </div>
            </div>

            {{-- KOLOM 3: Pejabat --}}
            <div class="lg:col-span-5">
                <div class="grid grid-cols-2 gap-6">
                    @foreach($officials as $official)
                        <x-site.official-card :official="$official" />
                    @endforeach
                </div>
            </div>

        </div>

        {{-- Bottom Bar --}}
        <div class="mt-12 pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-white font-bold text-[10px] uppercase tracking-[0.2em]">
                &copy; {{ $agency['copyright_year'] }} {{ $agency['name_short'] }} Sulawesi Tengah. All Rights Reserved.
            </p>
            <div class="flex items-center gap-3">
                <div class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></div>
                <span class="text-white font-black text-[9px] uppercase tracking-[0.4em]">
                    {{ $agency['tagline'] }}
                </span>
            </div>
        </div>
    </div>
</footer>
