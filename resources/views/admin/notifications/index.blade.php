@extends('admin.layouts.master')

@section('title', 'Notifications')
@section('page-title', 'Notifications')

@section('content')
<div class="bg-white rounded-xl border border-gray-200">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
        <h3 class="text-sm font-bold text-gray-900">All Notifications</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Message</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Type</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Read Status</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="text-right px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($items as $item)
                <tr class="hover:bg-gray-50 transition-colors {{ !$item->is_read ? 'bg-blue-50/50' : '' }}">
                    <td class="px-6 py-4 {{ !$item->is_read ? 'text-gray-900 font-bold' : 'text-gray-700' }}">{{ $item->title }}</td>
                    <td class="px-6 py-4 {{ !$item->is_read ? 'text-gray-900 font-semibold' : 'text-gray-700' }} max-w-xs truncate">{{ $item->message }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                            @if($item->type === 'info') bg-blue-100 text-blue-700
                            @elseif($item->type === 'success') bg-green-100 text-green-700
                            @elseif($item->type === 'warning') bg-yellow-100 text-yellow-700
                            @elseif($item->type === 'error') bg-red-100 text-red-700
                            @else bg-gray-100 text-gray-600 @endif">
                            {{ $item->type ?? 'info' }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        @if($item->is_read)
                            <span class="inline-flex items-center gap-1 text-xs font-semibold text-gray-500">
                                <i class="ti ti-circle-check"></i> Read
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 text-xs font-semibold text-blue-600">
                                <i class="ti ti-circle"></i> Unread
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{ $item->created_at->format('d M Y, h:i A') }}</td>
                    <td class="px-6 py-4 text-right">
                        @if(!$item->is_read)
                        <form action="{{ route('admin.notifications.markAsRead', $item) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-blue-50 text-blue-600 text-xs font-semibold hover:bg-blue-100 transition-colors">
                                <i class="ti ti-check"></i> Mark as Read
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-400">No notifications found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
