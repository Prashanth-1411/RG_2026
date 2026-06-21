<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Service;

class FuneralServicesController extends Controller
{
    public function index()
    {
        $settings = Setting::find(1);
        $services = Service::where('status', true)
            ->where('service_type', 'funeral')
            ->with('features')
            ->orderBy('sort_order')
            ->get();
        return view('frontend.fleet', compact('settings', 'services'));
    }
}
