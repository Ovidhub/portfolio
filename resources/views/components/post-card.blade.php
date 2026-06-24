@props(['post'])

<article data-reveal class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all group flex flex-col">
    <a href="{{ route('blog.show', $post) }}" class="block h-48 bg-gray-200 overflow-hidden relative">
        @if ($post->cover_image)
            <img src="{{ $post->cover_image }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" width="600" height="400" loading="lazy">
        @else
            <div class="w-full h-full bg-gradient-to-br from-[#1a3c2a] to-[#2d5a3d] flex items-center justify-center">
                <span class="text-white text-4xl font-bold">Blog</span>
            </div>
        @endif
        <span class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-semibold text-[#1a3c2a] flex items-center gap-1">
            <x-icon name="calendar" class="w-3 h-3" />
            <time datetime="{{ optional($post->published_at)->toDateString() }}">{{ optional($post->published_at)->format('M d, Y') }}</time>
        </span>
    </a>

    <div class="p-6 flex flex-col flex-1">
        <h3 class="text-xl font-bold text-[#1a3c2a] mb-3 group-hover:text-[#f5a623] transition-colors line-clamp-2">
            <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
        </h3>
        <p class="text-gray-600 text-sm mb-4 line-clamp-3 flex-1">{{ $post->excerpt }}</p>
        <a href="{{ route('blog.show', $post) }}" class="text-[#1a3c2a] font-semibold flex items-center gap-2 group-hover:text-[#f5a623] transition-colors">
            Read More <x-icon name="arrow-right" class="w-4 h-4" />
        </a>
    </div>
</article>
