<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $items = Album::latest()->paginate(10);
        $columns = ['title' => 'Title', 'description' => 'Description', 'sort_order' => 'Sort Order', 'status' => 'Status'];
        return view('admin.albums.index', compact('items', 'columns'));
    }

    public function create()
    {
        return view('admin.albums.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        Album::create($validated);

        return redirect()->route('admin.albums.index')
            ->with('success', 'Album created successfully.');
    }

    public function show($id)
    {
        $item = Album::with('images')->findOrFail($id);
        return view('admin.albums.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Album::findOrFail($id);
        return view('admin.albums.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Album::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        $item->update($validated);

        return redirect()->route('admin.albums.index')
            ->with('success', 'Album updated successfully.');
    }

    public function destroy($id)
    {
        $item = Album::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.albums.index')
            ->with('success', 'Album deleted successfully.');
    }
}
