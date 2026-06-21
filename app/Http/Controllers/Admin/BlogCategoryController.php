<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $items = BlogCategory::latest()->paginate(10);
        $columns = ['name' => 'Name', 'slug' => 'Slug', 'status' => 'Status'];
        return view('admin.blog_categories.index', compact('items', 'columns'));
    }

    public function create()
    {
        return view('admin.blog_categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_categories,slug',
            'status' => 'boolean',
        ]);

        BlogCategory::create($validated);

        return redirect()->route('admin.blog_categories.index')
            ->with('success', 'BlogCategory created successfully.');
    }

    public function show($id)
    {
        $item = BlogCategory::with('posts')->findOrFail($id);
        return view('admin.blog_categories.show', compact('item'));
    }

    public function edit($id)
    {
        $item = BlogCategory::findOrFail($id);
        return view('admin.blog_categories.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = BlogCategory::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_categories,slug,' . $id,
            'status' => 'boolean',
        ]);

        $item->update($validated);

        return redirect()->route('admin.blog_categories.index')
            ->with('success', 'BlogCategory updated successfully.');
    }

    public function destroy($id)
    {
        $item = BlogCategory::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.blog_categories.index')
            ->with('success', 'BlogCategory deleted successfully.');
    }
}
