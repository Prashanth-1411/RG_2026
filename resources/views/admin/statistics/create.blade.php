@extends('admin.layouts.master')

@section('title', 'Create Statistic')
@section('page-title', 'Create Statistic')

@section('content')
<div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <form action="{{ route('admin.statistics.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-5">
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Label</label>
                <input type="text" name="label" value="{{ old('label') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('label') border-red-500 @enderror">
                @error('label') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Value</label>
                <input type="number" name="value" value="{{ old('value') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('value') border-red-500 @enderror">
                @error('value') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Suffix</label>
                <input type="text" name="suffix" value="{{ old('suffix') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('suffix') border-red-500 @enderror">
                @error('suffix') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Icon</label>
                <input type="text" name="icon" value="{{ old('icon') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('icon') border-red-500 @enderror">
                @error('icon') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
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
                <button type="submit" class="px-6 py-2.5 text-white text-sm font-semibold rounded-lg transition-colors" style="background: var(--theme-primary);">Create</button>
                <a href="{{ route('admin.statistics.index') }}" class="px-6 py-2.5 text-gray-700 text-sm font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">Cancel</a>
            </div>
        </form>
</div>
@endsection
