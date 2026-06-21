<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyTimeline;
use Illuminate\Http\Request;

class CompanyTimelineController extends Controller
{
    public function index()
    {
        $items = CompanyTimeline::latest()->paginate(10);
        $columns = ['year' => 'Year', 'title' => 'Title', 'status' => 'Status'];
        return view('admin.company_timeline.index', compact('items', 'columns'));
    }

    public function create()
    {
        return view('admin.company_timeline.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|string|max:20',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        CompanyTimeline::create($validated);

        return redirect()->route('admin.company_timeline.index')
            ->with('success', 'CompanyTimeline created successfully.');
    }

    public function show($id)
    {
        $item = CompanyTimeline::findOrFail($id);
        return view('admin.company_timeline.show', compact('item'));
    }

    public function edit($id)
    {
        $item = CompanyTimeline::findOrFail($id);
        return view('admin.company_timeline.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = CompanyTimeline::findOrFail($id);
        $validated = $request->validate([
            'year' => 'required|string|max:20',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        $item->update($validated);

        return redirect()->route('admin.company_timeline.index')
            ->with('success', 'CompanyTimeline updated successfully.');
    }

    public function destroy($id)
    {
        $item = CompanyTimeline::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.company_timeline.index')
            ->with('success', 'CompanyTimeline deleted successfully.');
    }
}
