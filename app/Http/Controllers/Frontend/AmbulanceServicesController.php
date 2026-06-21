<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class AmbulanceServicesController extends Controller
{
    public function index()
    {
        return view('frontend.services.index', [
            'services' => Service::where('status', true)
                ->with(['features', 'media'])
                ->orderBy('sort_order')
                ->get(),
        ]);
    }
}
