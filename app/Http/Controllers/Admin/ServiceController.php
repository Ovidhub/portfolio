<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('admin.services.index', [
            'services' => Service::ordered()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.services.form', ['service' => new Service(['icon' => 'code'])]);
    }

    public function store(Request $request)
    {
        Service::create($this->validateData($request));

        return redirect()->route('admin.services.index')->with('status', 'Service created.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', ['service' => $service]);
    }

    public function update(Request $request, Service $service)
    {
        $service->update($this->validateData($request));

        return redirect()->route('admin.services.index')->with('status', 'Service updated.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')->with('status', 'Service deleted.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string', 'max:500'],
            'icon' => ['required', 'string', 'max:50'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }
}
