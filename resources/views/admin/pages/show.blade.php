@extends('admin.layouts.master')
@section('title', 'View Page')
@section('page-title', 'View Page')
@section('content')
<div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
    <dl class="divide-y divide-gray-100">
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">ID</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $page->id }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Page Name</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $page->page_name }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Heading</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $page->heading }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Subheading</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $page->subheading }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Content</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{!! nl2br(e($page->content)) !!}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Hero Image</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $page->hero_image ?? 'N/A' }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Hero Video</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $page->hero_video ?? 'N/A' }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Status</dt>
            <dd class="text-sm sm:col-span-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $page->status ? 'bg-emerald-50 text-emerald-700' : 'bg-gray-100 text-gray-500' }}">
                    {{ $page->status ? 'Active' : 'Inactive' }}
                </span>
            </dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Created At</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $page->created_at->format('d M Y, h:i A') }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Updated At</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $page->updated_at->format('d M Y, h:i A') }}</dd>
        </div>
    </dl>
    <div class="flex items-center gap-3 pt-5 border-t border-gray-100 mt-6">
        <a href="{{ route('admin.pages.edit', $page) }}" class="px-6 py-2.5 text-white text-sm font-semibold rounded-lg transition-colors" style="background: var(--theme-primary);">Edit</a>
        <a href="{{ route('admin.pages.index') }}" class="px-6 py-2.5 text-gray-700 text-sm font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">Back to List</a>
        <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="ml-auto">
            @csrf @method('DELETE')
            <button type="submit" class="px-6 py-2.5 text-red-600 text-sm font-semibold rounded-lg border border-red-200 hover:bg-red-50 transition-colors">Delete</button>
        </form>
    </div>
</div>
@endsection