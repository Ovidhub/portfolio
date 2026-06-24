<section id="services" class="py-20 px-4 bg-white">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-12">
            <div>
                <span class="text-[#f5a623] font-semibold text-sm uppercase tracking-wider">&mdash; Services</span>
                <h2 class="text-3xl md:text-4xl font-bold text-[#1a3c2a] mt-2">Services I Provide</h2>
            </div>
            <a href="#contact" class="mt-4 md:mt-0 bg-[#1a3c2a] text-white px-6 py-3 rounded-full font-semibold flex items-center gap-2 hover:bg-[#2d5a3d] transition-colors w-fit">
                Let's Talk
                <span class="bg-[#f5a623] rounded-full p-1"><x-icon name="plus" class="w-4 h-4 text-[#1a3c2a]" /></span>
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($services as $service)
                <article data-reveal class="bg-gray-50 rounded-2xl p-8 hover:shadow-xl transition-shadow group border border-gray-100">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-[#1a3c2a] mb-6 shadow-sm group-hover:bg-[#f5a623] group-hover:text-white transition-colors">
                        <x-icon :name="$service->icon" class="w-8 h-8" />
                    </div>
                    <h3 class="text-xl font-bold text-[#1a3c2a] mb-3">{{ $service->title }}</h3>
                    <p class="text-gray-600 mb-6 text-sm leading-relaxed">{{ $service->description }}</p>
                    <a href="#contact" class="text-[#1a3c2a] font-semibold flex items-center gap-2 group-hover:text-[#f5a623] transition-colors">
                        Learn more
                        <x-icon name="arrow-right" class="w-4 h-4" />
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>
