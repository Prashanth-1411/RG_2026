<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\CompanyTimeline;
use App\Models\Statistic;
use App\Models\TeamMember;

class AboutController extends Controller
{
    public function index()
    {
        return view('frontend.about', [
            'team' => TeamMember::where('status', true)->orderBy('sort_order')->get(),
            'certificates' => Certificate::where('status', true)->orderBy('sort_order')->get(),
            'timeline' => CompanyTimeline::where('status', true)->orderBy('sort_order')->get(),
            'statistics' => Statistic::where('status', true)->orderBy('sort_order')->get(),
        ]);
    }
}
