@php
    $home = route('home');
    $firstName = \Illuminate\Support\Str::of($settings->name)->explode(' ')->first() ?: 'Dev';
    $footerSections = [
        'Quick Links' => [
            ['name' => 'Home', 'href' => $home . '#home'],
            ['name' => 'Services', 'href' => $home . '#services'],
            ['name' => 'About', 'href' => $home . '#about'],
            ['name' => 'Projects', 'href' => route('projects.index')],
        ],
        'Services' => [
            ['name' => 'Web Development', 'href' => $home . '#services'],
            ['name' => 'Mobile Apps', 'href' => $home . '#services'],
            ['name' => 'UI/UX Design', 'href' => $home . '#services'],
            ['name' => 'API Development', 'href' => $home . '#services'],
        ],
        'Resources' => [
            ['name' => 'Blog', 'href' => route('blog.index')],
            ['name' => 'Case Studies', 'href' => route('projects.index')],
            ['name' => 'Contact', 'href' => $home . '#contact'],
        ],
    ];
@endphp

<footer class="bg-[#142e21] pt-16 pb-8 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-12 pb-12 border-b border-white/10">
            <div class="lg:col-span-2 space-y-6">
                <a href="{{ $home }}#home" class="flex items-center gap-2">
                    <span class="w-10 h-10 bg-[#f5a623] rounded-full flex items-center justify-center">
                        <x-icon name="code" class="w-5 h-5 text-[#1a3c2a]" />
                    </span>
                    <span class="text-white font-bold text-xl">{{ $firstName }}<span class="text-[#f5a623]">.</span></span>
                </a>
                <p class="text-gray-400 max-w-sm">Building exceptional digital experiences with modern technologies. Let's create something amazing together.</p>
                <div class="flex gap-4">
                    @foreach ($settings->socials ?? [] as $social)
                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" title="{{ $social['platform'] }}" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center text-white hover:bg-[#f5a623] hover:text-[#1a3c2a] transition-colors font-bold text-sm">{{ \Illuminate\Support\Str::substr($social['platform'], 0, 1) }}</a>
                    @endforeach
                </div>
            </div>

            @foreach ($footerSections as $title => $links)
                <div>
                    <h4 class="text-white font-bold mb-4">{{ $title }}</h4>
                    <ul class="space-y-3">
                        @foreach ($links as $link)
                            <li><a href="{{ $link['href'] }}" class="text-gray-400 hover:text-[#f5a623] transition-colors text-sm">{{ $link['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

        <div class="pt-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} {{ $settings->name }}. All rights reserved.</p>
            <p class="text-gray-500 text-sm">Built with Laravel &amp; Tailwind CSS.</p>
        </div>
    </div>
</footer>
