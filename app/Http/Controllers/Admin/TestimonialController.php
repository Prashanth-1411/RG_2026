<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'content' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'image' => 'nullable|string|max:255',
            'verification_url' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'is_approved' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function show($id)
    {
        $item = Testimonial::findOrFail($id);
        return view('admin.testimonials.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Testimonial::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'content' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'image' => 'nullable|string|max:255',
            'verification_url' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'is_approved' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $item->update($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy($id)
    {
        $item = Testimonial::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}
