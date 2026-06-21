<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SisterConcern;
use Illuminate\Http\Request;

class SisterConcernController extends Controller
{
    public function index()
    {
        $items = SisterConcern::latest()->paginate(10);
        $columns = ['company_name' => 'Company Name', 'description' => 'Description', 'status' => 'Status'];
        return view('admin.sister_concerns.index', compact('items', 'columns'));
    }

    public function create()
    {
        return view('admin.sister_concerns.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'logo' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'website_link' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:50',
            'contact_email' => 'nullable|email|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        SisterConcern::create($validated);

        return redirect()->route('admin.sister_concerns.index')
            ->with('success', 'SisterConcern created successfully.');
    }

    public function show($id)
    {
        $item = SisterConcern::findOrFail($id);
        return view('admin.sister_concerns.show', compact('item'));
    }

    public function edit($id)
    {
        $item = SisterConcern::findOrFail($id);
        return view('admin.sister_concerns.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = SisterConcern::findOrFail($id);
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'logo' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'website_link' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:50',
            'contact_email' => 'nullable|email|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        $item->update($validated);

        return redirect()->route('admin.sister_concerns.index')
            ->with('success', 'SisterConcern updated successfully.');
    }

    public function destroy($id)
    {
        $item = SisterConcern::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.sister_concerns.index')
            ->with('success', 'SisterConcern deleted successfully.');
    }
}
