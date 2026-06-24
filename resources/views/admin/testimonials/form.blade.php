@extends('layouts.admin')

@section('title', $testimonial->exists ? 'Edit Testimonial' : 'New Testimonial')
@section('heading', $testimonial->exists ? 'Edit Testimonial' : 'New Testimonial')

@section('content')
    @php
        $input = 'w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#f5a623] focus:border-transparent outline-none';
        $colors = ['bg-purple-500','bg-blue-500','bg-emerald-500','bg-pink-500','bg-amber-500','bg-cyan-500','bg-red-500','bg-indigo-500'];
    @endphp

    <form action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5 max-w-2xl">
        @csrf
        @if ($testimonial->exists) @method('PUT') @endif

        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Name</label>
                <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" class="{{ $input }}" required>
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Role / Company</label>
                <input type="text" name="role" value="{{ old('role', $testimonial->role) }}" class="{{ $input }}" required>
            </div>
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1.5">Testimonial</label>
            <textarea name="content" rows="4" class="{{ $input }}" required>{{ old('content', $testimonial->content) }}</textarea>
        </div>

        <div class="grid sm:grid-cols-3 gap-5">
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Rating</label>
                <select name="rating" class="{{ $input }}">
                    @for ($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" @selected(old('rating', $testimonial->rating) == $i)>{{ $i }} star{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                </select>
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Initials <span class="text-gray-400 text-sm">(auto if blank)</span></label>
                <input type="text" name="avatar" maxlength="4" value="{{ old('avatar', $testimonial->avatar) }}" class="{{ $input }}">
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Avatar Color</label>
                <select name="color" class="{{ $input }}">
                    @foreach ($colors as $color)
                        <option value="{{ $color }}" @selected(old('color', $testimonial->color) === $color)>{{ str_replace(['bg-','-500'], '', $color) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1.5">Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order) }}" class="{{ $input }} max-w-xs">
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-[#1a3c2a] text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-[#2d5a3d] transition-colors">Save</button>
            <a href="{{ route('admin.testimonials.index') }}" class="px-6 py-2.5 rounded-lg font-semibold text-gray-600 hover:bg-gray-100">Cancel</a>
        </div>
    </form>
@endsection
