@extends('layouts.admin')

@section('title', 'Tools')
@section('heading', 'Tools & Tech')

@section('content')
    <div class="flex justify-end mb-6">
        <a href="{{ route('admin.tools.create') }}" class="bg-[#1a3c2a] text-white px-5 py-2.5 rounded-lg font-semibold text-sm hover:bg-[#2d5a3d] transition-colors flex items-center gap-2">
            <x-icon name="plus" class="w-4 h-4" /> New Tool
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        @if ($tools->isEmpty())
            <p class="px-6 py-10 text-center text-gray-500">No tools yet.</p>
        @else
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-left text-gray-500">
                    <tr>
                        <th class="px-6 py-3 font-medium">Name</th>
                        <th class="px-6 py-3 font-medium hidden md:table-cell">Color</th>
                        <th class="px-6 py-3 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($tools as $tool)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-[#1a3c2a] flex items-center gap-3">
                                <x-icon :name="$tool->icon" class="w-5 h-5" :style="'color: ' . $tool->color" />
                                {{ $tool->name }}
                            </td>
                            <td class="px-6 py-4 text-gray-500 hidden md:table-cell">
                                <span class="inline-flex items-center gap-2"><span class="w-4 h-4 rounded-full" style="background: {{ $tool->color }}"></span>{{ $tool->color }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.tools.edit', $tool) }}" class="text-[#1a3c2a] font-semibold hover:text-[#f5a623]">Edit</a>
                                    <form action="{{ route('admin.tools.destroy', $tool) }}" method="POST" onsubmit="return confirm('Delete this tool?')">
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
