<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        return view('frontend.faq.index', [
            'faqs' => Faq::where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }
}
