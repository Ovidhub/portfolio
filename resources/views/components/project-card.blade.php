@props(['project'])

<article data-reveal class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all group flex flex-col">
    <a href="{{ route('projects.show', $project) }}" class="block">
        <div class="h-48 bg-gradient-to-br {{ $project->color }} flex items-center justify-center relative overflow-hidden">
            @if ($project->image)
                <img src="{{ $project->image }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" width="600" height="400" loading="lazy">
            @else
                <div class="group-hover:scale-110 transition-transform duration-300">
                    <x-icon :name="$project->icon" class="w-16 h-16 text-white" />
                </div>
            @endif
        </div>
    </a>

    <div class="p-6 flex flex-col flex-1">
        <h3 class="text-xl font-bold text-[#1a3c2a] mb-2 group-hover:text-[#f5a623] transition-colors">
            <a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
        </h3>
        <p class="text-gray-600 text-sm mb-4 flex-1">{{ $project->description }}</p>
        <div class="flex flex-wrap gap-2 mb-4">
            @foreach ($project->tags ?? [] as $tag)
                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-medium">{{ $tag }}</span>
            @endforeach
        </div>
        <div class="flex items-center gap-4 pt-2 border-t border-gray-100">
            <a href="{{ route('projects.show', $project) }}" class="text-[#1a3c2a] font-semibold text-sm flex items-center gap-1 hover:text-[#f5a623] transition-colors">
                View Details <x-icon name="arrow-right" class="w-4 h-4" />
            </a>
            @if ($project->link && $project->link !== '#')
                <a href="{{ $project->link }}" target="_blank" rel="noopener" class="ml-auto text-gray-400 hover:text-[#f5a623] transition-colors" title="Live site"><x-icon name="external-link" class="w-5 h-5" /></a>
            @endif
            @if ($project->github && $project->github !== '#')
                <a href="{{ $project->github }}" target="_blank" rel="noopener" class="text-gray-400 hover:text-[#f5a623] transition-colors" title="Source code"><x-icon name="code" class="w-5 h-5" /></a>
            @endif
        </div>
    </div>
</article>
