@props(['hero'])

<div class="relative w-full max-w-[460px] mx-auto" style="perspective: 1800px">
    <div class="absolute -inset-10 bg-funnel-brand/35 blur-3xl -z-10 rounded-full"></div>

    <div class="relative mx-auto" style="transform-style: preserve-3d; transform: rotateY(-22deg) rotateX(6deg)">
        <div class="absolute top-1.5 right-[-12px] bottom-1.5 w-3 bg-gradient-to-r from-[#e9e2cf] via-white to-[#d8d0bb] rounded-r-sm" style="transform: translateZ(-2px)"></div>
        <div class="absolute inset-0 rounded-r-md rounded-l-sm bg-[#1a1208]" style="transform: translateZ(-14px)"></div>

        <div class="relative w-[260px] sm:w-[300px] aspect-[2/3] rounded-r-md rounded-l-sm overflow-hidden shadow-[0_40px_60px_-20px_rgba(0,0,0,0.6),inset_8px_0_18px_-6px_rgba(0,0,0,0.45)]" style="background: linear-gradient(135deg, #1a1206 0%, #2a1c0a 45%, #1a1206 100%)">
            <div class="absolute left-0 top-0 bottom-0 w-3 bg-gradient-to-r from-black/70 to-transparent"></div>
            <div class="absolute inset-3 border border-funnel-brand/40 rounded-sm pointer-events-none"></div>
            <div class="absolute inset-4 border border-funnel-brand/15 rounded-sm pointer-events-none"></div>

            <div class="absolute top-6 left-1/2 -translate-x-1/2">
                <x-funnel-asterisk class="w-5 h-5" />
            </div>

            <div class="absolute inset-x-0 top-14 px-6 text-center">
                <div class="text-[9px] tracking-[0.35em] text-funnel-brand/80 font-bold uppercase">A Relationship Guide</div>
                <h3 class="mt-4 font-display font-extrabold text-funnel-brand text-[40px] sm:text-[48px] leading-[0.9] tracking-tight" style="text-shadow: 0 2px 0 rgba(0,0,0,0.4)">
                    {{ $hero['book_title_top'] }}<span class="italic font-semibold">{{ $hero['book_title_italic'] }}</span>
                    <br>
                    {{ $hero['book_title_bottom'] }}
                </h3>
                <div class="mt-4 mx-auto w-12 h-[2px] bg-funnel-brand/70"></div>
                <p class="mt-4 text-[10px] sm:text-[11px] text-white/75 leading-snug italic px-2 whitespace-pre-line">{{ $hero['book_tagline'] }}</p>
            </div>

            <div class="absolute inset-x-0 bottom-5 text-center">
                <div class="text-[9px] tracking-[0.3em] text-white/50 font-semibold uppercase">By</div>
                <div class="mt-1 font-display font-bold text-white text-sm">{{ $hero['book_author'] }}</div>
            </div>

            <div class="absolute inset-0 pointer-events-none" style="background: linear-gradient(115deg, transparent 30%, rgba(255,255,255,0.08) 45%, transparent 60%)"></div>
        </div>
    </div>

    <div class="mx-auto mt-3 h-6 rounded-[50%] bg-black/60 blur-md" style="width: 70%"></div>
</div>
