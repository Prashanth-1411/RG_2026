<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        $blogPosts = BlogPost::with('category')->latest()->paginate(10);
        return view('admin.blog_posts.index', compact('blogPosts'));
    }

    public function create()
    {
        return view('admin.blog_posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_posts,slug',
            'content' => 'nullable|string',
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'category_id' => 'nullable|integer|exists:blog_categories,id',
            'tags' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'reading_time' => 'nullable|string|max:50',
            'views' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'is_featured' => 'boolean',
            'status' => 'boolean',
        ]);

        BlogPost::create($validated);

        return redirect()->route('admin.blog_posts.index')
            ->with('success', 'BlogPost created successfully.');
    }

    public function show($id)
    {
        $item = BlogPost::with('category')->findOrFail($id);
        return view('admin.blog_posts.show', compact('item'));
    }

    public function edit($id)
    {
        $item = BlogPost::findOrFail($id);
        return view('admin.blog_posts.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = BlogPost::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_posts,slug,' . $id,
            'content' => 'nullable|string',
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'category_id' => 'nullable|integer|exists:blog_categories,id',
            'tags' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'reading_time' => 'nullable|string|max:50',
            'views' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'is_featured' => 'boolean',
            'status' => 'boolean',
        ]);

        $item->update($validated);

        return redirect()->route('admin.blog_posts.index')
            ->with('success', 'BlogPost updated successfully.');
    }

    public function destroy($id)
    {
        $item = BlogPost::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.blog_posts.index')
            ->with('success', 'BlogPost deleted successfully.');
    }
}
