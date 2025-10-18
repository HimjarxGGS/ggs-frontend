@foreach ($photos as $photo)
<div class="inline-block p-[1px]">
    
    <a href="{{ ($photo['event_id'] == -1) ? '#' : route('events.show', ['id' => $photo['event_id']]) }}">
        
        <div class="relative rounded-[16px] overflow-hidden w-[320px] h-[220px] group">
            <img src="{{ asset($photo['src']) }}" class="w-full h-full object-cover transition duration-300" alt="{{ $photo['label'] }}" loading="lazy">
            <div class="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-t from-palette-4 to-transparent opacity-0 group-hover:h-32 group-hover:opacity-100 transition-all duration-500"></div>
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 translate-y-4 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 z-10">
                <span class="text-white text-xs font-medium">{{ $photo['label'] }}</span>
            </div>
        </div>
    </a>
</div>
@endforeach