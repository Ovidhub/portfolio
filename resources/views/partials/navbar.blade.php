@php
    $home = route('home');
    $navLinks = [
        ['name' => 'Home', 'href' => $home . '#home'],
        ['name' => 'Services', 'href' => $home . '#services'],
        ['name' => 'About', 'href' => $home . '#about'],
        ['name' => 'Projects', 'href' => route('projects.index')],
        ['name' => 'Blog', 'href' => route('blog.index')],
        ['name' => 'Testimonials', 'href' => $home . '#testimonials'],
    ];
@endphp

<nav x-data="{ open: false }" class="fixed top-4 left-1/2 -translate-x-1/2 z-50 w-[95%] max-w-6xl">
    <div class="bg-[#1a3c2a] rounded-full px-6 py-3 flex items-center justify-between shadow-lg shadow-green-900/20">
        <a href="{{ $home }}#home" class="flex items-center gap-2">
            <span class="w-10 h-10 bg-[#f5a623] rounded-full flex items-center justify-center">
                <x-icon name="code" class="w-5 h-5 text-[#1a3c2a]" />
            </span>
            <span class="text-white font-bold text-xl">{{ \Illuminate\Support\Str::of($settings->name)->explode(' ')->first() ?: 'Dev' }}<span class="text-[#f5a623]">.</span></span>
        </a>

        <div class="hidden md:flex items-center gap-8">
            @foreach ($navLinks as $link)
                <a href="{{ $link['href'] }}" class="text-gray-300 hover:text-[#f5a623] transition-colors text-sm font-medium">{{ $link['name'] }}</a>
            @endforeach
        </div>

        <div class="hidden md:flex items-center gap-4">
            <a href="{{ $home }}#contact" class="bg-white text-[#1a3c2a] px-6 py-2 rounded-full font-semibold text-sm hover:bg-[#f5a623] transition-colors">Contact Me</a>
        </div>

        <button class="md:hidden text-white" @click="open = !open" aria-label="Toggle menu">
            <x-icon name="menu" class="w-6 h-6" x-show="!open" />
            <x-icon name="x" class="w-6 h-6" x-show="open" x-cloak />
        </button>
    </div>

    <div x-show="open" x-cloak @click.outside="open = false" class="md:hidden bg-[#1a3c2a] rounded-2xl mt-2 p-6 shadow-lg">
        <div class="flex flex-col gap-4">
            @foreach ($navLinks as $link)
                <a href="{{ $link['href'] }}" @click="open = false" class="text-gray-300 hover:text-[#f5a623] transition-colors text-lg font-medium">{{ $link['name'] }}</a>
            @endforeach
            <a href="{{ $home }}#contact" @click="open = false" class="bg-white text-[#1a3c2a] px-6 py-3 rounded-full font-semibold text-center hover:bg-[#f5a623] transition-colors">Contact Me</a>
        </div>
    </div>
</nav>
