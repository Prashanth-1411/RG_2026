<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryImageController extends Controller
{
    public function index()
    {
        $items = GalleryImage::with('album')->latest()->paginate(10);
        $columns = ['album_id' => 'Album', 'title' => 'Title', 'alt_text' => 'Alt Text'];
        return view('admin.gallery_images.index', compact('items', 'columns'));
    }

    public function create()
    {
        return view('admin.gallery_images.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'album_id' => 'nullable|integer|exists:albums,id',
            'title' => 'nullable|string|max:255',
            'image' => 'required|string|max:255',
            'alt_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        GalleryImage::create($validated);

        return redirect()->route('admin.gallery_images.index')
            ->with('success', 'GalleryImage created successfully.');
    }

    public function show($id)
    {
        $item = GalleryImage::with('album')->findOrFail($id);
        return view('admin.gallery_images.show', compact('item'));
    }

    public function edit($id)
    {
        $item = GalleryImage::findOrFail($id);
        return view('admin.gallery_images.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = GalleryImage::findOrFail($id);
        $validated = $request->validate([
            'album_id' => 'nullable|integer|exists:albums,id',
            'title' => 'nullable|string|max:255',
            'image' => 'required|string|max:255',
            'alt_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $item->update($validated);

        return redirect()->route('admin.gallery_images.index')
            ->with('success', 'GalleryImage updated successfully.');
    }

    public function destroy($id)
    {
        $item = GalleryImage::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.gallery_images.index')
            ->with('success', 'GalleryImage deleted successfully.');
    }
}
