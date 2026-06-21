<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoMetum;
use Illuminate\Http\Request;

class SeoMetumController extends Controller
{
    public function index()
    {
        $items = SeoMetum::latest()->paginate(10);
        return view('admin.seo_meta.index', compact('items'));
    }

    public function create()
    {
        return view('admin.seo_meta.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page_name' => 'required|string|max:255|unique:seo_meta,page_name',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'og_image' => 'nullable|string|max:255',
            'structured_data' => 'nullable|string',
            'canonical_url' => 'nullable|string|max:255',
        ]);

        SeoMetum::create($validated);

        return redirect()->route('admin.seo_meta.index')
            ->with('success', 'SeoMetum created successfully.');
    }

    public function edit($id)
    {
        $item = SeoMetum::findOrFail($id);
        return view('admin.seo_meta.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = SeoMetum::findOrFail($id);
        $validated = $request->validate([
            'page_name' => 'required|string|max:255|unique:seo_meta,page_name,' . $id,
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'og_image' => 'nullable|string|max:255',
            'structured_data' => 'nullable|string',
            'canonical_url' => 'nullable|string|max:255',
        ]);

        $item->update($validated);

        return redirect()->route('admin.seo_meta.index')
            ->with('success', 'SeoMetum updated successfully.');
    }

    public function destroy($id)
    {
        $item = SeoMetum::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.seo_meta.index')
            ->with('success', 'SeoMetum deleted successfully.');
    }
}
