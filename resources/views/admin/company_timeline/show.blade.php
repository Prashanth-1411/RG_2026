@extends('admin.layouts.master')

@section('title', 'Company Timeline Entry Details')
@section('page-title', 'Company Timeline Entry Details')

@section('content')
<div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach($fields as $label => $value)
        <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">{{ $label }}</label>
            <p class="text-sm text-gray-900">{{ $value }}</p>
        </div>
        @endforeach
    </div>
    <div class="flex items-center gap-3 pt-5 border-t border-gray-100 mt-6">
        <a href="{{ route('admin.company_timeline.index') }}" class="px-6 py-2.5 text-gray-700 text-sm font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">
            <i class="ti ti-arrow-left"></i> Back
        </a>
    </div>
</div>
@endsection
