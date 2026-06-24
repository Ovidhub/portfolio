@extends('layouts.app')

@section('title', 'Projects & Case Studies — ' . $settings->name)
@section('meta_description', 'Browse the portfolio of ' . $settings->name . ', a ' . $settings->title . '. Web apps, mobile apps, dashboards and more.')

@push('jsonld')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Projects', 'item' => route('projects.index')],
    ],
], JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush

@section('content')
    <x-page-hero eyebrow="My Portfolio" title='My <span class="text-[#f5a623]">Projects</span>' subtitle="A selection of products I've designed and built for clients and startups." />

    <section class="py-20 px-4 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            @if ($projects->isEmpty())
                <p class="text-center text-gray-500">No projects published yet.</p>
            @else
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($projects as $project)
                        <x-project-card :project="$project" />
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
