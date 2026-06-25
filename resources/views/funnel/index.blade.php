@php $c = config('funnel'); @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#050505">
    <title>{{ $c['meta']['title'] }}</title>
    <meta name="description" content="{{ $c['meta']['description'] }}">
    <meta property="og:title" content="{{ $c['meta']['title'] }}">
    <meta property="og:description" content="{{ $c['meta']['description'] }}">
    <meta property="og:type" content="website">

    <script>document.documentElement.classList.add('js');</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,400;12..96,500;12..96,600;12..96,700;12..96,800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#050505] text-white selection:bg-funnel-brand selection:text-black overflow-x-hidden" style="background-image: radial-gradient(ellipse 80% 60% at 50% -10%, rgba(255,214,10,0.08), transparent 60%);">

{{-- ===== NAV ===== --}}
<header x-data="{ open: false }" class="fixed top-3 left-1/2 -translate-x-1/2 z-50 w-[min(96%,1040px)]">
    <nav class="bg-black/85 backdrop-blur border border-white/10 rounded-full pl-5 pr-1.5 py-1.5 flex items-center justify-between shadow-[0_10px_40px_-10px_rgba(255,214,10,0.25)]">
        <a href="#home" class="flex items-center gap-2">
            <span class="w-7 h-7 rounded-md bg-funnel-brand grid place-items-center text-black font-extrabold text-sm">{{ \Illuminate\Support\Str::substr($c['nav']['brand1'], 0, 1) }}</span>
            <span class="font-display font-extrabold text-white tracking-tight text-sm sm:text-base">{{ $c['nav']['brand1'] }}<span class="text-funnel-brand">{{ $c['nav']['brand2'] }}</span></span>
        </a>
        <ul class="hidden lg:flex items-center gap-1 text-[13px] font-medium text-white/80">
            @foreach ($c['nav']['links'] as $l)
                <li><a href="{{ $l['href'] }}" class="px-3 py-2 rounded-full hover:bg-white/10 transition">{{ $l['label'] }}</a></li>
            @endforeach
        </ul>
        <a href="#order" class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-funnel-brand text-black text-[13px] font-bold hover:bg-funnel-brand-soft transition">{{ $c['nav']['cta_label'] }}</a>
        <button aria-label="menu" @click="open = !open" class="sm:hidden ml-2 w-9 h-9 rounded-full bg-white/10 grid place-items-center">
            <span class="block w-4 h-[2px] bg-white relative before:content-[''] before:absolute before:-top-1.5 before:left-0 before:w-4 before:h-[2px] before:bg-white after:content-[''] after:absolute after:top-1.5 after:left-0 after:w-4 after:h-[2px] after:bg-white"></span>
        </button>
    </nav>
    <div x-show="open" x-cloak @click.outside="open = false" class="sm:hidden mt-2 bg-black/95 border border-white/10 rounded-2xl p-3 backdrop-blur">
        <ul class="grid gap-1 text-sm font-medium">
            @foreach ($c['nav']['links'] as $l)
                <li><a href="{{ $l['href'] }}" @click="open = false" class="block px-3 py-2 rounded-lg hover:bg-white/10">{{ $l['label'] }}</a></li>
            @endforeach
            <li><a href="#order" @click="open = false" class="block mt-2 text-center px-3 py-2.5 rounded-full bg-funnel-brand text-black font-bold">{{ $c['nav']['cta_label'] }}</a></li>
        </ul>
    </div>
</header>

