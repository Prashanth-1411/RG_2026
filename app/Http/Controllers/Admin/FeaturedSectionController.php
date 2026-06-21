<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeaturedSection;
use Illuminate\Http\Request;

class FeaturedSectionController extends Controller
{
    public function index()
    {
        $items = FeaturedSection::latest()->paginate(10);
        $columns = ['title' => 'Title', 'section_type' => 'Type', 'status' => 'Status'];
        return view('admin.featured_sections.index', compact('items', 'columns'));
    }

    public function create()
    {
        return view('admin.featured_sections.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'section_type' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        FeaturedSection::create($validated);

        return redirect()->route('admin.featured_sections.index')
            ->with('success', 'FeaturedSection created successfully.');
    }

    public function show($id)
    {
        $item = FeaturedSection::findOrFail($id);
        return view('admin.featured_sections.show', compact('item'));
    }

    public function edit($id)
    {
        $item = FeaturedSection::findOrFail($id);
        return view('admin.featured_sections.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = FeaturedSection::findOrFail($id);
        $validated = $request->validate([
            'icon' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'section_type' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        $item->update($validated);

        return redirect()->route('admin.featured_sections.index')
            ->with('success', 'FeaturedSection updated successfully.');
    }

    public function destroy($id)
    {
        $item = FeaturedSection::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.featured_sections.index')
            ->with('success', 'FeaturedSection deleted successfully.');
    }
}
