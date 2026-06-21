<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $serviceCategories = ServiceCategory::latest()->paginate(10);
        return view('admin.service_categories.index', compact('serviceCategories'));
    }

    public function create()
    {
        return view('admin.service_categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:service_categories,slug',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'service_type' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        ServiceCategory::create($validated);

        return redirect()->route('admin.service_categories.index')
            ->with('success', 'ServiceCategory created successfully.');
    }

    public function show($id)
    {
        $item = ServiceCategory::findOrFail($id);
        return view('admin.service_categories.show', compact('item'));
    }

    public function edit($id)
    {
        $item = ServiceCategory::findOrFail($id);
        return view('admin.service_categories.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ServiceCategory::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:service_categories,slug,' . $id,
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'service_type' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        $item->update($validated);

        return redirect()->route('admin.service_categories.index')
            ->with('success', 'ServiceCategory updated successfully.');
    }

    public function destroy($id)
    {
        $item = ServiceCategory::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.service_categories.index')
            ->with('success', 'ServiceCategory deleted successfully.');
    }
}
