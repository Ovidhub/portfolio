@php
    $heroImage = $settings->hero_image ?: 'https://images.pexels.com/photos/36700225/pexels-photo-36700225.jpeg?auto=compress&cs=tinysrgb&fit=crop&h=1200&w=800';
@endphp

<section id="home" class="pt-32 pb-16 px-4 overflow-hidden">
    <div class="max-w-6xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            {{-- Left --}}
            <div data-reveal class="space-y-6">
                <div class="inline-flex items-center gap-2 border-2 border-[#1a3c2a] rounded-lg px-4 py-2">
                    <span class="text-[#1a3c2a] font-medium">Hello There!</span>
                </div>

                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#1a3c2a] leading-tight">
                    I'm
                    <span class="text-[#f5a623] relative">
                        {{ $settings->name }},
                        <span class="absolute bottom-0 left-0 w-full h-2 bg-[#f5a623]/30 -z-10"></span>
                    </span>
                    <br>
                    {{ $settings->title }}
                    <br>
                    Based in {{ $settings->location }}.
                </h1>

                <p class="text-gray-600 text-lg max-w-md">{{ $settings->hero_intro }}</p>

                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="{{ route('projects.index') }}" class="bg-[#1a3c2a] text-white px-8 py-3 rounded-full font-semibold flex items-center gap-3 hover:bg-[#2d5a3d] transition-colors group">
                        View My Portfolio
                        <span class="bg-[#f5a623] rounded-full p-1 group-hover:scale-110 transition-transform">
                            <x-icon name="play" class="w-4 h-4 text-[#1a3c2a]" fill="#1a3c2a" />
                        </span>
                    </a>
                    <a href="#contact" class="border-2 border-[#1a3c2a] text-[#1a3c2a] px-8 py-3 rounded-full font-semibold hover:bg-[#1a3c2a] hover:text-white transition-colors">Hire Me</a>
                </div>
            </div>

            {{-- Right --}}
            <div data-reveal class="relative flex justify-center">
                <div class="absolute w-80 h-80 md:w-96 md:h-96 bg-[#f5a623] rounded-full opacity-80 -z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"></div>

                <div class="relative w-72 h-96 md:w-96 md:h-[500px] rounded-3xl overflow-hidden border-4 border-white shadow-2xl bg-white flex items-end justify-center">
                    <img src="{{ $heroImage }}" alt="{{ $settings->name }}, {{ $settings->title }}" class="w-full h-full object-cover object-top" width="800" height="1200">
                </div>

                <div class="absolute top-10 right-0 bg-[#f5a623] text-[#1a3c2a] px-4 py-2 rounded-full font-semibold text-sm shadow-lg animate-float">{{ $settings->tagline ?: 'Full-Stack Developer' }}</div>
                <div class="absolute bottom-20 left-0 bg-[#1a3c2a] text-white px-4 py-2 rounded-full font-semibold text-sm shadow-lg animate-float-delayed">{{ $settings->title }}</div>

                <div class="absolute top-0 right-10 w-20 h-20 animate-spin-slow">
                    <div class="w-full h-full border-4 border-[#1a3c2a] rounded-full flex items-center justify-center bg-white">
                        <div class="w-10 h-10 bg-[#f5a623] rounded-full flex items-center justify-center">
                            <x-icon name="arrow-right" class="w-5 h-5 text-[#1a3c2a]" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
