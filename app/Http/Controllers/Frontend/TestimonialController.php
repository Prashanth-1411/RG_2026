<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('frontend.testimonials', [
            'testimonials' => Testimonial::where('is_approved', true)->orderBy('sort_order')->get(),
        ]);
    }
}
