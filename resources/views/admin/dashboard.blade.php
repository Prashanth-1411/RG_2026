@extends('admin.layouts.master')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@php
    use App\Models\Service;
    use App\Models\Testimonial;
    use App\Models\BlogPost;
    use App\Models\TeamMember;
    use App\Models\ContactInquiry;
    use App\Models\Booking;
    use App\Models\ServiceCategory;
    use App\Models\Album;
    $stats = [
        ['label' => 'Services', 'count' => Service::count(), 'icon' => 'ti ti-car-ambulance', 'color' => 'blue'],
        ['label' => 'Service Categories', 'count' => ServiceCategory::count(), 'icon' => 'ti ti-category', 'color' => 'indigo'],
        ['label' => 'Testimonials', 'count' => Testimonial::count(), 'icon' => 'ti ti-star', 'color' => 'amber'],
        ['label' => 'Blog Posts', 'count' => BlogPost::count(), 'icon' => 'ti ti-news', 'color' => 'emerald'],
        ['label' => 'Team Members', 'count' => TeamMember::count(), 'icon' => 'ti ti-users', 'color' => 'violet'],
        ['label' => 'Albums', 'count' => Album::count(), 'icon' => 'ti ti-photo', 'color' => 'pink'],
        ['label' => 'Inquiries', 'count' => ContactInquiry::count(), 'icon' => 'ti ti-mail', 'color' => 'cyan'],
        ['label' => 'Bookings', 'count' => Booking::count(), 'icon' => 'ti ti-calendar', 'color' => 'rose'],
    ];
    $recentPosts = BlogPost::latest()->take(5)->get();
    $totalServices = Service::count();
    $activeServices = Service::where('status', true)->count();
@endphp

@section('content')
    {{-- Stats Grid --}}
    <div class="row g-4 mb-4">
        @foreach($stats as $stat)
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="rg-stat-card">
                <div class="rg-stat-icon" style="background: color-mix(in srgb, var(--theme-primary) 12%, transparent); color: var(--theme-primary);">
                    <i class="{{ $stat['icon'] }}"></i>
                </div>
                <div class="rg-stat-body">
                    <div class="rg-stat-value">{{ $stat['count'] }}</div>
                    <div class="rg-stat-label">{{ $stat['label'] }}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row g-4">
        {{-- Recent Blog Posts --}}
        <div class="col-12 col-lg-8">
            <div class="rg-panel">
                <div class="rg-panel-header">
                    <h3 class="rg-panel-title">Recent Blog Posts</h3>
                    <a href="{{ route('admin.blog_posts.index') }}" class="rg-panel-link">View All</a>
                </div>
                <div class="rg-panel-body">
                    @if($recentPosts->count())
                        <div class="rg-post-list">
                            @foreach($recentPosts as $post)
                            <div class="rg-post-item">
                                <div class="rg-post-icon">
                                    <i class="ti ti-article"></i>
                                </div>
                                <div class="rg-post-content">
                                    <div class="rg-post-title">{{ $post->title }}</div>
                                    <div class="rg-post-meta">{{ $post->created_at->diffForHumans() }}</div>
                                </div>
                                <span class="rg-badge {{ $post->status ? 'rg-badge-active' : 'rg-badge-draft' }}">
                                    {{ $post->status ? 'Active' : 'Draft' }}
                                </span>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p class="rg-empty">No blog posts yet.</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="col-12 col-lg-4">
            <div class="rg-panel">
                <div class="rg-panel-header">
                    <h3 class="rg-panel-title">Quick Actions</h3>
                </div>
                <div class="rg-panel-body">
                    <div class="rg-action-list">
                        <a href="{{ route('admin.services.create') }}" class="rg-action-link">
                            <i class="ti ti-plus"></i> Add New Service
                        </a>
                        <a href="{{ route('admin.blog_posts.create') }}" class="rg-action-link">
                            <i class="ti ti-plus"></i> Add New Blog Post
                        </a>
                        <a href="{{ route('admin.testimonials.create') }}" class="rg-action-link">
                            <i class="ti ti-plus"></i> Add Testimonial
                        </a>
                        <a href="{{ route('admin.team_members.create') }}" class="rg-action-link">
                            <i class="ti ti-plus"></i> Add Team Member
                        </a>
                        <a href="{{ route('admin.pages.create') }}" class="rg-action-link">
                            <i class="ti ti-plus"></i> Add New Page
                        </a>
                        <a href="{{ route('admin.hero_slides.create') }}" class="rg-action-link">
                            <i class="ti ti-plus"></i> Add Hero Slide
                        </a>
                        <div class="rg-action-divider"></div>
                        <a href="{{ route('admin.theme') }}" class="rg-action-link">
                            <i class="ti ti-palette"></i> Customize Theme
                        </a>
                        <a href="{{ route('admin.settings') }}" class="rg-action-link">
                            <i class="ti ti-settings"></i> Site Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
