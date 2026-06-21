<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $pageTitle = $seo?->meta_title ?? ($content['site_name'] ?? $site?->company_name ?? 'R.G. Ambulance Service');
        $pageDesc = $seo?->meta_description ?? ($content['site_description'] ?? $site?->tagline ?? '');
        $pageKeywords = $seo?->meta_keywords ?? '';
        $ogImage = $seo?->og_image ?? ($site?->logo ? asset('storage/' . $site->logo) : '');
    @endphp

    <title>@yield('title', $pageTitle)</title>
    <meta name="description" content="@yield('meta_description', $pageDesc)">
    @if($pageKeywords)<meta name="keywords" content="{{ $pageKeywords }}">@endif

    @if($seo)
        <meta property="og:title" content="{{ $seo->og_title ?? $pageTitle }}">
        <meta property="og:description" content="{{ $seo->og_description ?? $pageDesc }}">
        @if($ogImage)<meta property="og:image" content="{{ $ogImage }}">@endif
        @if($seo?->canonical_url)<link rel="canonical" href="{{ $seo->canonical_url }}">@endif
    @endif

    @if($site?->favicon)
        <link rel="icon" href="{{ asset('storage/' . $site->favicon) }}">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            {!! \App\Services\ThemeService::cssVariables() !!}
        }
    </style>

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>
    <div id="page-loader">
        <div class="loader-brand">
            <img src="{{ asset('storage/' . $site->logo) }}" alt="{{ $site->company_name ?? 'Loading...' }}" style="max-height:60px;">
            <div class="loader-line"></div>
        </div>
    </div>

    @include('frontend.components.header')

    <main>
        @yield('content')
    </main>

    @include('frontend.components.footer')

    @if($site?->whatsapp)
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $site->whatsapp) }}?text={{ urlencode('Hi! I need ambulance assistance. Please help.') }}"
       target="_blank"
       rel="noopener"
       class="rg-whatsapp"
       aria-label="Chat on WhatsApp">
        <span class="rg-whatsapp__label">Chat with us</span>
        <span class="rg-whatsapp__icon"><i class="bi bi-whatsapp"></i></span>
    </a>
    @endif

    @stack('scripts')
</body>
</html>
