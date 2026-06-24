@extends('layouts.admin')

@section('title', 'Testimonials')
@section('heading', 'Testimonials')

@section('content')
    <div class="flex justify-end mb-6">
        <a href="{{ route('admin.testimonials.create') }}" class="bg-[#1a3c2a] text-white px-5 py-2.5 rounded-lg font-semibold text-sm hover:bg-[#2d5a3d] transition-colors flex items-center gap-2">
            <x-icon name="plus" class="w-4 h-4" /> New Testimonial
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        @if ($testimonials->isEmpty())
            <p class="px-6 py-10 text-center text-gray-500">No testimonials yet.</p>
        @else
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-left text-gray-500">
                    <tr>
                        <th class="px-6 py-3 font-medium">Name</th>
                        <th class="px-6 py-3 font-medium hidden md:table-cell">Role</th>
                        <th class="px-6 py-3 font-medium">Rating</th>
                        <th class="px-6 py-3 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($testimonials as $testimonial)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-[#1a3c2a] flex items-center gap-3">
                                <span class="w-9 h-9 {{ $testimonial->color }} rounded-full flex items-center justify-center text-white text-xs font-bold">{{ $testimonial->avatar }}</span>
                                {{ $testimonial->name }}
                            </td>
                            <td class="px-6 py-4 text-gray-500 hidden md:table-cell">{{ $testimonial->role }}</td>
                            <td class="px-6 py-4 text-[#f5a623]">{{ str_repeat('★', $testimonial->rating) }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-[#1a3c2a] font-semibold hover:text-[#f5a623]">Edit</a>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Delete this testimonial?')">
                                        @csrf @method('DELETE')
                                        <button class="text-red-500 hover:text-red-700 font-semibold">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
