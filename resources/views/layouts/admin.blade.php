@php
    $nav = [
        ['label' => 'Dashboard', 'route' => 'admin.dashboard', 'active' => 'admin.dashboard'],
        ['label' => 'Projects', 'route' => 'admin.projects.index', 'active' => 'admin.projects.*'],
        ['label' => 'Blog Posts', 'route' => 'admin.posts.index', 'active' => 'admin.posts.*'],
        ['label' => 'Testimonials', 'route' => 'admin.testimonials.index', 'active' => 'admin.testimonials.*'],
        ['label' => 'Services', 'route' => 'admin.services.index', 'active' => 'admin.services.*'],
        ['label' => 'Tools', 'route' => 'admin.tools.index', 'active' => 'admin.tools.*'],
        ['label' => 'Messages', 'route' => 'admin.messages.index', 'active' => 'admin.messages.*'],
        ['label' => 'Profile & SEO', 'route' => 'admin.profile.edit', 'active' => 'admin.profile.*'],
    ];
@endphp
<!DOCTYPE html>
<html lang="en" class="bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') — {{ config('app.name') }}</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-800" x-data="{ sidebar: false }">
<div class="min-h-screen lg:flex">
    {{-- Sidebar --}}
    <aside class="bg-[#1a3c2a] text-white w-64 flex-shrink-0 fixed inset-y-0 left-0 z-40 transform lg:translate-x-0 transition-transform"
           :class="sidebar ? 'translate-x-0' : '-translate-x-full'">
        <div class="p-6 flex items-center gap-2 border-b border-white/10">
            <span class="w-9 h-9 bg-[#f5a623] rounded-full flex items-center justify-center"><x-icon name="code" class="w-5 h-5 text-[#1a3c2a]" /></span>
            <span class="font-bold text-lg">Admin Panel</span>
        </div>
        <nav class="p-4 space-y-1">
            @foreach ($nav as $item)
                <a href="{{ route($item['route']) }}"
                   class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs($item['active']) ? 'bg-[#f5a623] text-[#1a3c2a]' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-white/10">
            <a href="{{ route('home') }}" target="_blank" class="block px-4 py-2 text-sm text-gray-300 hover:text-[#f5a623]">View Site &#8599;</a>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-300 hover:text-[#f5a623]">Log Out</button>
            </form>
        </div>
    </aside>

    <div x-show="sidebar" x-cloak @click="sidebar = false" class="fixed inset-0 bg-black/40 z-30 lg:hidden"></div>

    {{-- Main --}}
    <div class="flex-1 lg:ml-64">
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between sticky top-0 z-20">
            <button class="lg:hidden text-gray-600" @click="sidebar = true" aria-label="Open menu"><x-icon name="menu" class="w-6 h-6" /></button>
            <h1 class="text-lg font-bold text-[#1a3c2a]">@yield('heading', 'Dashboard')</h1>
            <div class="text-sm text-gray-500">{{ auth()->user()?->name }}</div>
        </header>

        <main class="p-6 max-w-6xl mx-auto">
            @if (session('status'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl flex items-center gap-2">
                    <x-icon name="check" class="w-5 h-5" /> {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                    <p class="font-semibold mb-1">Please fix the following:</p>
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
