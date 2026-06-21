<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\EquipmentRental;
use App\Models\Fleet;
use App\Models\FleetCategory;
use App\Models\Mortuary;

class FleetController extends Controller
{
    public function index()
    {
        return view('frontend.fleet.index', [
            'categories' => FleetCategory::where('status', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function show(string $slug)
    {
        $category = FleetCategory::where('slug', $slug)->where('status', true)->first();

        if ($category) {
            return $this->categoryShow($category);
        }

        $fleet = Fleet::where('slug', $slug)->firstOrFail();

        return view('frontend.fleet.show', compact('fleet'));
    }

    protected function categoryShow(FleetCategory $category)
    {
        $items = match ($category->slug === 'equipment-rental' ? 'equipment-rental' : $category->type) {
            'mortuary' => Mortuary::orderBy('sort_order')->get(),
            'equipment-rental' => EquipmentRental::orderBy('sort_order')->get(),
            default => $category->fleets()->where('is_available', true)->get(),
        };

        return view('frontend.fleet.category', compact('category', 'items'));
    }
}
