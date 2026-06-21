<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Mortuary;

class MortuaryController extends Controller
{
    public function index()
    {
        return view('frontend.mortuary.index', [
            'mortuaries' => Mortuary::orderBy('sort_order')->get(),
        ]);
    }
}
