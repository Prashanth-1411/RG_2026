@extends('admin.layouts.master')

@section('title', 'Edit Service Brochure')
@section('page-title', 'Edit Service Brochure')

@section('content')
<div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
    <form action="{{ route('admin.service_brochures.update', $item) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="space-y-5">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Service</label>
                <select name="service_id" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('service_id') border-red-500 @enderror">
                    <option value="">Select...</option>
                    @foreach($services as $val => $opt)
                    <option value="{{ $val }}" {{ old('service_id', $item->service_id) == $val ? 'selected' : '' }}>{{ $opt }}</option>
                    @endforeach
                </select>
                @error('service_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Brochure File</label>
                <input type="text" name="brochure_file" value="{{ old('brochure_file', $item->brochure_file) }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('brochure_file') border-red-500 @enderror">
                @error('brochure_file') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Brochure Name</label>
                <input type="text" name="brochure_name" value="{{ old('brochure_name', $item->brochure_name) }}" class="w-full px-4 py-2.5 rounded-lg border border-gray-300 text-sm focus:ring-2 focus:border-transparent outline-none transition-all @error('brochure_name') border-red-500 @enderror">
                @error('brochure_name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex items-center gap-3 pt-5 border-t border-gray-100 mt-6">
            <button type="submit" class="px-6 py-2.5 text-white text-sm font-semibold rounded-lg transition-colors" style="background: var(--theme-primary);"><i class="ti ti-device-floppy"></i> Update</button>
            <a href="{{ route('admin.service_brochures.index') }}" class="px-6 py-2.5 text-gray-700 text-sm font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">Cancel</a>
        </div>
    </form>
</div>
@endsection
