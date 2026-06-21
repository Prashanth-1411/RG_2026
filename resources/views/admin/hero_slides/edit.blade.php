@extends('admin.layouts.master')
@section('title', 'Edit Hero Slide')
@section('page-title', 'Edit Hero Slide')
@section('content')
<div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
    <form action="{{ route('admin.hero_slides.update', $heroSlide) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="space-y-5">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Title</label>
                    <input type="text" name="title" value="{{ old('title', $heroSlide->title ?? '') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('title') border-red-500 @enderror">
                    @error('title') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Badge Text</label>
                    <input type="text" name="badge_text" value="{{ old('badge_text', $heroSlide->badge_text ?? '') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('badge_text') border-red-500 @enderror">
                    @error('badge_text') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Button Text</label>
                    <input type="text" name="button_text" value="{{ old('button_text', $heroSlide->button_text ?? '') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('button_text') border-red-500 @enderror">
                    @error('button_text') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Button Link</label>
                    <input type="text" name="button_link" value="{{ old('button_link', $heroSlide->button_link ?? '') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('button_link') border-red-500 @enderror">
                    @error('button_link') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Button Text 2</label>
                    <input type="text" name="button_text_2" value="{{ old('button_text_2', $heroSlide->button_text_2 ?? '') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('button_text_2') border-red-500 @enderror">
                    @error('button_text_2') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Button Link 2</label>
                    <input type="text" name="button_link_2" value="{{ old('button_link_2', $heroSlide->button_link_2 ?? '') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('button_link_2') border-red-500 @enderror">
                    @error('button_link_2') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $heroSlide->sort_order ?? '') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('sort_order') border-red-500 @enderror">
                    @error('sort_order') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Image</label>
                    <input type="file" name="image" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('image') border-red-500 @enderror">
                    @error('image') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                    @if($heroSlide->image) <p class="text-xs text-gray-500 mt-1">Current: {{ $heroSlide->image }}</p> @endif
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Video</label>
                    <input type="text" name="video" value="{{ old('video', $heroSlide->video ?? '') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('video') border-red-500 @enderror">
                    @error('video') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Status</label>
                    <div class="flex items-center gap-2 pt-1">
                        <input type="hidden" name="status" value="0">
                        <input type="checkbox" name="status" value="1" {{ old('status', $heroSlide->status ?? false) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-sm text-gray-700">Active</span>
                    </div>
                    @error('status') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Subtitle</label>
                <textarea name="subtitle" rows="4" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('subtitle') border-red-500 @enderror">{{ old('subtitle', $heroSlide->subtitle ?? '') }}</textarea>
                @error('subtitle') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="flex items-center gap-3 pt-5 border-t border-gray-100 mt-6">
            <button type="submit" class="px-6 py-2.5 text-white text-sm font-semibold rounded-lg transition-colors" style="background: var(--theme-primary);">Update</button>
            <a href="{{ route('admin.hero_slides.index') }}" class="px-6 py-2.5 text-gray-700 text-sm font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection