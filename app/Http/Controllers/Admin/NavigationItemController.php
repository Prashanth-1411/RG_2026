<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NavigationItem;
use Illuminate\Http\Request;

class NavigationItemController extends Controller
{
    public function index()
    {
        $items = NavigationItem::with('parent')->latest()->paginate(10);
        $columns = ['label' => 'Label', 'link' => 'Link', 'location' => 'Location', 'status' => 'Status'];
        return view('admin.navigation_items.index', compact('items', 'columns'));
    }

    public function create()
    {
        return view('admin.navigation_items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'parent_id' => 'nullable|integer|exists:navigation_items,id',
            'location' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        NavigationItem::create($validated);

        return redirect()->route('admin.navigation_items.index')
            ->with('success', 'NavigationItem created successfully.');
    }

    public function show($id)
    {
        $item = NavigationItem::with('parent', 'children')->findOrFail($id);
        return view('admin.navigation_items.show', compact('item'));
    }

    public function edit($id)
    {
        $item = NavigationItem::findOrFail($id);
        return view('admin.navigation_items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = NavigationItem::findOrFail($id);
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'parent_id' => 'nullable|integer|exists:navigation_items,id',
            'location' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        $item->update($validated);

        return redirect()->route('admin.navigation_items.index')
            ->with('success', 'NavigationItem updated successfully.');
    }

    public function destroy($id)
    {
        $item = NavigationItem::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.navigation_items.index')
            ->with('success', 'NavigationItem deleted successfully.');
    }
}
