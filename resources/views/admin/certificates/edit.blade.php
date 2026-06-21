@extends('admin.layouts.master')

@section('title', 'Edit Certificate')
@section('page-title', 'Edit Certificate')

@section('content')
<div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
    <form action="{{ route('admin.certificates.update', $item) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="space-y-5">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Title</label>
                <input type="text" name="title" value="{{ old('title', $item->title) }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('title') border-red-500 @enderror">
                @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Issuer</label>
                <input type="text" name="issuer" value="{{ old('issuer', $item->issuer) }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('issuer') border-red-500 @enderror">
                @error('issuer') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Date Issued</label>
                <input type="date" name="date_issued" value="{{ old('date_issued', $item->date_issued) }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('date_issued') border-red-500 @enderror">
                @error('date_issued') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Image</label>
                <input type="text" name="image" value="{{ old('image', $item->image) }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('image') border-red-500 @enderror">
                @error('image') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Type</label>
                <select name="type" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('type') border-red-500 @enderror">
                    <option value="">Select...</option>
                    @foreach(['certificate', 'award'] as $opt)
                    <option value="{{ $opt }}" {{ old('type', $item->type) == $opt ? 'selected' : '' }}>{{ ucfirst($opt) }}</option>
                    @endforeach
                </select>
                @error('type') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('sort_order') border-red-500 @enderror">
                @error('sort_order') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-2 pt-1">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" name="status" value="1" {{ old('status', $item->status) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                <label class="text-sm font-semibold text-gray-700">Status</label>
            </div>
        </div>

        <div class="flex items-center gap-3 pt-5 border-t border-gray-100 mt-6">
            <button type="submit" class="px-6 py-2.5 text-white text-sm font-semibold rounded-lg transition-colors" style="background: var(--theme-primary);"><i class="ti ti-device-floppy"></i> Update</button>
            <a href="{{ route('admin.certificates.index') }}" class="px-6 py-2.5 text-gray-700 text-sm font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
