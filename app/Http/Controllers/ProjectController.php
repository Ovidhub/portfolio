<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index', [
            'projects' => Project::ordered()->get(),
        ]);
    }

    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project,
            'related' => Project::where('id', '!=', $project->id)->ordered()->take(3)->get(),
        ]);
    }
}
