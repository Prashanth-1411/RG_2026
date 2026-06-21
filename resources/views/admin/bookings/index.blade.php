@extends('admin.layouts.master')

@section('title', 'Bookings')
@section('page-title', 'Bookings')

@section('content')
<div class="bg-white rounded-xl border border-gray-200">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
        <h3 class="text-sm font-bold text-gray-900">All Bookings</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Phone</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Service Type</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Booking Date</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="text-right px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($items as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-gray-900 font-medium">{{ $item->id }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $item->name }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $item->phone }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $item->service_type }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $item->booking_date ? $item->booking_date->format('d M Y') : 'N/A' }}</td>
                    <td class="px-6 py-4">
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
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{ $item->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.bookings.show', $item) }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-blue-50 text-blue-600 text-xs font-semibold hover:bg-blue-100 transition-colors">
                            <i class="ti ti-eye"></i> Show
                        </a>
                        <a href="{{ route('admin.bookings.edit', $item) }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-amber-50 text-amber-600 text-xs font-semibold hover:bg-amber-100 transition-colors">
                            <i class="ti ti-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.bookings.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-red-50 text-red-600 text-xs font-semibold hover:bg-red-100 transition-colors">
                                <i class="ti ti-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-6 py-12 text-center text-gray-400">No bookings found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
