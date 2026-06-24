@extends('layouts.admin')

@section('title', $tool->exists ? 'Edit Tool' : 'New Tool')
@section('heading', $tool->exists ? 'Edit Tool' : 'New Tool')

@section('content')
    @php
        $input = 'w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#f5a623] focus:border-transparent outline-none';
        $icons = ['atom','server','file-code','layers','paintbrush','database','leaf','cloud','box','git-branch','pen-tool','terminal','code'];
    @endphp

    <form action="{{ $tool->exists ? route('admin.tools.update', $tool) : route('admin.tools.store') }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5 max-w-2xl">
        @csrf
        @if ($tool->exists) @method('PUT') @endif

        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Name</label>
                <input type="text" name="name" value="{{ old('name', $tool->name) }}" class="{{ $input }}" required>
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Icon</label>
                <select name="icon" class="{{ $input }}">
                    @foreach ($icons as $ic)
                        <option value="{{ $ic }}" @selected(old('icon', $tool->icon) === $ic)>{{ $ic }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Brand Color (hex)</label>
                <input type="text" name="color" value="{{ old('color', $tool->color) }}" class="{{ $input }}" placeholder="#61DAFB">
            </div>
            <div>
                <label class="block font-medium text-gray-700 mb-1.5">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $tool->sort_order) }}" class="{{ $input }}">
            </div>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-[#1a3c2a] text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-[#2d5a3d] transition-colors">Save</button>
            <a href="{{ route('admin.tools.index') }}" class="px-6 py-2.5 rounded-lg font-semibold text-gray-600 hover:bg-gray-100">Cancel</a>
        </div>
    </form>
@endsection
