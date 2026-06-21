<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->paginate(10);
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'page_name' => 'required|string|max:255',
            'heading' => 'nullable|string|max:255',
            'subheading' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'hero_image' => 'nullable|string|max:255',
            'hero_video' => 'nullable|string|max:255',
            'status' => 'boolean',
        ]);

        Page::create($validated);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page created successfully.');
    }

    public function show($id)
    {
        $item = Page::findOrFail($id);
        return view('admin.pages.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Page::findOrFail($id);
        return view('admin.pages.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Page::findOrFail($id);
        $validated = $request->validate([
            'page_name' => 'required|string|max:255',
            'heading' => 'nullable|string|max:255',
            'subheading' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'hero_image' => 'nullable|string|max:255',
            'hero_video' => 'nullable|string|max:255',
            'status' => 'boolean',
        ]);

        $item->update($validated);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page updated successfully.');
    }

    public function destroy($id)
    {
        $item = Page::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page deleted successfully.');
    }
}
