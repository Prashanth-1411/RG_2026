<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $items = Certificate::latest()->paginate(10);
        $columns = ['title' => 'Title', 'issuer' => 'Issuer', 'type' => 'Type', 'status' => 'Status'];
        return view('admin.certificates.index', compact('items', 'columns'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'nullable|string|max:255',
            'date_issued' => 'nullable|date',
            'image' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        Certificate::create($validated);

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate created successfully.');
    }

    public function show($id)
    {
        $item = Certificate::findOrFail($id);
        return view('admin.certificates.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Certificate::findOrFail($id);
        return view('admin.certificates.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Certificate::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'nullable|string|max:255',
            'date_issued' => 'nullable|date',
            'image' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        $item->update($validated);

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate updated successfully.');
    }

    public function destroy($id)
    {
        $item = Certificate::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate deleted successfully.');
    }
}