<main class="pt-24">
    {{-- ===== ANNOUNCEMENT ===== --}}
    <div class="px-3 sm:px-5">
        <div class="mx-auto max-w-5xl text-center mb-4">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-funnel-brand/10 border border-funnel-brand/20 text-[12px] text-funnel-brand/90 font-medium">
                <span class="w-1.5 h-1.5 rounded-full bg-funnel-brand animate-pulse"></span>
                {{ $c['announcement']['text'] }}
            </span>
        </div>
    </div>

    {{-- ===== HERO ===== --}}
    @php $h = $c['hero']; @endphp
    <section id="home" class="px-3 sm:px-5">
        <div class="relative mx-auto max-w-6xl rounded-[36px] bg-[#EFEAE0] text-black overflow-hidden grain">
            <x-funnel-asterisk class="absolute top-8 left-8 w-8 h-8 spin-slow" />
            <div class="px-6 sm:px-10 pt-20 pb-12 sm:pt-24 sm:pb-16">
                <div class="grid lg:grid-cols-[1.1fr_1fr] gap-10 items-center">
                    <div class="text-center lg:text-left">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-black text-white text-[11px] font-semibold mb-5">
                            <span class="w-1.5 h-1.5 rounded-full bg-funnel-brand"></span> {{ $h['badge'] }}
                        </div>
                        <h1 class="font-display font-extrabold text-[34px] sm:text-[52px] md:text-[60px] leading-[1.02] tracking-tight">
                            {{ $h['headline'] }}<br>
                            <span class="italic font-semibold">{{ $h['headline_italic'] }}</span>{{ $h['headline_after'] }}
                        </h1>
                        <p class="mt-5 max-w-xl mx-auto lg:mx-0 text-sm sm:text-base text-black/70">{{ $h['subhead'] }}</p>
                        <div id="book" class="mt-7 flex flex-col sm:flex-row items-center gap-3 lg:justify-start justify-center">
                            <a href="#order" class="w-full sm:w-auto px-6 py-3.5 rounded-full bg-black text-white font-bold text-sm hover:bg-neutral-800 transition flex items-center justify-center gap-2">
                                {{ $h['cta_primary'] }} <x-funnel-arrow class="w-4 h-4" />
                            </a>
                            <a href="#chapters" class="text-sm font-semibold text-black/70 hover:text-black flex items-center gap-1.5">{{ $h['cta_secondary'] }}</a>
                        </div>
                        <div class="mt-5 flex items-center flex-wrap gap-x-4 gap-y-1 text-[11px] text-black/55 justify-center lg:justify-start">
                            @foreach ($h['perks'] as $p)<span>{{ $p }}</span>@endforeach
                        </div>
                        <div class="mt-6 flex items-center gap-3 justify-center lg:justify-start">
                            <div class="flex -space-x-2">
                                @foreach (['14950779.jpeg','8837170.jpeg','13392786.png','16881939.jpeg'] as $a)
                                    <img src="https://images.pexels.com/photos/{{ \Illuminate\Support\Str::before($a, '.') }}/pexels-photo-{{ $a }}?auto=compress&cs=tinysrgb&dpr=1&fit=crop&h=160&w=160" alt="" class="w-7 h-7 rounded-full border-2 border-[#EFEAE0] object-cover" loading="lazy">
                                @endforeach
                            </div>
                            <div class="flex flex-col">
                                <div class="flex items-center gap-0.5">
                                    @for ($i = 0; $i < 5; $i++)<x-funnel-star class="w-3 h-3" />@endfor
                                    <span class="ml-1 text-xs font-bold">{{ $h['rating'] }}</span>
                                </div>
                                <div class="text-[10px] text-black/55">{{ $h['rating_count'] }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <x-funnel-book :hero="$h" />
                        <div class="absolute -left-4 sm:-left-2 top-4 px-3 py-2 rounded-xl bg-white text-black text-[11px] font-semibold shadow-lg border border-black/5 hidden sm:block">
                            <div class="text-[10px] text-black/50">{{ $h['badge_top']['kicker'] }}</div>
                            <div class="font-display font-extrabold text-sm leading-none mt-0.5">{{ $h['badge_top']['value'] }}</div>
                        </div>
                        <div class="absolute -right-2 -bottom-2 px-3 py-2 rounded-xl bg-funnel-brand text-black text-[11px] font-bold shadow-lg flex items-center gap-2">
                            <x-funnel-star class="w-3 h-3" /> {{ $h['badge_bottom'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== SOCIAL PROOF ===== --}}
    <section class="px-3 sm:px-5 mt-10">
        <div class="mx-auto max-w-5xl text-center">
            <p class="text-[10px] uppercase tracking-[0.2em] text-white/40">{{ $c['social_proof']['label'] }}</p>
            <div class="mt-4 flex flex-wrap items-center justify-center gap-x-10 gap-y-3 text-white/40 font-display font-bold text-lg">
                @foreach ($c['social_proof']['items'] as $i => $s)
                    <span class="{{ $i % 2 === 1 ? 'italic' : '' }}">{{ $s }}</span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== FOR YOU ===== --}}
    @php $f = $c['for_you']; @endphp
    <section class="px-3 sm:px-5 mt-24 sm:mt-32">
        <div class="mx-auto max-w-5xl">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-[11px] uppercase tracking-[0.2em] text-funnel-brand font-bold">{{ $f['kicker'] }}</span>
                <h2 class="mt-3 font-display font-extrabold text-3xl sm:text-5xl leading-tight">
                    {{ $f['headline'] }}<span class="italic">{{ $f['headline_italic'] }}</span>{{ $f['headline_after'] }}
                    <x-funnel-asterisk class="inline-block w-7 h-7 ml-2 spin-slow" />
                </h2>
                <p class="mt-4 text-white/60 text-sm sm:text-base">{{ $f['subhead'] }}</p>
            </div>
            <div class="mt-10 grid sm:grid-cols-2 gap-4">
                @foreach ($f['items'] as $p)
                    <div class="rounded-2xl bg-[#0F0F0F] border border-white/10 p-6 hover:border-funnel-brand/30 transition">
                        <div class="text-3xl">{{ $p['emoji'] }}</div>
                        <div class="mt-3 font-display font-extrabold text-xl">{{ $p['title'] }}</div>
                        <p class="mt-2 text-sm text-white/60 leading-relaxed">{{ $p['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== CHAPTERS ===== --}}
    @php $ch = $c['chapters']; @endphp
    <section id="chapters" class="px-3 sm:px-5 mt-24 sm:mt-32" x-data="{ open: 0 }">
        <div class="mx-auto max-w-5xl">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-[11px] uppercase tracking-[0.2em] text-funnel-brand font-bold">{{ $ch['kicker'] }}</span>
                <h2 class="mt-3 font-display font-extrabold text-3xl sm:text-5xl leading-tight">
                    {{ $ch['headline'] }}<span class="italic">{{ $ch['headline_italic'] }}</span>{{ $ch['headline_after'] }}
                </h2>
            </div>
            <div class="mt-10 space-y-3">
                @foreach ($ch['items'] as $i => $cp)
                    <div class="rounded-2xl border border-white/10 bg-[#0F0F0F] overflow-hidden">
                        <button @click="open = open === {{ $i }} ? null : {{ $i }}" class="w-full flex items-center gap-4 text-left px-5 py-4 hover:bg-white/[0.02]">
                            <span class="w-10 h-10 grid place-items-center rounded-full bg-funnel-brand text-black font-display font-extrabold text-sm shrink-0">{{ $cp['n'] }}</span>
                            <div class="flex-1">
                                <div class="font-display font-extrabold text-base sm:text-lg">Chapter {{ $cp['n'] }} · {{ $cp['title'] }}</div>
                                <div class="text-[12px] text-white/50 mt-0.5">{{ $cp['sub'] }}</div>
                            </div>
                            <div class="hidden sm:flex flex-col items-end mr-2">
                                <div class="text-[10px] uppercase tracking-wider text-white/35">From page</div>
                                <div class="font-mono text-sm text-white/60">{{ $cp['page'] }}</div>
                            </div>
                            <span class="w-8 h-8 rounded-full grid place-items-center shrink-0 transition" :class="open === {{ $i }} ? 'bg-funnel-brand text-black rotate-45' : 'bg-white/10 text-white'">
                                <x-funnel-plus class="w-4 h-4" />
                            </span>
                        </button>
                        <div class="grid transition-all duration-300" :class="open === {{ $i }} ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                            <div class="overflow-hidden">
                                <div class="px-5 pb-5 grid sm:grid-cols-3 gap-3 text-sm text-white/70">
                                    <div class="rounded-lg bg-white/5 p-3"><div class="text-funnel-brand text-[10px] uppercase tracking-wider font-bold">You'll learn</div><p class="mt-1.5">{{ $cp['learn'] }}</p></div>
                                    <div class="rounded-lg bg-white/5 p-3"><div class="text-funnel-brand text-[10px] uppercase tracking-wider font-bold">Includes</div><p class="mt-1.5">{{ $cp['includes'] }}</p></div>
                                    <div class="rounded-lg bg-white/5 p-3"><div class="text-funnel-brand text-[10px] uppercase tracking-wider font-bold">Try it tonight</div><p class="mt-1.5">{{ $cp['tonight'] }}</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== SNEAK PEEK ===== --}}
    @php $s = $c['sneak_peek']; @endphp
    <section class="px-3 sm:px-5 mt-24 sm:mt-32">
        <div class="mx-auto max-w-5xl">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-[11px] uppercase tracking-[0.2em] text-funnel-brand font-bold">{{ $s['kicker'] }}</span>
                <h2 class="mt-3 font-display font-extrabold text-3xl sm:text-5xl leading-tight">{{ $s['headline_before'] }}<span class="italic">{{ $s['headline_italic'] }}</span></h2>
            </div>
            <div class="grid md:grid-cols-2 gap-6 items-center">
                <div class="relative rotate-[-1.5deg] hover:rotate-0 transition-transform duration-500">
                    <div class="rounded-md bg-[#F3EBD8] text-[#2a1c0a] p-7 sm:p-9 shadow-[0_30px_60px_-20px_rgba(0,0,0,0.6)] font-serif relative">
                        <div class="text-[10px] uppercase tracking-[0.3em] text-[#7a6240] font-bold">{{ $s['chapter_label'] }}</div>
                        <div class="mt-1 text-[10px] text-[#7a6240]">{{ $s['page_label'] }}</div>
                        <p class="mt-5 text-[15px] leading-relaxed">{{ $s['body1'] }}</p>
                        <p class="mt-3 text-[15px] leading-relaxed">{{ $s['body2'] }}</p>
                        <p class="mt-3 text-[15px] leading-relaxed italic font-semibold whitespace-pre-line">{{ $s['quote'] }}</p>
                        <p class="mt-3 text-[15px] leading-relaxed">{{ $s['body3'] }}</p>
                        <x-funnel-asterisk class="absolute -top-4 -right-4 w-8 h-8 rotate-12" />
                    </div>
                </div>
                <div>
                    <h3 class="font-display font-extrabold text-2xl sm:text-3xl leading-tight">{{ $s['side_title'] }}</h3>
                    <p class="mt-4 text-white/65 text-sm leading-relaxed">{{ $s['side_body'] }}</p>
                    <div class="mt-5 flex items-center flex-wrap gap-2 text-sm">
                        @foreach ($s['pills'] as $p)<span class="px-2.5 py-1 rounded-full bg-funnel-brand/15 text-funnel-brand text-xs font-bold border border-funnel-brand/20">{{ $p }}</span>@endforeach
                    </div>
                    <a href="#order" class="mt-6 inline-flex items-center gap-2 px-5 py-3 rounded-full bg-funnel-brand text-black font-bold text-sm hover:bg-funnel-brand-soft transition">{{ $s['cta'] }} <x-funnel-arrow class="w-4 h-4" /></a>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== MARQUEE ===== --}}
    <section class="mt-16 sm:mt-20 border-y border-white/10 py-8 overflow-hidden">
        <div class="flex marquee-track whitespace-nowrap w-max">
            @for ($k = 0; $k < 3; $k++)
                @foreach ($c['marquee']['items'] as $it)
                    <div class="flex items-center gap-6 px-6 font-display font-extrabold text-2xl sm:text-4xl text-white">{{ $it }} <x-funnel-asterisk class="w-5 h-5 sm:w-7 sm:h-7" /></div>
                @endforeach
            @endfor
        </div>
    </section>

    {{-- ===== AUTHOR ===== --}}
    @php $a = $c['author']; @endphp
    <section id="author" class="px-3 sm:px-5 mt-24 sm:mt-32">
        <div class="mx-auto max-w-6xl rounded-[32px] bg-[#0B0B0B] border border-white/10 p-6 sm:p-10 grid md:grid-cols-[1fr_1.2fr] gap-10 items-center">
            <div class="relative">
                <div class="absolute -inset-6 bg-funnel-brand/30 blur-3xl -z-10 rounded-full"></div>
                <div class="relative w-full max-w-xs aspect-[4/5] rounded-3xl overflow-hidden mx-auto bg-white/5">
                    @if ($a['image'])<img src="{{ $a['image'] }}" alt="{{ $a['name'] }}" class="w-full h-full object-cover" loading="lazy">@endif
                </div>
                <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 px-3 py-2 rounded-xl bg-funnel-brand text-black text-[11px] font-bold whitespace-nowrap shadow-lg">{{ $a['name'] }} · {{ $a['role'] }}</div>
            </div>
            <div>
                <span class="text-[11px] uppercase tracking-[0.2em] text-funnel-brand font-bold">{{ $a['kicker'] }}</span>
                <h3 class="mt-3 font-display font-extrabold text-3xl sm:text-4xl">{{ $a['headline_before'] }}<span class="italic">{{ $a['headline_italic'] }}</span>{{ $a['headline_after'] }}</h3>
                <p class="mt-4 text-white/65 text-[15px] leading-relaxed">{{ $a['bio1'] }}</p>
                <p class="mt-3 text-white/65 text-[15px] leading-relaxed">{{ $a['bio2'] }}</p>
                <div class="mt-6 grid grid-cols-2 sm:grid-cols-4 gap-3">
                    @foreach ($a['credits'] as $cr)
                        <div class="rounded-xl border border-white/10 bg-[#141414] p-3">
                            <div class="font-display font-extrabold text-xl text-funnel-brand">{{ $cr['value'] }}</div>
                            <div class="text-[10px] text-white/55 uppercase tracking-wider">{{ $cr['label'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ===== REVIEWS ===== --}}
    @php $r = $c['reviews']; @endphp
    <section id="reviews" class="px-3 sm:px-5 mt-24 sm:mt-32">
        <div class="mx-auto max-w-6xl">
            <div class="flex items-center gap-2 flex-wrap">
                <h3 class="font-display font-extrabold text-2xl sm:text-3xl">{{ $r['title_a'] }}</h3>
                <span class="px-3 py-1 rounded-md bg-funnel-brand text-black font-display font-extrabold text-2xl sm:text-3xl">{{ $r['title_b'] }}</span>
            </div>
            <p class="mt-3 text-white/60 text-sm max-w-md">{{ $r['sub'] }}</p>
            <div class="mt-8 grid md:grid-cols-2 gap-4">
                @foreach ($r['items'] as $it)
                    <div class="rounded-2xl bg-[#0F0F0F] border border-white/10 overflow-hidden flex flex-col sm:flex-row">
                        <div class="sm:w-2/5 relative aspect-[4/3] sm:aspect-auto overflow-hidden bg-white/5">
                            @if ($it['image'])<img src="{{ $it['image'] }}" alt="" class="w-full h-full object-cover" loading="lazy">@endif
                            <div class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-funnel-brand text-black text-[11px] font-bold">{{ $it['metric'] }}</div>
                        </div>
                        <div class="flex-1 p-5">
                            <div class="font-display font-extrabold">{{ $it['name'] }}</div>
                            <div class="text-xs text-white/55">{{ $it['together'] }}</div>
                            <div class="flex items-center gap-0.5 mt-2">@for ($k = 0; $k < 5; $k++)<x-funnel-star class="w-3 h-3" />@endfor</div>
                            <p class="mt-3 text-sm text-white/70 leading-relaxed italic">"{{ $it['quote'] }}"</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8 rounded-2xl bg-[#0F0F0F] border border-white/10 px-6 py-5 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left">
                <div class="flex items-center gap-4">
                    <div class="font-display font-extrabold text-4xl">{{ $r['rating_value'] }}</div>
                    <div>
                        <div class="flex items-center gap-0.5">@for ($k = 0; $k < 5; $k++)<x-funnel-star class="w-4 h-4" />@endfor</div>
                        <div class="text-xs text-white/55 mt-1">{{ $r['rating_sub'] }}</div>
                    </div>
                </div>
                <div class="flex items-center flex-wrap gap-2 text-[11px] text-white/60">
                    @foreach ($r['platforms'] as $p)<span class="px-2 py-1 rounded-full bg-white/5 border border-white/10">{{ $p }}</span>@endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ===== BONUSES ===== --}}
    @php $b = $c['bonuses']; @endphp
    <section class="px-3 sm:px-5 mt-24 sm:mt-32">
        <div class="mx-auto max-w-6xl">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-[11px] uppercase tracking-[0.2em] text-funnel-brand font-bold">{{ $b['kicker'] }}</span>
                <h2 class="mt-3 font-display font-extrabold text-3xl sm:text-5xl leading-tight">{{ $b['headline_before'] }}<span class="italic">{{ $b['headline_italic'] }}</span> — free</h2>
            </div>
            <div class="mt-10 grid sm:grid-cols-2 gap-4">
                @foreach ($b['items'] as $it)
                    <div class="group rounded-2xl bg-[#0F0F0F] border border-white/10 p-6 hover:border-funnel-brand/40 transition relative overflow-hidden">
                        <div class="absolute top-4 right-4 text-[10px] px-2 py-0.5 rounded-full bg-funnel-brand/10 text-funnel-brand font-bold border border-funnel-brand/20">{{ $it['value'] }} value</div>
                        <div class="text-3xl">{{ $it['emoji'] }}</div>
                        <div class="mt-3 font-display font-extrabold text-lg">{{ $it['title'] }}</div>
                        <p class="mt-2 text-sm text-white/60 leading-relaxed">{{ $it['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== PRICING ===== --}}
    @php $p = $c['pricing']; @endphp
    <section id="order" class="px-3 sm:px-5 mt-24 sm:mt-32">
        <div class="mx-auto max-w-6xl">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-[11px] uppercase tracking-[0.2em] text-funnel-brand font-bold">{{ $p['kicker'] }}</span>
                <h2 class="mt-3 font-display font-extrabold text-3xl sm:text-5xl leading-tight">{{ $p['headline_before'] }}<span class="italic">{{ $p['headline_italic'] }}</span></h2>
                <p class="mt-4 text-white/60 text-sm">{{ $p['sub'] }}</p>
            </div>
            <div class="mt-10 grid md:grid-cols-3 gap-4">
                @foreach ($p['tiers'] as $t)
                    <div class="relative rounded-3xl p-7 overflow-hidden flex flex-col {{ $t['featured'] ? 'bg-[#0F0F0F] border-2 border-funnel-brand/60 shadow-[0_20px_60px_-25px_rgba(255,214,10,0.6)] md:scale-[1.04] z-10' : 'bg-[#0B0B0B] border border-white/10' }}">
                        @if ($t['featured'])<div class="absolute top-0 right-0 px-3 py-1.5 rounded-bl-2xl bg-funnel-brand text-black text-[11px] font-bold">MOST POPULAR</div>@endif
                        <div class="text-xs text-funnel-brand font-bold uppercase tracking-wider">{{ $t['tagline'] }}</div>
                        <div class="mt-2 font-display font-extrabold text-2xl">{{ $t['name'] }}</div>
                        <div class="mt-5 flex items-baseline gap-2">
                            <span class="text-white/40 line-through text-lg">${{ $t['old'] }}</span>
                            <span class="font-display font-extrabold text-5xl">${{ $t['price'] }}</span>
                        </div>
                        <ul class="mt-6 space-y-2.5 flex-1">
                            @foreach ($t['features'] as $feat)
                                <li class="flex items-start gap-2.5 text-sm text-white/85">
                                    <span class="mt-0.5 w-4 h-4 rounded-full bg-funnel-brand text-black grid place-items-center text-[9px] font-extrabold shrink-0">✓</span>
                                    {{ $feat }}
                                </li>
                            @endforeach
                        </ul>
                        <a href="#" class="mt-7 w-full inline-flex items-center justify-center gap-2 font-bold py-3.5 rounded-full text-sm transition-all {{ $t['featured'] ? 'bg-funnel-brand text-black hover:bg-funnel-brand-soft hover:scale-[1.01] shadow-[0_10px_40px_-10px_rgba(255,214,10,0.6)]' : 'bg-white/10 text-white hover:bg-white/15' }}">
                            {{ $t['cta'] }} — ${{ $t['price'] }} <x-funnel-arrow class="w-4 h-4" />
                        </a>
                    </div>
                @endforeach
            </div>
            <p class="mt-8 text-center text-sm text-white/55">{{ $p['footnote'] }}</p>
        </div>
    </section>

    {{-- ===== GUARANTEE ===== --}}
    @php $g = $c['guarantee']; @endphp
    <section class="px-3 sm:px-5 mt-16">
        <div class="mx-auto max-w-4xl rounded-[32px] bg-gradient-to-br from-[#141414] to-[#0A0A0A] border border-white/10 p-8 sm:p-12 flex flex-col sm:flex-row items-center gap-8 text-center sm:text-left">
            <div class="shrink-0 relative w-28 h-28 rounded-full bg-funnel-brand grid place-items-center text-black shadow-[0_20px_60px_-15px_rgba(255,214,10,0.6)]">
                <div class="text-center">
                    <div class="font-display font-extrabold text-3xl leading-none">{{ $g['days'] }}</div>
                    <div class="text-[10px] font-bold tracking-wider">{{ $g['badge_label'] }}</div>
                </div>
                <x-funnel-asterisk color="#000" class="absolute -top-2 -right-2 w-6 h-6" />
            </div>
            <div class="flex-1">
                <h3 class="font-display font-extrabold text-2xl sm:text-3xl">{{ $g['headline'] }}</h3>
                <p class="mt-3 text-sm text-white/65 leading-relaxed">{{ $g['body'] }}</p>
            </div>
        </div>
    </section>

    {{-- ===== FAQ ===== --}}
    @php $fa = $c['faq']; @endphp
    <section id="faq" class="px-3 sm:px-5 mt-24 sm:mt-32" x-data="{ open: 0 }">
        <div class="mx-auto max-w-3xl">
            <div class="text-center max-w-xl mx-auto">
                <span class="text-[11px] uppercase tracking-[0.2em] text-funnel-brand font-bold">{{ $fa['kicker'] }}</span>
                <h2 class="mt-3 font-display font-extrabold text-3xl sm:text-5xl leading-tight">{{ $fa['headline_before'] }}<span class="italic">{{ $fa['headline_italic'] }}</span></h2>
            </div>
            <div class="mt-10 space-y-3">
                @foreach ($fa['items'] as $i => $it)
                    <div class="border border-white/10 rounded-2xl bg-[#0F0F0F] overflow-hidden">
                        <button @click="open = open === {{ $i }} ? null : {{ $i }}" class="w-full flex items-center justify-between gap-4 text-left px-5 py-4 hover:bg-white/[0.02]">
                            <span class="font-display font-bold text-base sm:text-lg">{{ $it['q'] }}</span>
                            <span class="w-7 h-7 rounded-full grid place-items-center shrink-0 transition" :class="open === {{ $i }} ? 'bg-funnel-brand text-black rotate-45' : 'bg-white/10 text-white'">
                                <x-funnel-plus class="w-4 h-4" />
                            </span>
                        </button>
                        <div class="grid transition-all duration-300" :class="open === {{ $i }} ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                            <div class="overflow-hidden"><p class="px-5 pb-5 text-sm text-white/65 leading-relaxed">{{ $it['a'] }}</p></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== FINAL CTA ===== --}}
    @php $fc = $c['final_cta']; @endphp
    <section class="px-3 sm:px-5 mt-24 sm:mt-32"
             x-data="{ d:0, h:0, m:0, s:0, target: Date.now() + 72*3600*1000, tick() { const diff = Math.max(0, this.target - Date.now()); this.d = Math.floor(diff/86400000); this.h = Math.floor((diff%86400000)/3600000); this.m = Math.floor((diff%3600000)/60000); this.s = Math.floor((diff%60000)/1000); }, pad(n){ return String(n).padStart(2,'0'); } }"
             x-init="tick(); setInterval(() => tick(), 1000)">
        <div class="mx-auto max-w-6xl rounded-[32px] bg-[#0B0B0B] border border-white/10 p-6 sm:p-12 relative overflow-hidden">
            <div class="absolute -top-32 -right-32 w-80 h-80 rounded-full bg-funnel-brand/20 blur-3xl"></div>
            <div class="grid md:grid-cols-2 gap-10 items-center relative">
                <div>
                    <span class="text-[11px] uppercase tracking-[0.2em] text-funnel-brand font-bold">{{ $fc['kicker'] }}</span>
                    <h3 class="mt-3 font-display font-extrabold text-3xl sm:text-5xl leading-tight">{{ $fc['headline_before'] }}<span class="italic">{{ $fc['headline_italic'] }}</span></h3>
                    <p class="mt-4 text-white/60 text-sm max-w-md">{{ $fc['sub'] }}</p>
                    <div class="mt-6 flex items-center gap-2">
                        @foreach (['d' => 'Days', 'h' => 'Hours', 'm' => 'Min', 's' => 'Sec'] as $key => $label)
                            <div class="flex-1 rounded-xl bg-[#1A1A1A] border border-white/10 p-3 text-center">
                                <div class="font-display font-extrabold text-2xl sm:text-3xl text-funnel-brand tabular-nums" x-text="pad({{ $key }})">00</div>
                                <div class="text-[10px] uppercase tracking-wider text-white/50">{{ $label }}</div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-6 flex flex-col sm:flex-row gap-2">
                        <a href="#order" class="flex-1 inline-flex items-center justify-center gap-2 bg-funnel-brand text-black font-bold px-5 py-3.5 rounded-full text-sm hover:bg-funnel-brand-soft transition shadow-[0_10px_40px_-10px_rgba(255,214,10,0.6)]">{{ $fc['cta_primary'] }} <x-funnel-arrow class="w-4 h-4" /></a>
                        <a href="#order" class="flex-1 inline-flex items-center justify-center gap-2 border border-white/15 text-white font-semibold px-5 py-3.5 rounded-full text-sm hover:bg-white/5 transition">{{ $fc['cta_secondary'] }}</a>
                    </div>
                    <p class="mt-3 text-[11px] text-white/45">{{ $fc['footnote'] }}</p>
                </div>
                <div class="relative justify-self-end">
                    <x-funnel-book :hero="$h" />
                    <div class="absolute -bottom-3 -left-3 px-3 py-2 rounded-xl bg-white text-black text-[11px] shadow-lg max-w-[200px]">
                        <div class="font-bold">{{ $fc['floating_quote'] }}</div>
                        <div class="text-black/60">{{ $fc['floating_author'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

{{-- ===== FOOTER ===== --}}
@php $ft = $c['footer']; @endphp
<footer class="px-3 sm:px-5 mt-16">
    <div class="mx-auto max-w-6xl rounded-t-[32px] bg-funnel-brand text-black p-8 sm:p-12 relative overflow-hidden">
        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-8">
            <div class="max-w-sm">
                <div class="flex items-center gap-2">
                    <span class="w-8 h-8 rounded-md bg-black grid place-items-center text-funnel-brand font-extrabold">{{ \Illuminate\Support\Str::substr($ft['brand1'], 0, 1) }}</span>
                    <span class="font-display font-extrabold text-xl">{{ $ft['brand1'] }}<span class="italic">{{ $ft['brand2'] }}</span></span>
                </div>
                <p class="mt-4 text-sm text-black/70">{{ $ft['tagline'] }}</p>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-8 text-sm">
                @foreach ($ft['columns'] as $col)
                    <div>
                        <div class="font-display font-extrabold mb-3">{{ $col['title'] }}</div>
                        <ul class="space-y-1.5 text-black/75">
                            @foreach ($col['items'] as $it)<li>{{ $it }}</li>@endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mt-10 pt-5 border-t border-black/15 text-xs text-black/70 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p>{{ $ft['legal'] }}</p>
            <div class="flex items-center gap-2">
                @foreach ($ft['socials'] as $so)<a href="#" class="w-8 h-8 rounded-full bg-black text-funnel-brand grid place-items-center text-[10px] font-bold hover:bg-black/80">{{ $so }}</a>@endforeach
            </div>
        </div>
    </div>
</footer>

</body>
</html>
