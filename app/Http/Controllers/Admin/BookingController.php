<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $items = Booking::latest()->paginate(10);
        return view('admin.bookings.index', compact('items'));
    }

    public function show($id)
    {
        $item = Booking::findOrFail($id);
        return view('admin.bookings.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Booking::findOrFail($id);
        return view('admin.bookings.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Booking::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'pickup' => 'nullable|string|max:255',
            'destination' => 'nullable|string|max:255',
            'service_type' => 'nullable|string|max:255',
            'booking_type' => 'nullable|string|max:255',
            'service_name' => 'nullable|string|max:255',
            'booking_date' => 'nullable|date',
            'notes' => 'nullable|string',
            'status' => 'nullable|string|max:50',
        ]);

        $item->update($validated);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking updated successfully.');
    }

    public function destroy($id)
    {
        $item = Booking::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }
}
