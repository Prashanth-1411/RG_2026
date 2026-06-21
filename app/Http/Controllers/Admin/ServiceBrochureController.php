<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceBrochure;
use Illuminate\Http\Request;

class ServiceBrochureController extends Controller
{
    public function index()
    {
        $items = ServiceBrochure::with('service')->latest()->paginate(10);
        $columns = ['service_id' => 'Service', 'brochure_name' => 'Brochure Name'];
        return view('admin.service_brochures.index', compact('items', 'columns'));
    }

    public function create()
    {
        return view('admin.service_brochures.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|integer|exists:services,id',
            'brochure_file' => 'required|string|max:255',
            'brochure_name' => 'nullable|string|max:255',
        ]);

        ServiceBrochure::create($validated);

        return redirect()->route('admin.service_brochures.index')
            ->with('success', 'ServiceBrochure created successfully.');
    }

    public function show($id)
    {
        $item = ServiceBrochure::with('service')->findOrFail($id);
        return view('admin.service_brochures.show', compact('item'));
    }

    public function edit($id)
    {
        $item = ServiceBrochure::findOrFail($id);
        return view('admin.service_brochures.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = ServiceBrochure::findOrFail($id);
        $validated = $request->validate([
            'service_id' => 'required|integer|exists:services,id',
            'brochure_file' => 'required|string|max:255',
            'brochure_name' => 'nullable|string|max:255',
        ]);

        $item->update($validated);

        return redirect()->route('admin.service_brochures.index')
            ->with('success', 'ServiceBrochure updated successfully.');
    }

    public function destroy($id)
    {
        $item = ServiceBrochure::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.service_brochures.index')
            ->with('success', 'ServiceBrochure deleted successfully.');
    }
}
