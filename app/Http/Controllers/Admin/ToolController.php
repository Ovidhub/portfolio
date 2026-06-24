<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index()
    {
        return view('admin.tools.index', [
            'tools' => Tool::ordered()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.tools.form', ['tool' => new Tool(['icon' => 'code', 'color' => '#1a3c2a'])]);
    }

    public function store(Request $request)
    {
        Tool::create($this->validateData($request));

        return redirect()->route('admin.tools.index')->with('status', 'Tool created.');
    }

    public function edit(Tool $tool)
    {
        return view('admin.tools.form', ['tool' => $tool]);
    }

    public function update(Request $request, Tool $tool)
    {
        $tool->update($this->validateData($request));

        return redirect()->route('admin.tools.index')->with('status', 'Tool updated.');
    }

    public function destroy(Tool $tool)
    {
        $tool->delete();

        return redirect()->route('admin.tools.index')->with('status', 'Tool deleted.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'icon' => ['required', 'string', 'max:50'],
            'color' => ['required', 'string', 'max:30'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }
}
