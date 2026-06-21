<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function show(string $slug)
    {
        $service = Service::where('slug', $slug)
            ->where('status', true)
            ->with(['category', 'features', 'specifications', 'brochures', 'media'])
            ->firstOrFail();

        $related = Service::where('service_type', $service->service_type)
            ->where('id', '!=', $service->id)
            ->where('status', true)
            ->take(3)
            ->get();

        return view('frontend.services.show', compact('service', 'related'));
    }
}
