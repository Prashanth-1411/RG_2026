<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $items = Statistic::latest()->paginate(10);
        $columns = ['label' => 'Label', 'value' => 'Value', 'status' => 'Status'];
        return view('admin.statistics.index', compact('items', 'columns'));
    }

    public function create()
    {
        return view('admin.statistics.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|integer',
            'suffix' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        Statistic::create($validated);

        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistic created successfully.');
    }

    public function show($id)
    {
        $item = Statistic::findOrFail($id);
        return view('admin.statistics.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Statistic::findOrFail($id);
        return view('admin.statistics.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Statistic::findOrFail($id);
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|integer',
            'suffix' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        $item->update($validated);

        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistic updated successfully.');
    }

    public function destroy($id)
    {
        $item = Statistic::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.statistics.index')
            ->with('success', 'Statistic deleted successfully.');
    }
}
