<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'category_id' => 'nullable|integer|exists:service_categories,id',
            'service_type' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function show($id)
    {
        $item = Service::with('category', 'features', 'specifications', 'brochures')->findOrFail($id);
        return view('admin.services.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Service::findOrFail($id);
        return view('admin.services.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Service::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug,' . $id,
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'category_id' => 'nullable|integer|exists:service_categories,id',
            'service_type' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        $item->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        $item = Service::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
