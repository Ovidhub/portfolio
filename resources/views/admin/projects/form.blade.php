@extends('layouts.admin')

@section('title', $project->exists ? 'Edit Project' : 'New Project')
@section('heading', $project->exists ? 'Edit Project' : 'New Project')

@section('content')
    @php $input = 'w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#f5a623] focus:border-transparent outline-none'; @endphp

    <form action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5 max-w-2xl">
        @csrf
        @if ($project->exists) @method('PUT') @endif

        <div>
            <label class="block font-medium text-gray-700 mb-1.5">Title</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}" class="{{ $input }}" required>
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1.5">Short Description</label>
            <textarea name="description" rows="2" class="{{ $input }}" required>{{ old('description', $project->description) }}</textarea>
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1.5">Full Body</label>
            <textarea name="body" rows="6" class="{{ $input }}" placeholder="Separate paragraphs with a blank line.">{{ old('body', $project->body) }}</textarea>
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Tags <span class="text-gray-400 text-sm">(comma separated)</span></label>
                <input type="text" name="tags" value="{{ old('tags', implode(', ', $project->tags ?? [])) }}" class="{{ $input }}" placeholder="React, Node.js, Stripe">
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Icon <span class="text-gray-400 text-sm">(fallback when no image)</span></label>
                <select name="icon" class="{{ $input }}">
                    @foreach (['code','shopping-cart','clipboard-list','bar-chart','smartphone','layout','database','server'] as $ic)
                        <option value="{{ $ic }}" @selected(old('icon', $project->icon) === $ic)>{{ $ic }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Gradient Color Classes</label>
                <input type="text" name="color" value="{{ old('color', $project->color) }}" class="{{ $input }}" placeholder="from-purple-500 to-pink-500">
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order) }}" class="{{ $input }}">
            </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Live Link</label>
                <input type="text" name="link" value="{{ old('link', $project->link) }}" class="{{ $input }}" placeholder="https://...">
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">GitHub</label>
                <input type="text" name="github" value="{{ old('github', $project->github) }}" class="{{ $input }}" placeholder="https://github.com/...">
            </div>
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1.5">Cover Image</label>
            @if ($project->image)
                <img src="{{ $project->image }}" alt="" class="w-32 h-20 object-cover rounded-lg mb-2">
            @endif
            <input type="file" name="image" accept="image/*" class="{{ $input }}">
        </div>

        <label class="flex items-center gap-2">
            <input type="checkbox" name="featured" value="1" @checked(old('featured', $project->featured)) class="rounded border-gray-300 text-[#1a3c2a] focus:ring-[#f5a623]">
            <span class="font-medium text-gray-700">Show on homepage</span>
        </label>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-[#1a3c2a] text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-[#2d5a3d] transition-colors">Save</button>
            <a href="{{ route('admin.projects.index') }}" class="px-6 py-2.5 rounded-lg font-semibold text-gray-600 hover:bg-gray-100">Cancel</a>
        </div>
    </form>
@endsection
