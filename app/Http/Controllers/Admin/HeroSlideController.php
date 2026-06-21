<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\Request;

class HeroSlideController extends Controller
{
    public function index()
    {
        $heroSlides = HeroSlide::latest()->paginate(10);
        return view('admin.hero_slides.index', compact('heroSlides'));
    }

    public function create()
    {
        return view('admin.hero_slides.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'badge_text' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'video' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'button_text_2' => 'nullable|string|max:255',
            'button_link_2' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        HeroSlide::create($validated);

        return redirect()->route('admin.hero_slides.index')
            ->with('success', 'HeroSlide created successfully.');
    }

    public function show($id)
    {
        $item = HeroSlide::findOrFail($id);
        return view('admin.hero_slides.show', compact('item'));
    }

    public function edit($id)
    {
        $item = HeroSlide::findOrFail($id);
        return view('admin.hero_slides.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = HeroSlide::findOrFail($id);
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'badge_text' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'video' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'button_text_2' => 'nullable|string|max:255',
            'button_link_2' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'status' => 'boolean',
        ]);

        $item->update($validated);

        return redirect()->route('admin.hero_slides.index')
            ->with('success', 'HeroSlide updated successfully.');
    }

    public function destroy($id)
    {
        $item = HeroSlide::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.hero_slides.index')
            ->with('success', 'HeroSlide deleted successfully.');
    }
}
