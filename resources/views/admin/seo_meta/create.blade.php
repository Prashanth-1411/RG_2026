@extends('admin.layouts.master')

@section('title', 'Create SEO Meta')
@section('page-title', 'Create SEO Meta')

@section('content')
<div class="max-w-3xl mx-auto">
    <form method="POST" action="{{ route('admin.seo_meta.store') }}" class="space-y-6">
        @csrf

        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <h3 class="text-sm font-bold text-gray-900 mb-4">SEO Meta Details</h3>
            <div class="space-y-4">
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Page Name</label>
                    <input type="text" name="page_name" value="{{ old('page_name') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Meta Description</label>
                    <textarea name="meta_description" rows="4" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">{{ old('meta_description') }}</textarea>
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">{{ old('meta_keywords') }}</textarea>
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">OG Title</label>
                    <input type="text" name="og_title" value="{{ old('og_title') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">OG Description</label>
                    <textarea name="og_description" rows="4" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">{{ old('og_description') }}</textarea>
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">OG Image URL</label>
                    <input type="text" name="og_image" value="{{ old('og_image') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Structured Data (JSON-LD)</label>
                    <textarea name="structured_data" rows="8" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500 font-mono">{{ old('structured_data') }}</textarea>
                </div>
                <div>
                    <label class="text-xs font-semibold text-gray-600 mb-1 block">Canonical URL</label>
                    <input type="text" name="canonical_url" value="{{ old('canonical_url') }}" class="w-full rounded-lg border-gray-300 text-sm px-4 py-2.5 focus:border-blue-500 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 text-white rounded-lg text-sm font-bold transition-colors" style="background: var(--theme-primary);">
                <i class="ti ti-device-floppy me-2"></i>Create SEO Meta
            </button>
        </div>
    </form>
</div>
@endsection
