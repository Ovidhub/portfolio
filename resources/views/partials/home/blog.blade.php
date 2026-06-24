@if ($posts->isNotEmpty())
<section id="blog" class="py-20 px-4 bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-12">
            <div>
                <span class="text-[#f5a623] font-semibold text-sm uppercase tracking-wider">&mdash; Latest News</span>
                <h2 class="text-3xl md:text-4xl font-bold text-[#1a3c2a] mt-2">From My <span class="text-[#f5a623]">Blog</span></h2>
            </div>
            <a href="{{ route('blog.index') }}" class="mt-4 md:mt-0 bg-[#1a3c2a] text-white px-6 py-3 rounded-full font-semibold flex items-center gap-2 hover:bg-[#2d5a3d] transition-colors w-fit">
                View All Posts
                <span class="bg-[#f5a623] rounded-full p-1"><x-icon name="arrow-right" class="w-4 h-4 text-[#1a3c2a]" /></span>
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($posts as $post)
                <x-post-card :post="$post" />
            @endforeach
        </div>
    </div>
</section>
@endif
