<header class="rg-header" id="rg-header">
    <div class="rg-header__top d-none d-lg-block">
        <div class="container-premium">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    @if($site?->phone_primary)
                        <a href="tel:{{ $site->phone_primary }}"><i class="bi bi-telephone-fill me-2"></i>{{ $site->phone_primary }}</a>
                    @endif
                    @if($site?->whatsapp)
                        <span class="top-divider"></span>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $site->whatsapp) }}" target="_blank" rel="noopener" style="color:#25D366;"><i class="bi bi-whatsapp me-1"></i>{{ $site->whatsapp }}</a>
                    @endif
                    @if($site?->email)
                        <span class="top-divider"></span>
                        <a href="mailto:{{ $site->email }}"><i class="bi bi-envelope-fill me-2"></i>{{ $site->email }}</a>
                    @endif
                </div>
                <div class="d-flex align-items-center">
                    @if($site?->address)
                        <span><i class="bi bi-geo-alt-fill me-2"></i>{{ $site->city ?? '' }}{{ $site->state ? ', ' . $site->state : '' }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="rg-header__bar">
        <div class="container-premium">
            <div class="d-flex align-items-center justify-content-between">
                <a href="{{ route('frontend.home') }}" class="rg-header__logo text-decoration-none">
                    <span class="rg-header__logo-bg">
                        <img src="{{ $site->logo_url }}" alt="{{ $site->company_name }}" style="max-width: {{ $site->logo_width ?? 200 }}px{{ $site->logo_height ? '; max-height: ' . $site->logo_height . 'px' : '' }}">
                        <span class="logo-text"><span>R.G.</span> Ambulance Service</span>
                    </span>
                </a>

                <nav class="rg-header__nav d-none d-lg-flex align-items-center">
                    @forelse($headerNav as $item)
                        @if($item->children->count())
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle {{ request()->url() === url($item->link) ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">{{ $item->label }}</a>
                                <ul class="dropdown-menu">
                                    @foreach($item->children as $child)
                                        <li><a class="dropdown-item" href="{{ url($child->link) }}">{{ $child->label }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <a class="nav-link {{ request()->url() === url($item->link) ? 'active' : '' }}" href="{{ url($item->link) }}">{{ $item->label }}</a>
                        @endif
                    @empty
                        <a class="nav-link {{ request()->routeIs('frontend.home') ? 'active' : '' }}" href="{{ route('frontend.home') }}">Home</a>
                        <a class="nav-link {{ request()->routeIs('frontend.about') ? 'active' : '' }}" href="{{ route('frontend.about') }}">About</a>
                        <a class="nav-link {{ request()->routeIs('frontend.services*') ? 'active' : '' }}" href="{{ route('frontend.services') }}">Services</a>
                        <a class="nav-link {{ request()->routeIs('frontend.fleet*') ? 'active' : '' }}" href="{{ route('frontend.fleet') }}">Fleet</a>
                        <a class="nav-link {{ request()->routeIs('frontend.contact') ? 'active' : '' }}" href="{{ route('frontend.contact') }}">Contact</a>
                    @endforelse
                </nav>

                <div class="d-flex align-items-center gap-3">
                    <div class="rg-header__cta d-none d-lg-block">
                        @if($site?->phone_primary)
                            <a href="tel:{{ $site->phone_primary }}" class="btn-emergency">
                                <span class="emergency-ring"></span>
                                <i class="bi bi-telephone-fill animate-shake" style="display:inline-block;"></i>
                                <span class="emergency-text">
                                    <strong>24/7 Emergency</strong>
                                    <small>{{ $site->phone_primary }}</small>
                                </span>
                            </a>
                        @endif
                    </div>
                    <button class="rg-header__toggle d-lg-none" data-mobile-toggle aria-label="Open menu">
                        <span></span><span></span><span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="rg-mobile-nav">
    <button class="btn btn-link text-white position-absolute top-0 end-0 m-4 fs-3" data-mobile-close aria-label="Close menu">
        <i class="bi bi-x-lg"></i>
    </button>
    @forelse($headerNav as $item)
        <a class="mobile-nav-link" href="{{ url($item->link) }}">{{ $item->label }}</a>
        @foreach($item->children as $child)
            <a class="mobile-nav-link ps-4" href="{{ url($child->link) }}" style="font-size: 1.25rem;">{{ $child->label }}</a>
        @endforeach
    @empty
        <a class="mobile-nav-link" href="{{ route('frontend.home') }}">Home</a>
        <a class="mobile-nav-link" href="{{ route('frontend.about') }}">About</a>
        <a class="mobile-nav-link" href="{{ route('frontend.services') }}">Services</a>
        <a class="mobile-nav-link" href="{{ route('frontend.fleet') }}">Fleet</a>
        <a class="mobile-nav-link" href="{{ route('frontend.contact') }}">Contact</a>
    @endforelse
    @if($site?->phone_primary)
        <a class="btn-rg d-inline-flex align-items-center gap-2 mt-4" href="tel:{{ $site->phone_primary }}" style="background:linear-gradient(135deg,#dc2626,#b91c1c);color:#fff;border:none;border-radius:50px;padding:0.75rem 2rem;font-weight:700;box-shadow:0 4px 20px rgba(220,38,38,0.35);">
            <i class="bi bi-telephone-fill"></i> {{ $site->phone_primary }}
        </a>
    @endif
</div>
