@php
    // Inline @section values are HTML-escaped by Blade; decode once so the {{ }}
    // echoes below escape exactly once (avoids double-encoded entities in <title>).
    $decode = fn ($v) => html_entity_decode(trim((string) $v), ENT_QUOTES);
    $metaTitle = $decode($__env->yieldContent('title', $settings->meta_title ?: ($settings->name . ' — ' . $settings->title)));
    $metaDescription = $decode($__env->yieldContent('meta_description', $settings->meta_description ?: $settings->hero_intro));
    $canonical = $decode($__env->yieldContent('canonical', url()->current()));
    $ogType = $decode($__env->yieldContent('og_type', 'website'));
    $ogImage = $decode($__env->yieldContent('og_image', $settings->og_image ?: asset('images/og-default.svg')));
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1a3c2a">
    {{-- Mark JS as available before paint so scroll-reveal hides content without a flash --}}
    <script>document.documentElement.classList.add('js');</script>

    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    @hasSection('meta_keywords')
        <meta name="keywords" content="@yield('meta_keywords')">
    @elseif($settings->meta_keywords)
        <meta name="keywords" content="{{ $settings->meta_keywords }}">
    @endif
    <meta name="author" content="{{ $settings->name }}">
    <link rel="canonical" href="{{ $canonical }}">
    <meta name="robots" content="index, follow">

    {{-- Open Graph --}}
    <meta property="og:type" content="{{ $ogType }}">
    <meta property="og:site_name" content="{{ $settings->name }}">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:image" content="{{ $ogImage }}">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="alternate" type="application/xml" title="Sitemap" href="{{ route('sitemap') }}">

    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Structured data --}}
    @stack('jsonld')
</head>
<body class="bg-white text-gray-800 font-sans antialiased">
    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>
