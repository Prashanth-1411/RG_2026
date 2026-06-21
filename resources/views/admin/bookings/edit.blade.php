@extends('admin.layouts.master')

@section('title', 'Edit Booking')
@section('page-title', 'Edit Booking #' . $item->id)

@section('content')
<div class="max-w-3xl mx-auto">
    <form method="POST" action="{{ route('admin.bookings.update', $item) }}" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <h3 class="text-sm font-bold text-gray-900 mb-4">Booking Details</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Name</label>
                    <input type="text" name="name" value="{{ old('name', $item->name) }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $item->phone) }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="sm:col-span-2">
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Pickup Location</label>
                    <input type="text" name="pickup" value="{{ old('pickup', $item->pickup) }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="sm:col-span-2">
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Destination</label>
                    <input type="text" name="destination" value="{{ old('destination', $item->destination) }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Service Type</label>
                    <input type="text" name="service_type" value="{{ old('service_type', $item->service_type) }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Booking Type</label>
                    <input type="text" name="booking_type" value="{{ old('booking_type', $item->booking_type) }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Service Name</label>
                    <input type="text" name="service_name" value="{{ old('service_name', $item->service_name) }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Booking Date</label>
                    <input type="date" name="booking_date" value="{{ old('booking_date', $item->booking_date ? $item->booking_date->format('Y-m-d') : '') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="sm:col-span-2">
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Notes</label>
                    <textarea name="notes" rows="4" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">{{ old('notes', $item->notes) }}</textarea>
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Status</label>
                    <select name="status" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                        <option value="pending" {{ old('status', $item->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ old('status', $item->status) === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="completed" {{ old('status', $item->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ old('status', $item->status) === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.bookings.index') }}" class="px-6 py-3 rounded-lg text-sm font-bold border border-gray-300 text-gray-600 hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-6 py-3 text-white rounded-lg text-sm font-bold transition-colors" style="background: var(--theme-primary);">
                <i class="ti ti-device-floppy me-2"></i>Update Booking
            </button>
        </div>
    </form>
</div>
@endsection
