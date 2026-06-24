@extends('layouts.admin')

@section('title', $post->exists ? 'Edit Post' : 'New Post')
@section('heading', $post->exists ? 'Edit Post' : 'New Post')

@section('content')
    @php $input = 'w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#f5a623] focus:border-transparent outline-none'; @endphp

    <form action="{{ $post->exists ? route('admin.posts.update', $post) : route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5 max-w-2xl">
        @csrf
        @if ($post->exists) @method('PUT') @endif

        <div>
            <label class="block font-medium text-gray-700 mb-1.5">Title</label>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" class="{{ $input }}" required>
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1.5">Excerpt</label>
            <textarea name="excerpt" rows="2" class="{{ $input }}" required>{{ old('excerpt', $post->excerpt) }}</textarea>
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1.5">Body</label>
            <textarea name="body" rows="10" class="{{ $input }}" placeholder="Separate paragraphs with a blank line." required>{{ old('body', $post->body) }}</textarea>
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Publish Date <span class="text-gray-400 text-sm">(leave blank for draft)</span></label>
                <input type="datetime-local" name="published_at" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}" class="{{ $input }}">
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Cover Image</label>
                @if ($post->cover_image)
                    <img src="{{ $post->cover_image }}" alt="" class="w-32 h-20 object-cover rounded-lg mb-2">
                @endif
                <input type="file" name="cover_image" accept="image/*" class="{{ $input }}">
            </div>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-[#1a3c2a] text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-[#2d5a3d] transition-colors">Save</button>
            <a href="{{ route('admin.posts.index') }}" class="px-6 py-2.5 rounded-lg font-semibold text-gray-600 hover:bg-gray-100">Cancel</a>
        </div>
    </form>
@endsection
