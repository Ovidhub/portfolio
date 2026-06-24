@extends('layouts.admin')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')

@section('content')
    @php
        $cards = [
            ['label' => 'Projects', 'value' => $projectCount, 'route' => 'admin.projects.index'],
            ['label' => 'Blog Posts', 'value' => $postCount, 'route' => 'admin.posts.index'],
            ['label' => 'Testimonials', 'value' => $testimonialCount, 'route' => 'admin.testimonials.index'],
            ['label' => 'Messages', 'value' => $messageCount, 'route' => 'admin.messages.index', 'badge' => $unreadCount],
        ];
    @endphp

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @foreach ($cards as $card)
            <a href="{{ route($card['route']) }}" class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <span class="text-gray-500 text-sm font-medium">{{ $card['label'] }}</span>
                    @if (($card['badge'] ?? 0) > 0)
                        <span class="bg-[#f5a623] text-[#1a3c2a] text-xs font-bold px-2 py-0.5 rounded-full">{{ $card['badge'] }} new</span>
                    @endif
                </div>
                <div class="text-3xl font-bold text-[#1a3c2a] mt-2">{{ $card['value'] }}</div>
            </a>
        @endforeach
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="font-bold text-[#1a3c2a]">Recent Messages</h2>
            <a href="{{ route('admin.messages.index') }}" class="text-sm text-[#f5a623] font-semibold">View all</a>
        </div>
        @if ($recentMessages->isEmpty())
            <p class="px-6 py-8 text-gray-500 text-center">No messages yet.</p>
        @else
            <ul class="divide-y divide-gray-100">
                @foreach ($recentMessages as $message)
                    <li>
                        <a href="{{ route('admin.messages.show', $message) }}" class="flex items-center justify-between px-6 py-4 hover:bg-gray-50">
                            <span>
                                <span class="font-medium text-[#1a3c2a] {{ $message->read_at ? '' : 'font-bold' }}">{{ $message->full_name }}</span>
                                <span class="block text-sm text-gray-500">{{ $message->subject }}</span>
                            </span>
                            <span class="text-xs text-gray-400">{{ $message->created_at->diffForHumans() }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
