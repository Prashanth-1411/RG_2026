@extends('admin.layouts.master')

@section('title', 'Create Blog Category')
@section('page-title', 'Create Blog Category')

@section('content')
<div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
    <form action="{{ route('admin.blog_categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-5">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('name') border-red-500 @enderror">
                @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Slug</label>
                <input type="text" name="slug" value="{{ old('slug') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('slug') border-red-500 @enderror">
                @error('slug') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-2 pt-1">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" name="status" value="1" {{ old('status') ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                <label class="text-sm font-semibold text-gray-700">Status</label>
            </div>
        </div>

        <div class="flex items-center gap-3 pt-5 border-t border-gray-100 mt-6">
            <button type="submit" class="px-6 py-2.5 text-white text-sm font-semibold rounded-lg transition-colors" style="background: var(--theme-primary);"><i class="ti ti-device-floppy"></i> Create</button>
            <a href="{{ route('admin.blog_categories.index') }}" class="px-6 py-2.5 text-gray-700 text-sm font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
