@php
    $items = ['React Development', 'Node.js Backend', 'UI/UX Design', 'Full-Stack Apps', 'E-Commerce', 'API Development', 'Responsive Design'];
@endphp

<div class="bg-[#f5a623] py-4 overflow-hidden">
    <div class="flex whitespace-nowrap w-max animate-marquee">
        @for ($i = 0; $i < 2; $i++)
            @foreach ($items as $item)
                <span class="text-[#1a3c2a] text-2xl md:text-3xl font-bold mx-8">{{ $item }}</span>
                <span class="text-[#1a3c2a]/60 text-2xl md:text-3xl font-bold mx-8" aria-hidden="true">&#10022;</span>
            @endforeach
        @endfor
    </div>
</div>
