<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceFeature;
use Illuminate\Http\Request;

class ServiceFeatureController extends Controller
{
    public function index()
    {
        $items = ServiceFeature::with('service')->latest()->paginate(10);
        $columns = ['service_id' => 'Service', 'feature' => 'Feature'];
        return view('admin.service_features.index', compact('items', 'columns'));
    }

    public function create()
    {
        return view('admin.service_features.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|integer|exists:services,id',
            'feature' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        ServiceFeature::create($validated);

        return redirect()->route('admin.service_features.index')
            ->with('success', 'ServiceFeature created successfully.');
    }

    public function show($id)
    {
        $item = ServiceFeature::with('service')->findOrFail($id);
        return view('admin.service_features.show', compact('item'));
    }

    public function edit($id)
    {
        $item = ServiceFeature::findOrFail($id);
        return view('admin.service_features.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ServiceFeature::findOrFail($id);
        $validated = $request->validate([
            'service_id' => 'required|integer|exists:services,id',
            'feature' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $item->update($validated);

        return redirect()->route('admin.service_features.index')
            ->with('success', 'ServiceFeature updated successfully.');
    }

    public function destroy($id)
    {
        $item = ServiceFeature::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.service_features.index')
            ->with('success', 'ServiceFeature deleted successfully.');
    }
}
