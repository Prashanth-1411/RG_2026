<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceArea;
use Illuminate\Http\Request;

class ServiceAreaController extends Controller
{
    public function index()
    {
        $items = ServiceArea::latest()->paginate(10);
        $columns = ['name' => 'Name', 'region' => 'Region', 'is_active' => 'Active'];
        return view('admin.service_areas.index', compact('items', 'columns'));
    }

    public function create()
    {
        return view('admin.service_areas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:service_areas,slug',
            'region' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        ServiceArea::create($validated);

        return redirect()->route('admin.service_areas.index')
            ->with('success', 'ServiceArea created successfully.');
    }

    public function show($id)
    {
        $item = ServiceArea::findOrFail($id);
        return view('admin.service_areas.show', compact('item'));
    }

    public function edit($id)
    {
        $item = ServiceArea::findOrFail($id);
        return view('admin.service_areas.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ServiceArea::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:service_areas,slug,' . $id,
            'region' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $item->update($validated);

        return redirect()->route('admin.service_areas.index')
            ->with('success', 'ServiceArea updated successfully.');
    }

    public function destroy($id)
    {
        $item = ServiceArea::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.service_areas.index')
            ->with('success', 'ServiceArea deleted successfully.');
    }
}
