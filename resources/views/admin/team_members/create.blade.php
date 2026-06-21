@extends('admin.layouts.master')
@section('title', 'Create Team Member')
@section('page-title', 'Create Team Member')
@section('content')
<div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
    <form action="{{ route('admin.team_members.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-5">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('name') border-red-500 @enderror">
                    @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Designation</label>
                    <input type="text" name="designation" value="{{ old('designation') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('designation') border-red-500 @enderror">
                    @error('designation') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('email') border-red-500 @enderror">
                    @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('phone') border-red-500 @enderror">
                    @error('phone') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Image</label>
                    <input type="file" name="image" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('image') border-red-500 @enderror">
                    @error('image') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order') }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('sort_order') border-red-500 @enderror">
                    @error('sort_order') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Status</label>
                    <div class="flex items-center gap-2 pt-1">
                        <input type="hidden" name="status" value="0">
                        <input type="checkbox" name="status" value="1" {{ old('status', true) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-sm text-gray-700">Active</span>
                    </div>
                    @error('status') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Bio</label>
                <textarea name="bio" rows="6" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('bio') border-red-500 @enderror">{{ old('bio') }}</textarea>
                @error('bio') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="flex items-center gap-3 pt-5 border-t border-gray-100 mt-6">
            <button type="submit" class="px-6 py-2.5 text-white text-sm font-semibold rounded-lg transition-colors" style="background: var(--theme-primary);">Create</button>
            <a href="{{ route('admin.team_members.index') }}" class="px-6 py-2.5 text-gray-700 text-sm font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection