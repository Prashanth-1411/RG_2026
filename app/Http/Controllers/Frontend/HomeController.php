<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FeaturedSection;
use App\Models\FleetCategory;
use App\Models\HeroSlide;
use App\Models\Mortuary;
use App\Models\Service;
use App\Models\ServiceArea;
use App\Models\Statistic;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home', [
            'heroSlides' => HeroSlide::where('status', true)->orderBy('sort_order')->get(),
            'statistics' => Statistic::where('status', true)->orderBy('sort_order')->get(),
            'features' => FeaturedSection::where('status', true)->orderBy('sort_order')->get(),
            'ambulanceServices' => Service::where('status', true)->orderBy('sort_order')->get(),
            'fleets' => FleetCategory::where('status', true)->orderBy('sort_order')->take(4)->get(),
            'testimonials' => Testimonial::where('is_approved', true)->orderBy('sort_order')->take(6)->get(),
            'mortuaries' => Mortuary::orderBy('sort_order')->take(4)->get(),
            'faqs' => Faq::where('is_active', true)->orderBy('sort_order')->take(6)->get(),
            'serviceAreas' => ServiceArea::where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }
}
