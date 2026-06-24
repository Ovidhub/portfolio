@props(['eyebrow' => '', 'title' => '', 'subtitle' => ''])

<section class="pt-36 pb-12 px-4 bg-[#1a3c2a]">
    <div class="max-w-6xl mx-auto text-center">
        @if ($eyebrow)
            <span class="text-[#f5a623] font-semibold text-sm uppercase tracking-wider">&mdash; {{ $eyebrow }}</span>
        @endif
        <h1 class="text-4xl md:text-5xl font-bold text-white mt-2">{!! $title !!}</h1>
        @if ($subtitle)
            <p class="text-gray-400 mt-4 text-lg max-w-2xl mx-auto">{{ $subtitle }}</p>
        @endif
    </div>
</section>
