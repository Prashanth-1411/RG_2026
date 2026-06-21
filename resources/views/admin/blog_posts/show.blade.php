@extends('admin.layouts.master')
@section('title', 'View Blog Post')
@section('page-title', 'View Blog Post')
@section('content')
<div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
    <dl class="divide-y divide-gray-100">
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">ID</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $blogPost->id }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Title</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $blogPost->title }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Slug</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $blogPost->slug }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Category</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $blogPost->category->name ?? 'N/A' }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Author</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $blogPost->author ?? 'N/A' }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Excerpt</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $blogPost->excerpt }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Content</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{!! nl2br(e($blogPost->content)) !!}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Tags</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $blogPost->tags ?? 'N/A' }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Reading Time</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $blogPost->reading_time ? $blogPost->reading_time . ' min' : 'N/A' }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Views</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $blogPost->views ?? 0 }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Featured Image</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $blogPost->featured_image ?? 'N/A' }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Image</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $blogPost->image ?? 'N/A' }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Meta Title</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $blogPost->meta_title ?? 'N/A' }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Meta Description</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $blogPost->meta_description ?? 'N/A' }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Featured</dt>
            <dd class="text-sm sm:col-span-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $blogPost->is_featured ? 'bg-emerald-50 text-emerald-700' : 'bg-gray-100 text-gray-500' }}">
                    {{ $blogPost->is_featured ? 'Yes' : 'No' }}
                </span>
            </dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Status</dt>
            <dd class="text-sm sm:col-span-2">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $blogPost->status ? 'bg-emerald-50 text-emerald-700' : 'bg-gray-100 text-gray-500' }}">
                    {{ $blogPost->status ? 'Active' : 'Inactive' }}
                </span>
            </dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Created At</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $blogPost->created_at->format('d M Y, h:i A') }}</dd>
        </div>
        <div class="py-3 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-semibold text-gray-500">Updated At</dt>
            <dd class="text-sm text-gray-900 sm:col-span-2">{{ $blogPost->updated_at->format('d M Y, h:i A') }}</dd>
        </div>
    </dl>
    <div class="flex items-center gap-3 pt-5 border-t border-gray-100 mt-6">
        <a href="{{ route('admin.blog_posts.edit', $blogPost) }}" class="px-6 py-2.5 text-white text-sm font-semibold rounded-lg transition-colors" style="background: var(--theme-primary);">Edit</a>
        <a href="{{ route('admin.blog_posts.index') }}" class="px-6 py-2.5 text-gray-700 text-sm font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">Back to List</a>
        <form action="{{ route('admin.blog_posts.destroy', $blogPost) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="ml-auto">
            @csrf @method('DELETE')
            <button type="submit" class="px-6 py-2.5 text-red-600 text-sm font-semibold rounded-lg border border-red-200 hover:bg-red-50 transition-colors">Delete</button>
        </form>
    </div>
</div>
@endsection