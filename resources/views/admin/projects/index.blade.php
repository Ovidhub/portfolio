@extends('layouts.admin')

@section('title', 'Projects')
@section('heading', 'Projects')

@section('content')
    <div class="flex justify-end mb-6">
        <a href="{{ route('admin.projects.create') }}" class="bg-[#1a3c2a] text-white px-5 py-2.5 rounded-lg font-semibold text-sm hover:bg-[#2d5a3d] transition-colors flex items-center gap-2">
            <x-icon name="plus" class="w-4 h-4" /> New Project
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        @if ($projects->isEmpty())
            <p class="px-6 py-10 text-center text-gray-500">No projects yet. Create your first one.</p>
        @else
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-left text-gray-500">
                    <tr>
                        <th class="px-6 py-3 font-medium">Title</th>
                        <th class="px-6 py-3 font-medium hidden md:table-cell">Tags</th>
                        <th class="px-6 py-3 font-medium">Featured</th>
                        <th class="px-6 py-3 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($projects as $project)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-[#1a3c2a]">{{ $project->title }}</td>
                            <td class="px-6 py-4 text-gray-500 hidden md:table-cell">{{ implode(', ', $project->tags ?? []) }}</td>
                            <td class="px-6 py-4">
                                @if ($project->featured)
                                    <span class="bg-green-100 text-green-700 text-xs px-2 py-0.5 rounded-full">Yes</span>
                                @else
                                    <span class="bg-gray-100 text-gray-500 text-xs px-2 py-0.5 rounded-full">No</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('projects.show', $project) }}" target="_blank" class="text-gray-400 hover:text-[#f5a623]" title="View"><x-icon name="external-link" class="w-4 h-4" /></a>
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-[#1a3c2a] font-semibold hover:text-[#f5a623]">Edit</a>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Delete this project?')">
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
