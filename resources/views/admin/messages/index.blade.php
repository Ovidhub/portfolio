@extends('layouts.admin')

@section('title', 'Messages')
@section('heading', 'Contact Messages')

@section('content')
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        @if ($messages->isEmpty())
            <p class="px-6 py-10 text-center text-gray-500">No messages yet.</p>
        @else
            <ul class="divide-y divide-gray-100">
                @foreach ($messages as $message)
                    <li class="flex items-center gap-4 px-6 py-4 hover:bg-gray-50 {{ $message->read_at ? '' : 'bg-[#f5a623]/5' }}">
                        <a href="{{ route('admin.messages.show', $message) }}" class="flex-1 min-w-0">
                            <div class="flex items-center gap-2">
                                @unless ($message->read_at)<span class="w-2 h-2 bg-[#f5a623] rounded-full"></span>@endunless
                                <span class="font-{{ $message->read_at ? 'medium' : 'bold' }} text-[#1a3c2a]">{{ $message->full_name }}</span>
                                <span class="text-gray-400 text-sm truncate">&lt;{{ $message->email }}&gt;</span>
                            </div>
                            <div class="text-sm text-gray-600 truncate">{{ $message->subject }} — {{ \Illuminate\Support\Str::limit($message->message, 70) }}</div>
                        </a>
                        <span class="text-xs text-gray-400 whitespace-nowrap">{{ $message->created_at->diffForHumans() }}</span>
                        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                            @csrf @method('DELETE')
                            <button class="text-red-400 hover:text-red-600" title="Delete"><x-icon name="x" class="w-4 h-4" /></button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="mt-6">{{ $messages->links() }}</div>
@endsection
