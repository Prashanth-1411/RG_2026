@extends('admin.layouts.master')

@section('title', 'Booking Detail')
@section('page-title', 'Booking #' . $item->id)

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</label>
                <p class="text-sm text-gray-900 font-medium mt-1">#{{ $item->id }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</label>
                <p class="mt-1">
                    @if($item->status === 'pending')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">Pending</span>
                    @elseif($item->status === 'confirmed')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-700">Confirmed</span>
                    @elseif($item->status === 'completed')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">Completed</span>
                    @elseif($item->status === 'cancelled')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-700">Cancelled</span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">{{ $item->status }}</span>
                    @endif
                </p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</label>
                <p class="text-sm text-gray-900 font-medium mt-1">{{ $item->name }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Phone</label>
                <p class="text-sm text-gray-900 mt-1">{{ $item->phone }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Service Type</label>
                <p class="text-sm text-gray-900 mt-1">{{ $item->service_type }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Booking Type</label>
                <p class="text-sm text-gray-900 mt-1">{{ $item->booking_type ?? 'N/A' }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Service Name</label>
                <p class="text-sm text-gray-900 mt-1">{{ $item->service_name ?? 'N/A' }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Booking Date</label>
                <p class="text-sm text-gray-900 mt-1">{{ $item->booking_date ? $item->booking_date->format('d M Y') : 'N/A' }}</p>
            </div>
            <div class="sm:col-span-2">
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Pickup Location</label>
                <p class="text-sm text-gray-900 mt-1">{{ $item->pickup ?? 'N/A' }}</p>
            </div>
            <div class="sm:col-span-2">
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Destination</label>
                <p class="text-sm text-gray-900 mt-1">{{ $item->destination ?? 'N/A' }}</p>
            </div>
            <div class="sm:col-span-2">
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Notes</label>
                <p class="text-sm text-gray-900 mt-1 whitespace-pre-wrap">{{ $item->notes ?? 'N/A' }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Created At</label>
                <p class="text-sm text-gray-900 mt-1">{{ $item->created_at->format('d M Y, h:i A') }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Updated At</label>
                <p class="text-sm text-gray-900 mt-1">{{ $item->updated_at->format('d M Y, h:i A') }}</p>
            </div>
        </div>
    </div>

    <div class="mt-6 flex justify-start">
        <a href="{{ route('admin.bookings.index') }}" class="px-6 py-3 rounded-lg text-sm font-bold border border-gray-300 text-gray-600 hover:bg-gray-50 transition-colors">
            <i class="ti ti-arrow-left me-2"></i>Back to Bookings
        </a>
    </div>
</div>
@endsection
