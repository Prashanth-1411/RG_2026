<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.47.0/dist/tabler-icons.min.css">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @php
        $theme = \Illuminate\Support\Facades\Cache::get('theme_settings', []);
        $tv = fn($key, $default) => (!empty($theme[$key]) ? $theme[$key] : $default);
    @endphp
    <style>
        :root {
            --theme-primary: {{ $tv('primary_color', '#0F4CFF') }};
            --theme-secondary: {{ $tv('secondary_color', '#0F172A') }};
            --theme-accent: {{ $tv('accent_color', '#2563eb') }};
            --theme-bg: {{ $tv('bg_color', '#f1f5f9') }};
            --theme-radius: {{ $tv('border_radius', '12') }}px;
            --theme-card-padding: {{ $tv('card_padding', '24') }}px;
            --theme-container: {{ $tv('container_width', '1280') }}px;
            --theme-body-font: '{{ $tv('body_font', 'Inter') }}', sans-serif;
            --theme-heading-font: '{{ $tv('heading_font', 'Inter') }}', sans-serif;
            --theme-body-size: {{ $tv('body_font_size', '14') }}px;
            --theme-heading-size: {{ $tv('heading_font_size', '16') }}px;
            --theme-btn-height: {{ $tv('button_height', '44') }}px;
            --theme-btn-radius: {{ $tv('button_radius', '8') }}px;
            --theme-btn-size: {{ $tv('button_font_size', '14') }}px;
            --theme-btn-weight: {{ $tv('button_font_weight', '600') }};
            --theme-shadow: 0 {{ $tv('shadow_intensity', '4') }}px {{ $tv('shadow_blur', '24') }}px rgba(0,0,0,0.06);
        }
        body { font-family: var(--theme-body-font); font-size: var(--theme-body-size); background: var(--theme-bg) !important; }
        h1, h2, h3, h4, h5, h6 { font-family: var(--theme-heading-font); }
        .btn { height: var(--theme-btn-height); border-radius: var(--theme-btn-radius); font-size: var(--theme-btn-size); font-weight: var(--theme-btn-weight); }
        .card, .rounded-xl { border-radius: var(--theme-radius); }
        .nav-link-active { background: var(--theme-primary) !important; color: #fff !important; }
        .nav-link-active i { color: #fff !important; }
        .nav-link-active span { color: #fff !important; }
        .sidebar-hover:hover { background: rgba(15,76,255,.06); color: var(--theme-primary) !important; }
        .sidebar-hover:hover i { color: var(--theme-primary) !important; }
    </style>
    <link rel="stylesheet" href="{{ asset('css/admin/luxury.css') }}">
    @stack('styles')
</head>
<body class="font-sans antialiased" style="background: var(--theme-bg);">
    <div class="flex h-screen overflow-hidden">
        {{-- Sidebar --}}
        <aside class="w-64 bg-[#0F172A] flex flex-col flex-shrink-0 hidden lg:flex">
            <div class="h-16 flex items-center gap-3 px-6 border-b border-white/5">
                <div class="w-9 h-9 rounded-lg flex items-center justify-center text-white" style="background: var(--theme-primary); box-shadow: 0 4px 12px rgba(15,76,255,.3);">
                    <i class="ti ti-ambulance text-lg"></i>
                </div>
                <div>
                    <div class="text-sm font-bold text-white leading-tight">{{ config('app.name') }}</div>
                    <div class="text-[10px] uppercase tracking-widest text-white/40 font-semibold">Admin Panel</div>
                </div>
            </div>
            <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-0.5">
                <x-admin.nav-item href="{{ route('admin.dashboard') }}" icon="ti ti-dashboard" :active="request()->routeIs('admin.dashboard')">Dashboard</x-admin.nav-item>

                <div class="text-[10px] uppercase tracking-widest text-white/30 font-semibold px-3 pt-5 pb-1.5">Content</div>
                <x-admin.nav-item href="{{ route('admin.pages.index') }}" icon="ti ti-file-text" :active="request()->routeIs('admin.pages.*')">Pages</x-admin.nav-item>
                <x-admin.nav-item href="{{ route('admin.hero_slides.index') }}" icon="ti ti-slideshow" :active="request()->routeIs('admin.hero_slides.*')">Hero Slides</x-admin.nav-item>
                <x-admin.nav-item href="{{ route('admin.services.index') }}" icon="ti ti-car-ambulance" :active="request()->routeIs('admin.services.*') || request()->routeIs('admin.service_categories.*') || request()->routeIs('admin.service_features.*') || request()->routeIs('admin.service_areas.*')">Services</x-admin.nav-item>
                <x-admin.nav-item href="{{ route('admin.testimonials.index') }}" icon="ti ti-star" :active="request()->routeIs('admin.testimonials.*')">Testimonials</x-admin.nav-item>
                <x-admin.nav-item href="{{ route('admin.blog_posts.index') }}" icon="ti ti-news" :active="request()->routeIs('admin.blog_posts.*') || request()->routeIs('admin.blog_categories.*')">Blog</x-admin.nav-item>
                <x-admin.nav-item href="{{ route('admin.albums.index') }}" icon="ti ti-photo" :active="request()->routeIs('admin.albums.*') || request()->routeIs('admin.gallery_images.*')">Gallery</x-admin.nav-item>
                <x-admin.nav-item href="{{ route('admin.team_members.index') }}" icon="ti ti-users" :active="request()->routeIs('admin.team_members.*')">Team</x-admin.nav-item>
                <x-admin.nav-item href="{{ route('admin.capabilities.index') }}" icon="ti ti-trophy" :active="request()->routeIs('admin.capabilities.*')">Capabilities</x-admin.nav-item>
                <x-admin.nav-item href="{{ route('admin.sister_concerns.index') }}" icon="ti ti-building" :active="request()->routeIs('admin.sister_concerns.*')">Sister Concerns</x-admin.nav-item>
                <x-admin.nav-item href="{{ route('admin.certificates.index') }}" icon="ti ti-award" :active="request()->routeIs('admin.certificates.*')">Certificates</x-admin.nav-item>
                <x-admin.nav-item href="{{ route('admin.navigation_items.index') }}" icon="ti ti-menu" :active="request()->routeIs('admin.navigation_items.*')">Navigation</x-admin.nav-item>

                <div class="text-[10px] uppercase tracking-widest text-white/30 font-semibold px-3 pt-5 pb-1.5">Leads &amp; Logs</div>
                <x-admin.nav-item href="{{ route('admin.contact_inquiries.index') }}" icon="ti ti-mail" :active="request()->routeIs('admin.contact_inquiries.*')">Inquiries</x-admin.nav-item>
                <x-admin.nav-item href="{{ route('admin.bookings.index') }}" icon="ti ti-calendar" :active="request()->routeIs('admin.bookings.*')">Bookings</x-admin.nav-item>
                <x-admin.nav-item href="{{ route('admin.activity_logs.index') }}" icon="ti ti-activity" :active="request()->routeIs('admin.activity_logs.*')">Activity Logs</x-admin.nav-item>
                <x-admin.nav-item href="{{ route('admin.notifications.index') }}" icon="ti ti-bell" :active="request()->routeIs('admin.notifications.*')">Notifications</x-admin.nav-item>

                <div class="text-[10px] uppercase tracking-widest text-white/30 font-semibold px-3 pt-5 pb-1.5">System</div>
                <x-admin.nav-item href="{{ route('admin.settings') }}" icon="ti ti-settings" :active="request()->routeIs('admin.settings')">Settings</x-admin.nav-item>
                <x-admin.nav-item href="{{ route('admin.seo_meta.index') }}" icon="ti ti-seo" :active="request()->routeIs('admin.seo_meta.*')">SEO Meta</x-admin.nav-item>
                <x-admin.nav-item href="{{ route('admin.theme') }}" icon="ti ti-palette" :active="request()->routeIs('admin.theme')">Theme Customizer</x-admin.nav-item>
            </nav>
            <div class="border-t border-white/5 p-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 text-sm text-white/50 hover:text-white w-full transition-colors">
                        <i class="ti ti-logout"></i>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="h-16 bg-white border-b border-gray-200/60 flex items-center justify-between px-6 flex-shrink-0">
                <div class="flex items-center gap-3">
                    <button class="lg:hidden text-gray-500 hover:text-gray-700" onclick="document.querySelector('aside').classList.toggle('hidden')">
                        <i class="ti ti-menu-2 text-xl"></i>
                    </button>
                    <h1 class="text-lg font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2 text-sm text-gray-500">
                        <div class="w-8 h-8 rounded-full text-white flex items-center justify-center text-xs font-bold shadow-sm" style="background: var(--theme-primary);">
                            {{ substr(Auth::user()->name, 0, 2) }}
                        </div>
                        <span class="hidden sm:block font-medium text-gray-700">{{ Auth::user()->name }}</span>
                    </div>
                </div>
            </header>
            <main class="flex-1 overflow-y-auto p-6" style="background: var(--theme-bg);">
                @if (session('success'))
                    <div class="mb-4 px-4 py-3 rounded-lg bg-emerald-50 text-emerald-700 text-sm font-medium border border-emerald-200 flex items-center gap-2">
                        <i class="ti ti-check-circle text-emerald-500"></i>
                        {{ session('success') }}
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
