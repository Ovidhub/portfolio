@extends('layouts.admin')

@section('title', 'Message')
@section('heading', 'Message')

@section('content')
    <div class="max-w-2xl">
        <a href="{{ route('admin.messages.index') }}" class="text-sm text-gray-500 hover:text-[#1a3c2a] mb-4 inline-block">&larr; Back to messages</a>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-start justify-between gap-4 border-b border-gray-100 pb-4 mb-4">
                <div>
                    <h2 class="text-xl font-bold text-[#1a3c2a]">{{ $message->subject }}</h2>
                    <p class="text-gray-500 text-sm mt-1">
                        From <span class="font-medium text-gray-700">{{ $message->full_name }}</span>
                        &lt;<a href="mailto:{{ $message->email }}" class="text-[#f5a623] hover:underline">{{ $message->email }}</a>&gt;
                    </p>
                </div>
                <span class="text-xs text-gray-400 whitespace-nowrap">{{ $message->created_at->format('M d, Y g:i A') }}</span>
            </div>

            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $message->message }}</p>

            <div class="flex gap-3 mt-6 pt-4 border-t border-gray-100">
                <a href="mailto:{{ $message->email }}?subject=Re: {{ rawurlencode($message->subject) }}" class="bg-[#1a3c2a] text-white px-5 py-2.5 rounded-lg font-semibold text-sm hover:bg-[#2d5a3d] transition-colors">Reply by Email</a>
                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                    @csrf @method('DELETE')
                    <button class="px-5 py-2.5 rounded-lg font-semibold text-sm text-red-500 hover:bg-red-50">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
