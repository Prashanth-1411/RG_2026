<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::latest()->paginate(10);
        return view('admin.team_members.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team_members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        TeamMember::create($validated);

        return redirect()->route('admin.team_members.index')
            ->with('success', 'TeamMember created successfully.');
    }

    public function show($id)
    {
        $item = TeamMember::findOrFail($id);
        return view('admin.team_members.show', compact('item'));
    }

    public function edit($id)
    {
        $item = TeamMember::findOrFail($id);
        return view('admin.team_members.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = TeamMember::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        $item->update($validated);

        return redirect()->route('admin.team_members.index')
            ->with('success', 'TeamMember updated successfully.');
    }

    public function destroy($id)
    {
        $item = TeamMember::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.team_members.index')
            ->with('success', 'TeamMember deleted successfully.');
    }
}
