@extends('admin.layouts.master')

@section('title', 'Contact Inquiries')
@section('page-title', 'Contact Inquiries')

@section('content')
<div class="bg-white rounded-xl border border-gray-200">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
        <h3 class="text-sm font-bold text-gray-900">All Inquiries</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Subject</th>
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
                    <td class="px-6 py-4 text-gray-700">{{ $item->email }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ Str::limit($item->subject, 40) }}</td>
                    <td class="px-6 py-4">
                        @if($item->status === 'unread')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-700">Unread</span>
                        @elseif($item->status === 'read')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">Read</span>
                        @elseif($item->status === 'replied')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-700">Replied</span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">{{ $item->status }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{ $item->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.contact_inquiries.show', $item) }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-blue-50 text-blue-600 text-xs font-semibold hover:bg-blue-100 transition-colors">
                            <i class="ti ti-eye"></i> Show
                        </a>
                        <form action="{{ route('admin.contact_inquiries.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
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
                    <td colspan="7" class="px-6 py-12 text-center text-gray-400">No inquiries found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
