@extends('admin.layouts.master')

@section('title', 'Create Navigation Item')
@section('page-title', 'Create Navigation Item')

@section('content')
<div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
    <form action="{{ route('admin.navigation_items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-5">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Label</label>
                <input type="text" name="label" value="{{ old('label') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('label') border-red-500 @enderror">
                @error('label') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Link</label>
                <input type="text" name="link" value="{{ old('link') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('link') border-red-500 @enderror">
                @error('link') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Parent ID</label>
                <input type="number" name="parent_id" value="{{ old('parent_id') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('parent_id') border-red-500 @enderror">
                @error('parent_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Location</label>
                <select name="location" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('location') border-red-500 @enderror">
                    <option value="">Select...</option>
                    @foreach(['header', 'footer'] as $opt)
                    <option value="{{ $opt }}" {{ old('location') == $opt ? 'selected' : '' }}>{{ ucfirst($opt) }}</option>
                    @endforeach
                </select>
                @error('location') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('sort_order') border-red-500 @enderror">
                @error('sort_order') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-2 pt-1">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" name="status" value="1" {{ old('status') ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                <label class="text-sm font-semibold text-gray-700">Status</label>
            </div>
        </div>

        <div class="flex items-center gap-3 pt-5 border-t border-gray-100 mt-6">
            <button type="submit" class="px-6 py-2.5 text-white text-sm font-semibold rounded-lg transition-colors" style="background: var(--theme-primary);"><i class="ti ti-device-floppy"></i> Create</button>
            <a href="{{ route('admin.navigation_items.index') }}" class="px-6 py-2.5 text-gray-700 text-sm font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
