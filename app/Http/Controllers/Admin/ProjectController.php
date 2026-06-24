<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    use HandlesUploads;

    public function index()
    {
        return view('admin.projects.index', [
            'projects' => Project::ordered()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.projects.form', [
            'project' => new Project(['color' => 'from-purple-500 to-pink-500', 'icon' => 'code', 'featured' => true]),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->uniqueSlug($data['title']);
        $data['tags'] = $this->parseTags($request->input('tags'));
        $data['featured'] = $request->boolean('featured');
        $data['image'] = $this->storeUpload($request, 'image', 'projects');

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('status', 'Project created.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.form', ['project' => $project]);
    }

    public function update(Request $request, Project $project)
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->uniqueSlug($data['title'], $project->id);
        $data['tags'] = $this->parseTags($request->input('tags'));
        $data['featured'] = $request->boolean('featured');
        $data['image'] = $this->storeUpload($request, 'image', 'projects', $project->image);

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('status', 'Project updated.');
    }

    public function destroy(Project $project)
    {
        $this->deleteUpload($project->image);
        $project->delete();

        return redirect()->route('admin.projects.index')->with('status', 'Project deleted.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string', 'max:500'],
            'body' => ['nullable', 'string'],
            'icon' => ['required', 'string', 'max:50'],
            'color' => ['required', 'string', 'max:100'],
            'link' => ['nullable', 'string', 'max:255'],
            'github' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:4096'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }

    private function parseTags(?string $tags): array
    {
        return collect(explode(',', (string) $tags))
            ->map(fn ($t) => trim($t))
            ->filter()
            ->values()
            ->all();
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i = 1;

        while (Project::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }
}
