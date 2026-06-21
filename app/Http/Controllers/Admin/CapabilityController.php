<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Capability;
use Illuminate\Http\Request;

class CapabilityController extends Controller
{
    public function index()
    {
        $items = Capability::latest()->paginate(10);
        $columns = ['title' => 'Title', 'description' => 'Description', 'status' => 'Status'];
        return view('admin.capabilities.index', compact('items', 'columns'));
    }

    public function create()
    {
        return view('admin.capabilities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        Capability::create($validated);

        return redirect()->route('admin.capabilities.index')
            ->with('success', 'Capability created successfully.');
    }

    public function show($id)
    {
        $item = Capability::findOrFail($id);
        return view('admin.capabilities.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Capability::findOrFail($id);
        return view('admin.capabilities.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Capability::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        $item->update($validated);

        return redirect()->route('admin.capabilities.index')
            ->with('success', 'Capability updated successfully.');
    }

    public function destroy($id)
    {
        $item = Capability::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.capabilities.index')
            ->with('success', 'Capability deleted successfully.');
    }
}
