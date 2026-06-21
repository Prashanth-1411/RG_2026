@extends('admin.layouts.master')

@section('title', 'Inquiry Detail')
@section('page-title', 'Inquiry #' . $item->id)

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
                    @if($item->status === 'unread')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-700">Unread</span>
                    @elseif($item->status === 'read')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">Read</span>
                    @elseif($item->status === 'replied')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-700">Replied</span>
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
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</label>
                <p class="text-sm text-gray-900 mt-1">{{ $item->email }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Phone</label>
                <p class="text-sm text-gray-900 mt-1">{{ $item->phone ?? 'N/A' }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Subject</label>
                <p class="text-sm text-gray-900 mt-1">{{ $item->subject }}</p>
            </div>
            <div class="sm:col-span-2">
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Message</label>
                <p class="text-sm text-gray-900 mt-1 whitespace-pre-wrap">{{ $item->message ?? 'N/A' }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</label>
                <p class="text-sm text-gray-900 mt-1">{{ $item->created_at->format('d M Y, h:i A') }}</p>
            </div>
        </div>
    </div>

    <div class="mt-6 flex justify-start">
        <a href="{{ route('admin.contact_inquiries.index') }}" class="px-6 py-3 rounded-lg text-sm font-bold border border-gray-300 text-gray-600 hover:bg-gray-50 transition-colors">
            <i class="ti ti-arrow-left me-2"></i>Back to Inquiries
        </a>
    </div>
</div>
@endsection
