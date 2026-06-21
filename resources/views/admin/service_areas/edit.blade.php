@extends('admin.layouts.master')

@section('title', 'Edit Service Area')
@section('page-title', 'Edit Service Area')

@section('content')
<div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <form action="{{ route('admin.service_areas.update', $item) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="space-y-5">
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Name</label>
                <input type="text" name="name" value="{{ old('name', $item->name) }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('name') border-red-500 @enderror">
                @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $item->slug) }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('slug') border-red-500 @enderror">
                @error('slug') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Region</label>
                <input type="text" name="region" value="{{ old('region', $item->region) }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('region') border-red-500 @enderror">
                @error('region') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('sort_order') border-red-500 @enderror">
                @error('sort_order') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-2 pt-1">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                <label class="text-sm font-semibold text-gray-700">Active</label>
            </div>
            </div>

            <div class="flex items-center gap-3 pt-5 border-t border-gray-100 mt-6">
                <button type="submit" class="px-6 py-2.5 text-white text-sm font-semibold rounded-lg transition-colors" style="background: var(--theme-primary);">Update</button>
                <a href="{{ route('admin.service_areas.index') }}" class="px-6 py-2.5 text-gray-700 text-sm font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">Cancel</a>
            </div>
        </form>
</div>
@endsection
