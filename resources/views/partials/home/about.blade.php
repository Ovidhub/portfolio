@php
    $aboutImage = $settings->about_image ?: ($settings->hero_image ?: 'https://images.pexels.com/photos/36700225/pexels-photo-36700225.jpeg?auto=compress&cs=tinysrgb&fit=crop&h=1200&w=800');
    $stats = [
        ['value' => $settings->stat_projects, 'label' => 'Projects Completed'],
        ['value' => $settings->stat_clients, 'label' => 'Happy Clients'],
        ['value' => $settings->stat_experience, 'label' => 'Years of Experience'],
    ];
@endphp

<section id="about" class="py-20 px-4 bg-[#1a3c2a]">
    <div class="max-w-6xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div data-reveal class="relative flex justify-center">
                <div class="absolute w-72 h-72 md:w-96 md:h-96 bg-[#f5a623] rounded-full opacity-80 -z-0 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"></div>
                <div class="relative w-64 h-80 md:w-80 md:h-96 rounded-3xl overflow-hidden border-4 border-white shadow-2xl bg-white flex items-end justify-center">
                    <img src="{{ $aboutImage }}" alt="Portrait of {{ $settings->name }}" class="w-full h-full object-cover object-top" width="800" height="1200" loading="lazy">
                </div>
                <div class="absolute top-10 right-6 bg-[#f5a623] text-[#1a3c2a] px-4 py-2 rounded-full font-semibold text-sm shadow-lg animate-float">React</div>
                <div class="absolute bottom-20 left-2 bg-white text-[#1a3c2a] px-4 py-2 rounded-full font-semibold text-sm shadow-lg animate-float-delayed">Node.js</div>
            </div>

            <div data-reveal class="space-y-6">
                <span class="text-[#f5a623] font-semibold text-sm uppercase tracking-wider">&mdash; About Me</span>
                <h2 class="text-3xl md:text-4xl font-bold text-white">Who is <span class="text-[#f5a623]">{{ $settings->name }}?</span></h2>
                <p class="text-gray-300 text-lg leading-relaxed">{{ $settings->about_bio }}</p>

                <div class="grid grid-cols-3 gap-6 py-6">
                    @foreach ($stats as $stat)
                        <div class="text-center">
                            <div class="text-3xl md:text-4xl font-bold text-[#f5a623]">{{ $stat['value'] }}</div>
                            <div class="text-gray-400 text-sm mt-1">{{ $stat['label'] }}</div>
                        </div>
                    @endforeach
                </div>

                <div class="flex flex-wrap gap-3">
                    @foreach ($tools->take(8) as $tool)
                        <span class="bg-white/10 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-[#f5a623] hover:text-[#1a3c2a] transition-colors">{{ $tool->name }}</span>
                    @endforeach
                </div>

                <div class="flex flex-wrap items-center gap-4 pt-4">
                    @if ($settings->cv_path)
                        <a href="{{ $settings->cv_path }}" target="_blank" rel="noopener" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-semibold flex items-center gap-3 hover:bg-white hover:text-[#1a3c2a] transition-colors">
                            <x-icon name="download" class="w-5 h-5" />
                            Download CV
                        </a>
                    @endif
                    <span class="text-[#f5a623] font-script text-3xl">{{ $settings->name }}</span>
                </div>
            </div>
        </div>
    </div>
</section>
