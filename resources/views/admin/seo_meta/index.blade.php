@extends('admin.layouts.master')

@section('title', 'SEO Meta')
@section('page-title', 'SEO Meta')

@section('content')
<div class="bg-white rounded-xl border border-gray-200">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
        <h3 class="text-sm font-bold text-gray-900">All SEO Entries</h3>
        <a href="{{ route('admin.seo_meta.create') }}" class="px-4 py-2 text-white rounded-lg text-sm font-semibold transition-colors" style="background: var(--theme-primary);">
            <i class="ti ti-plus"></i> Add New
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Page Name</th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Meta Title</th>
                    <th class="text-right px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($items as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-gray-900 font-medium">{{ $item->id }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $item->page_name }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ Str::limit($item->meta_title, 60) }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.seo_meta.edit', $item) }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-amber-50 text-amber-600 text-xs font-semibold hover:bg-amber-100 transition-colors">
                            <i class="ti ti-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.seo_meta.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
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
                    <td colspan="4" class="px-6 py-12 text-center text-gray-400">No SEO meta entries found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
