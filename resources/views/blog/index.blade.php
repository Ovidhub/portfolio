@extends('layouts.app')

@section('title', 'Blog — ' . $settings->name)
@section('meta_description', 'Articles on web development, TypeScript, and software engineering by ' . $settings->name . '.')

@push('jsonld')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => route('blog.index')],
    ],
], JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush

@section('content')
    <x-page-hero eyebrow="Latest News" title='From My <span class="text-[#f5a623]">Blog</span>' subtitle="Thoughts on web development, engineering and the tools I love." />

    <section class="py-20 px-4 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            @if ($posts->isEmpty())
                <p class="text-center text-gray-500">No posts published yet.</p>
            @else
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($posts as $post)
                        <x-post-card :post="$post" />
                    @endforeach
                </div>
                <div class="mt-12">{{ $posts->links() }}</div>
            @endif
        </div>
    </section>
@endsection
