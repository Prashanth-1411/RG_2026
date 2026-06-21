@extends('admin.layouts.master')
@section('title', 'View Testimonial')
@section('page-title', 'View Testimonial')
@section('content')
<div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
    <dl class="divide-y divide-gray-100">
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">ID</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $testimonial->id }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Name</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $testimonial->name }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Position</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $testimonial->position ?? 'N/A' }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Designation</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $testimonial->designation ?? 'N/A' }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Category</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $testimonial->category ?? 'N/A' }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Content</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{!! nl2br(e($testimonial->content)) !!}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Rating</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">
                @for($i = 1; $i <= 5; $i++)
                <i class="ti ti-star{{ $i <= $testimonial->rating ? ' text-yellow-400' : ' text-gray-300' }}"></i>
                @endfor
            </dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Image</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $testimonial->image ?? 'N/A' }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Verification URL</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $testimonial->verification_url ?? 'N/A' }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Sort Order</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $testimonial->sort_order ?? 0 }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Featured</dt>
            <dd class="text-sm sm:col-span-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $testimonial->is_featured ? 'bg-emerald-50 text-emerald-700' : 'bg-gray-100 text-gray-500' }}">
                    {{ $testimonial->is_featured ? 'Yes' : 'No' }}
                </span>
            </dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Approved</dt>
            <dd class="text-sm sm:col-span-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $testimonial->is_approved ? 'bg-emerald-50 text-emerald-700' : 'bg-amber-50 text-amber-700' }}">
                    {{ $testimonial->is_approved ? 'Yes' : 'No' }}
                </span>
            </dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Created At</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $testimonial->created_at->format('d M Y, h:i A') }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Updated At</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $testimonial->updated_at->format('d M Y, h:i A') }}</dd>
        </div>
    </dl>
    <div class="flex items-center gap-3 pt-5 border-t border-gray-100 mt-6">
        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="px-6 py-2.5 text-white text-sm font-semibold rounded-lg transition-colors" style="background: var(--theme-primary);">Edit</a>
        <a href="{{ route('admin.testimonials.index') }}" class="px-6 py-2.5 text-gray-700 text-sm font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">Back to List</a>
        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="ml-auto">
            @csrf @method('DELETE')
            <button type="submit" class="px-6 py-2.5 text-red-600 text-sm font-semibold rounded-lg border border-red-200 hover:bg-red-50 transition-colors">Delete</button>
        </form>
    </div>
</div>
@endsection