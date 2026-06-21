@extends('admin.layouts.master')

@section('title', 'Create Service Feature')
@section('page-title', 'Create Service Feature')

@section('content')
<div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <form action="{{ route('admin.service_features.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-5">
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Service</label>
                <select name="service_id" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('service_id') border-red-500 @enderror">
                    <option value="">Select...</option>
                    @foreach($services as $val => $opt)
                    <option value="{{ $val }}" {{ old('service_id') == $val ? 'selected' : '' }}>{{ $opt }}</option>
                    @endforeach
                </select>
                @error('service_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Feature</label>
                <input type="text" name="feature" value="{{ old('feature') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('feature') border-red-500 @enderror">
                @error('feature') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('sort_order') border-red-500 @enderror">
                @error('sort_order') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
            </div>

            <div class="flex items-center gap-3 pt-5 border-t border-gray-100 mt-6">
                <button type="submit" class="px-6 py-2.5 text-white text-sm font-semibold rounded-lg transition-colors" style="background: var(--theme-primary);">Create</button>
                <a href="{{ route('admin.service_features.index') }}" class="px-6 py-2.5 text-gray-700 text-sm font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">Cancel</a>
            </div>
        </form>
</div>
@endsection
