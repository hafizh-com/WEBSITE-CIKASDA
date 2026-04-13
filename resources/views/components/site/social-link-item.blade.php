@props(['social'])

<a href="{{ $social['url'] }}"
   target="_blank"
   rel="noopener noreferrer"
   class="flex items-center gap-4 text-white {{ $social['hover_class'] }} transition-all group font-bold text-sm">
    <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center group-hover:bg-white/10 transition-all">
        <img src="{{ asset($social['icon']) }}"
             alt="Logo {{ $social['label'] }}"
             class="w-5 h-5 object-contain">
    </div>
    <span>{{ $social['label'] }}</span>
</a>
