<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceSpecification;
use Illuminate\Http\Request;

class ServiceSpecificationController extends Controller
{
    public function index()
    {
        $items = ServiceSpecification::with('service')->latest()->paginate(10);
        $columns = ['service_id' => 'Service', 'spec_key' => 'Key', 'spec_value' => 'Value'];
        return view('admin.service_specifications.index', compact('items', 'columns'));
    }

    public function create()
    {
        return view('admin.service_specifications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|integer|exists:services,id',
            'spec_key' => 'required|string|max:255',
            'spec_value' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        ServiceSpecification::create($validated);

        return redirect()->route('admin.service_specifications.index')
            ->with('success', 'ServiceSpecification created successfully.');
    }

    public function show($id)
    {
        $item = ServiceSpecification::with('service')->findOrFail($id);
        return view('admin.service_specifications.show', compact('item'));
    }

    public function edit($id)
    {
        $item = ServiceSpecification::findOrFail($id);
        return view('admin.service_specifications.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ServiceSpecification::findOrFail($id);
        $validated = $request->validate([
            'service_id' => 'required|integer|exists:services,id',
            'spec_key' => 'required|string|max:255',
            'spec_value' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $item->update($validated);

        return redirect()->route('admin.service_specifications.index')
            ->with('success', 'ServiceSpecification updated successfully.');
    }

    public function destroy($id)
    {
        $item = ServiceSpecification::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.service_specifications.index')
            ->with('success', 'ServiceSpecification deleted successfully.');
    }
}
