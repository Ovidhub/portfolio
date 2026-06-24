@extends('layouts.app')

@section('title', $project->title . ' — ' . $settings->name)
@section('meta_description', \Illuminate\Support\Str::limit($project->description, 155))
@section('og_image', $project->image ?: ($settings->og_image ?: ''))

@push('jsonld')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Projects', 'item' => route('projects.index')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => $project->title, 'item' => route('projects.show', $project)],
    ],
], JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush

@section('content')
    <section class="pt-36 pb-12 px-4 bg-[#1a3c2a]">
        <div class="max-w-4xl mx-auto">
            <nav class="text-sm text-gray-400 mb-6 flex items-center gap-2" aria-label="Breadcrumb">
                <a href="{{ route('projects.index') }}" class="hover:text-[#f5a623]">Projects</a>
                <x-icon name="chevron-right" class="w-4 h-4" />
                <span class="text-gray-300">{{ $project->title }}</span>
            </nav>
            <h1 class="text-4xl md:text-5xl font-bold text-white">{{ $project->title }}</h1>
            <p class="text-gray-300 mt-4 text-lg max-w-2xl">{{ $project->description }}</p>
            <div class="flex flex-wrap gap-2 mt-6">
                @foreach ($project->tags ?? [] as $tag)
                    <span class="bg-white/10 text-white px-3 py-1 rounded-full text-xs font-medium">{{ $tag }}</span>
                @endforeach
            </div>
            <div class="flex flex-wrap gap-4 mt-8">
                @if ($project->link && $project->link !== '#')
                    <a href="{{ $project->link }}" target="_blank" rel="noopener" class="bg-[#f5a623] text-[#1a3c2a] px-6 py-3 rounded-full font-semibold flex items-center gap-2 hover:brightness-95 transition">Visit Live Site <x-icon name="external-link" class="w-4 h-4" /></a>
                @endif
                @if ($project->github && $project->github !== '#')
                    <a href="{{ $project->github }}" target="_blank" rel="noopener" class="border-2 border-white/40 text-white px-6 py-3 rounded-full font-semibold flex items-center gap-2 hover:bg-white hover:text-[#1a3c2a] transition">View Code <x-icon name="code" class="w-4 h-4" /></a>
                @endif
            </div>
        </div>
    </section>

    @if ($project->image)
        <div class="px-4 -mt-2 bg-gray-50">
            <div class="max-w-4xl mx-auto -translate-y-8">
                <img src="{{ $project->image }}" alt="{{ $project->title }}" class="w-full rounded-2xl shadow-2xl" loading="lazy">
            </div>
        </div>
    @endif

    <article class="py-16 px-4 bg-gray-50">
        <div class="max-w-3xl mx-auto prose prose-lg">
            @forelse (preg_split('/\n\n+/', (string) $project->body) as $paragraph)
                @if (trim($paragraph) !== '')
                    <p class="text-gray-700 leading-relaxed mb-6">{{ $paragraph }}</p>
                @endif
            @empty
            @endforelse
        </div>
    </article>

    @if ($related->isNotEmpty())
        <section class="pb-20 px-4 bg-gray-50">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-2xl font-bold text-[#1a3c2a] mb-8">More Projects</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($related as $project)
                        <x-project-card :project="$project" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
