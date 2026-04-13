@props(['official'])

<div class="text-center group flex flex-col items-center">
    <div class="relative overflow-hidden rounded-2xl bg-white/5 border border-white/10 shadow-xl mb-3 transition-all duration-300 group-hover:border-amber-400">
        <img src="{{ asset($official['image']) }}"
             alt="{{ $official['alt'] }}"
             class="w-full h-44 object-contain transition-transform duration-500 group-hover:scale-105">
        <div class="absolute inset-x-0 bottom-0 h-10 bg-gradient-to-t from-[#001a35] to-transparent"></div>
    </div>
    <div class="w-full">
        <span class="block text-[8px] font-black text-amber-400 uppercase tracking-widest leading-none mb-0.5">
            {{ $official['title'] }}
        </span>
        <span class="block text-[9px] font-black text-white/90 uppercase tracking-tighter truncate">
            {{ $official['name'] }}
        </span>
    </div>
</div>
