@extends('layouts.admin')

@section('title', $service->exists ? 'Edit Service' : 'New Service')
@section('heading', $service->exists ? 'Edit Service' : 'New Service')

@section('content')
    @php
        $input = 'w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#f5a623] focus:border-transparent outline-none';
        $icons = ['code','smartphone','layout','palette','database','server','cloud','box'];
    @endphp

    <form action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5 max-w-2xl">
        @csrf
        @if ($service->exists) @method('PUT') @endif

        <div>
            <label class="block font-medium text-gray-700 mb-1.5">Title</label>
            <input type="text" name="title" value="{{ old('title', $service->title) }}" class="{{ $input }}" required>
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1.5">Description</label>
            <textarea name="description" rows="3" class="{{ $input }}" required>{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Icon</label>
                <select name="icon" class="{{ $input }}">
                    @foreach ($icons as $ic)
                        <option value="{{ $ic }}" @selected(old('icon', $service->icon) === $ic)>{{ $ic }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order) }}" class="{{ $input }}">
            </div>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-[#1a3c2a] text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-[#2d5a3d] transition-colors">Save</button>
            <a href="{{ route('admin.services.index') }}" class="px-6 py-2.5 rounded-lg font-semibold text-gray-600 hover:bg-gray-100">Cancel</a>
        </div>
    </form>
@endsection
