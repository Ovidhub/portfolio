@extends('layouts.app')

@section('title', $post->title . ' — ' . $settings->name)
@section('meta_description', \Illuminate\Support\Str::limit($post->excerpt, 155))
@section('og_type', 'article')
@section('og_image', $post->cover_image ?: ($settings->og_image ?: ''))

@push('jsonld')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => $post->title,
    'description' => $post->excerpt,
    'image' => $post->cover_image ?: null,
    'datePublished' => optional($post->published_at)->toAtomString(),
    'dateModified' => $post->updated_at->toAtomString(),
    'author' => ['@type' => 'Person', 'name' => $settings->name, 'url' => url('/')],
    'publisher' => ['@type' => 'Person', 'name' => $settings->name],
    'mainEntityOfPage' => route('blog.show', $post),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endpush

@section('content')
    <article>
        <header class="pt-36 pb-12 px-4 bg-[#1a3c2a]">
            <div class="max-w-3xl mx-auto">
                <nav class="text-sm text-gray-400 mb-6 flex items-center gap-2" aria-label="Breadcrumb">
                    <a href="{{ route('blog.index') }}" class="hover:text-[#f5a623]">Blog</a>
                    <x-icon name="chevron-right" class="w-4 h-4" />
                    <span class="text-gray-300 truncate">{{ $post->title }}</span>
                </nav>
                <h1 class="text-3xl md:text-5xl font-bold text-white leading-tight">{{ $post->title }}</h1>
                <div class="flex items-center gap-2 text-[#f5a623] mt-6 text-sm font-medium">
                    <x-icon name="calendar" class="w-4 h-4" />
                    <time datetime="{{ optional($post->published_at)->toDateString() }}">{{ optional($post->published_at)->format('F j, Y') }}</time>
                </div>
            </div>
        </header>

        @if ($post->cover_image)
            <div class="px-4 bg-gray-50">
                <div class="max-w-4xl mx-auto -translate-y-8">
                    <img src="{{ $post->cover_image }}" alt="{{ $post->title }}" class="w-full rounded-2xl shadow-2xl" loading="lazy">
                </div>
            </div>
        @endif

        <div class="py-12 px-4 bg-gray-50">
            <div class="max-w-3xl mx-auto">
                @foreach (preg_split('/\n\n+/', (string) $post->body) as $paragraph)
                    @if (trim($paragraph) !== '')
                        <p class="text-gray-700 text-lg leading-relaxed mb-6">{{ $paragraph }}</p>
                    @endif
                @endforeach
            </div>
        </div>
    </article>

    @if ($related->isNotEmpty())
        <section class="pb-20 px-4 bg-gray-50">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-2xl font-bold text-[#1a3c2a] mb-8">Keep Reading</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    @foreach ($related as $post)
                        <x-post-card :post="$post" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
