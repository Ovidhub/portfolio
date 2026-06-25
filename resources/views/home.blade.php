@extends('layouts.app')

@section('title', $settings->meta_title ?: ($settings->name . ' — ' . $settings->title . ' Based in ' . $settings->location))
@section('meta_description', $settings->meta_description ?: $settings->hero_intro)

@push('jsonld')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'Person',
            'name' => $settings->name,
            'jobTitle' => $settings->title,
            'description' => $settings->about_bio,
            'email' => 'mailto:' . $settings->email,
            'url' => url('/'),
            'image' => $settings->hero_image ? (\Illuminate\Support\Str::startsWith($settings->hero_image, ['http://', 'https://']) ? $settings->hero_image : url($settings->hero_image)) : null,
            'address' => ['@type' => 'PostalAddress', 'addressLocality' => $settings->location],
            'sameAs' => collect($settings->socials ?? [])->pluck('url')->values()->all(),
        ],
        [
            '@type' => 'WebSite',
            'name' => $settings->name,
            'url' => url('/'),
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@endpush

@section('content')
    @include('partials.home.hero')
    @include('partials.home.marquee')
    @include('partials.home.services')
    @include('partials.home.about')
    @include('partials.home.tools')
    @include('partials.home.projects')
    @include('partials.home.blog')
    @include('partials.home.testimonials')
    @include('partials.home.contact')
@endsection
