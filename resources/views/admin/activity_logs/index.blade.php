@extends('admin.layouts.master')

@section('title', 'Activity Logs')
@section('page-title', 'Activity Logs')

@section('content')
<div class="bg-white rounded-xl border border-gray-200">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
        <h3 class="text-sm font-bold text-gray-900">All Activity Logs</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">User</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Module</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">IP</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="text-right px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($items as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-gray-900 font-medium">{{ $item->id }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $item->user->name ?? 'System' }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">{{ $item->action }}</span>
                    </td>
                    <td class="px-6 py-4 text-gray-700">{{ $item->module }}</td>
                    <td class="px-6 py-4 text-gray-700 max-w-xs truncate">{{ $item->description }}</td>
                    <td class="px-6 py-4 text-gray-500 font-mono text-xs">{{ $item->ip_address ?? 'N/A' }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $item->created_at->format('d M Y, h:i A') }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.activity_logs.show', $item) }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-blue-50 text-blue-600 text-xs font-semibold hover:bg-blue-100 transition-colors">
                            <i class="ti ti-eye"></i> Show
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-6 py-12 text-center text-gray-400">No activity logs found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
