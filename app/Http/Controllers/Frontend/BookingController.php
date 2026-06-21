<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Setting;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $settings = Setting::find(1);
        return view('frontend.booking', compact('settings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'pickup' => 'required|string',
            'destination' => 'required|string',
            'service_type' => 'nullable|string|max:255',
            'booking_type' => 'nullable|string|max:255',
            'booking_date' => 'nullable|date',
            'notes' => 'nullable|string',
        ]);

        $validated['status'] = 'pending';
        $validated['ip_address'] = $request->ip();
        Booking::create($validated);

        return redirect()->route('frontend.booking')->with('success', 'Booking request submitted successfully. We will contact you shortly.');
    }
}
