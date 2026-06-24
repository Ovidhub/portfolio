<section class="py-20 px-4 bg-white">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-[#f5a623] font-semibold text-sm uppercase tracking-wider">&mdash; My Favorite Tools</span>
            <h2 class="text-3xl md:text-4xl font-bold text-[#1a3c2a] mt-2">Exploring the Tools <span class="text-[#f5a623]">Behind My Work</span></h2>
        </div>

        <div class="flex flex-wrap justify-center gap-6">
            @foreach ($tools as $tool)
                <div data-reveal class="w-24 h-24 md:w-28 md:h-28 bg-gray-50 rounded-2xl flex flex-col items-center justify-center gap-2 shadow-md hover:shadow-xl hover:-translate-y-2 transition-all border border-gray-100 group">
                    <x-icon :name="$tool->icon" class="w-8 h-8 group-hover:scale-110 transition-transform" :style="'color: ' . $tool->color" />
                    <span class="text-xs font-semibold text-gray-700 group-hover:text-[#1a3c2a] transition-colors">{{ $tool->name }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
