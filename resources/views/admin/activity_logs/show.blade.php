@extends('admin.layouts.master')

@section('title', 'Activity Log Detail')
@section('page-title', 'Activity Log #' . $item->id)

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</label>
                <p class="text-sm text-gray-900 font-medium mt-1">#{{ $item->id }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">User</label>
                <p class="text-sm text-gray-900 mt-1">{{ $item->user->name ?? 'System' }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</label>
                <p class="text-sm text-gray-900 mt-1">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">{{ $item->action }}</span>
                </p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Module</label>
                <p class="text-sm text-gray-900 mt-1">{{ $item->module }}</p>
            </div>
            <div class="sm:col-span-2">
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Description</label>
                <p class="text-sm text-gray-900 mt-1">{{ $item->description }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">IP Address</label>
                <p class="text-sm text-gray-900 mt-1 font-mono">{{ $item->ip_address ?? 'N/A' }}</p>
            </div>
            <div>
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wider">User Agent</label>
                <p class="text-sm text-gray-900 mt-1 break-all">{{ $item->user_agent ?? 'N/A' }}</p>
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
        <a href="{{ route('admin.activity_logs.index') }}" class="px-6 py-3 rounded-lg text-sm font-bold border border-gray-300 text-gray-600 hover:bg-gray-50 transition-colors">
            <i class="ti ti-arrow-left me-2"></i>Back to Activity Logs
        </a>
    </div>
</div>
@endsection
