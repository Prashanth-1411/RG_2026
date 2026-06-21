@php
    $logo = filament()->getBrandLogo();
    $brand = filament()->getBrandName();
@endphp

<div class="ap-split">
    {{-- LEFT: Brand Section --}}
        <div class="ap-brand">
            <div class="ap-brand-inner">
                <div class="ap-logo-wrap">
                    @if ($logo)
                        <img src="{{ $logo }}" alt="{{ $brand }}" class="ap-logo">
                    @else
                        <div class="ap-brand-name">{{ $brand }}</div>
                    @endif
                    <div class="ap-logo-text">R.G. Ambulance Service</div>
                </div>

                <div class="ap-image-wrap">
                    <svg viewBox="0 0 300 180" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="80" y="30" width="140" height="120" rx="16" fill="rgba(212,175,55,0.06)" stroke="rgba(212,175,55,0.2)" stroke-width="1.5"/>
                        <path d="M130 65h40v50H130z" fill="rgba(212,175,55,0.1)"/>
                        <path d="M100 85h100M125 65v-16M175 65v-16" stroke="rgba(212,175,55,0.3)" stroke-width="2.5" stroke-linecap="round"/>
                        <circle cx="150" cy="100" r="18" fill="rgba(212,175,55,0.06)" stroke="rgba(212,175,55,0.2)" stroke-width="1.5"/>
                        <path d="M144 100h12M150 94v12" stroke="#D4AF37" stroke-width="2.5" stroke-linecap="round"/>
                        <text x="150" y="170" text-anchor="middle" fill="#777777" font-size="12" font-family="Outfit, sans-serif">Emergency Response Vehicle</text>
                    </svg>
                </div>

                <h2 class="ap-company-name">R.G. Ambulance Service</h2>
                <p class="ap-about-text">Providing rapid emergency medical response, patient transport, and funeral service support across the region. Trusted by thousands for reliability and compassionate care.</p>

                <div class="ap-highlights">
                    <div class="ap-highlight-item">
                        <span class="ap-highlight-icon">&#9716;</span>
                        <span class="ap-highlight-text">500+ Patients Served</span>
                    </div>
                    <div class="ap-highlight-item">
                        <span class="ap-highlight-icon">&#9716;</span>
                        <span class="ap-highlight-text">24/7 Emergency Support</span>
                    </div>
                    <div class="ap-highlight-item">
                        <span class="ap-highlight-icon">&#9716;</span>
                        <span class="ap-highlight-text">98% Satisfaction Rate</span>
                    </div>
                </div>

                <div class="ap-emergency">
                    <div class="ap-emergency-label">Emergency Hotline</div>
                    <div class="ap-emergency-number">+1 (555) 123-4567</div>
                </div>
            </div>
        </div>

        {{-- RIGHT: Login Section --}}
        <div class="ap-login">
            <div class="ap-login-card">
                <div class="ap-login-logo-wrap">
                    @if ($logo)
                        <img src="{{ $logo }}" alt="{{ $brand }}" class="ap-login-logo">
                    @endif
                    <div class="ap-login-brand-name">R.G. Ambulance</div>
                    <div class="ap-login-tagline">24/7 Emergency & Funeral Services</div>
                </div>
                <h1 class="ap-login-heading">Welcome Back</h1>
                <p class="ap-login-subtitle">Sign in to continue to your dashboard</p>

                {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE, scopes: $this->getRenderHookScopes()) }}

                <form wire:submit="authenticate" class="ap-form">
                    {{ $this->form }}

                    <button type="submit" class="ap-btn ap-btn-gold ap-btn-block">
                        Sign In
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                </form>

                {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, scopes: $this->getRenderHookScopes()) }}

                @if (filament()->hasRegistration())
                    <div class="ap-register">
                        <span>{{ __('filament-panels::pages/auth/login.actions.register.before') }}</span>
                        {{ $this->registerAction }}
                    </div>
                @endif
            </div>
        </div>
        <style>
        .ap-split {
            display: flex;
            min-height: 100vh;
            width: 100%;
            font-family: 'Outfit', sans-serif;
            background: #FFFFFF;
        }

        /* ========== LEFT BRAND ========== */
        .ap-brand {
            flex: 1;
            background: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 40px;
        }

        .ap-brand-inner {
            max-width: 480px;
            text-align: center;
        }

        .ap-logo-wrap {
            margin-bottom: 40px;
        }

        .ap-logo {
            max-height: 64px;
        }

        .ap-logo-text {
            font-size: 18px;
            font-weight: 700;
            color: #D4AF37;
            margin-top: 16px;
            letter-spacing: 0.5px;
        }

        .ap-brand-name {
            font-size: 26px;
            font-weight: 700;
            color: #D4AF37;
        }

        .ap-image-wrap {
            margin-bottom: 36px;
        }

        .ap-image-wrap svg {
            max-width: 260px;
            height: auto;
        }

        .ap-company-name {
            font-size: 22px;
            font-weight: 700;
            color: #D4AF37;
            margin: 0 0 12px;
        }

        .ap-about-text {
            font-size: 14px;
            color: #2A2A2A;
            line-height: 1.6;
            margin: 0 0 32px;
        }

        .ap-highlights {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 36px;
            align-items: center;
        }

        .ap-highlight-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .ap-highlight-icon {
            color: #D4AF37;
            font-size: 10px;
        }

        .ap-highlight-text {
            font-size: 14px;
            color: #2A2A2A;
            font-weight: 500;
        }

        .ap-emergency {
            background: rgba(212,175,55,0.08);
            border: 1px solid rgba(212,175,55,0.2);
            border-radius: 16px;
            padding: 20px 32px;
            display: inline-block;
        }

        .ap-emergency-label {
            font-size: 12px;
            color: #2A2A2A;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
            margin-bottom: 4px;
        }

        .ap-emergency-number {
            font-size: 20px;
            font-weight: 700;
            color: #D4AF37;
            letter-spacing: 0.5px;
        }

        /* ========== RIGHT LOGIN ========== */
        .ap-login {
            flex: 1;
            background: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 40px;
        }

        .ap-login-card {
            width: 100%;
            max-width: 500px;
            background: #FFFFFF;
            border: 1px solid #E5D6A0;
            border-radius: 24px;
            padding: 48px 40px;
            box-shadow: 0 20px 60px rgba(212,175,55,0.12);
        }

        .ap-login-logo-wrap {
            text-align: center;
            margin-bottom: 24px;
        }

        .ap-login-logo {
            max-height: 48px;
        }

        .ap-login-brand-name {
            font-size: 28px;
            font-weight: 700;
            color: #B8860B;
            margin-top: 12px;
            margin-bottom: 24px;
            letter-spacing: 1px;
        }

        .ap-login-tagline {
            font-size: 14px;
            font-weight: 500;
            color: #666666;
            margin-bottom: 28px;
        }

        .ap-login-heading {
            font-size: 36px;
            font-weight: 700;
            color: #B8860B;
            text-align: center;
            margin: 0 0 8px;
            letter-spacing: -0.5px;
        }

        .ap-login-subtitle {
            font-size: 15px;
            color: #2A2A2A;
            text-align: center;
            margin: 0 0 36px;
            font-weight: 400;
        }

        /* ---- Form Overrides ---- */
        .ap-form {
            width: 100%;
        }

        .ap-form .fi-fo-field {
            margin-bottom: 20px;
        }

        .ap-form .fi-fo-field-wrp-label {
            font-family: 'Outfit', sans-serif !important;
            font-size: 14px !important;
            font-weight: 600 !important;
            color: #B8860B !important;
            margin-bottom: 6px !important;
        }

        .ap-form .fi-fo-field-wrp-label span {
            color: #B8860B !important;
        }

        .ap-form .fi-fo-field-wrp-label .dark\:text-white {
            color: #B8860B !important;
        }

        .fi-fo-field-wrp-label .dark\:text-white {
            color: #B8860B !important;
        }

        .ap-form .fi-input-wrp {
            height: 55px !important;
            border-radius: 12px !important;
            border: 2px solid #D4AF37 !important;
            background: #FFFFFF !important;
            transition: border-color 0.3s ease !important;
        }

        .ap-form .fi-input-wrp:focus-within {
            border-color: #C9A227 !important;
            box-shadow: 0 0 0 4px rgba(212,175,55,0.15) !important;
        }

        .ap-form .fi-input {
            font-family: 'Outfit', sans-serif !important;
            font-size: 15px !important;
            color: #2A2A2A !important;
            background: transparent !important;
        }

        .ap-form .fi-input::placeholder {
            color: #8A8A8A !important;
        }

        .ap-form .fi-fo-errors {
            font-family: 'Outfit', sans-serif !important;
            font-size: 13px !important;
            color: #DC3545 !important;
            margin-top: 6px !important;
        }

        .ap-form .fi-checkbox-input {
            accent-color: #D4AF37 !important;
        }

        /* ---- Button ---- */
        .ap-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-family: 'Outfit', sans-serif;
            font-size: 16px;
            font-weight: 600;
            padding: 0 32px;
            height: 55px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
            text-decoration: none;
            letter-spacing: 0.3px;
        }

        .ap-btn-gold {
            background: #D4AF37;
            color: #FFFFFF;
        }

        .ap-btn-gold:hover {
            background: #C9A227;
        }

        .ap-btn-block {
            width: 100%;
            margin-top: 8px;
        }

        .ap-btn svg {
            transition: transform 0.3s ease;
        }

        .ap-btn:hover svg {
            transform: translateX(4px);
        }

        /* ---- Register Link ---- */
        .ap-register {
            text-align: center;
            margin-top: 24px;
            font-size: 14px;
            color: #2A2A2A;
            font-family: 'Outfit', sans-serif;
        }

        .ap-register a {
            color: #D4AF37;
            font-weight: 600;
            text-decoration: none;
        }

        .ap-register a:hover {
            color: #C9A227;
        }

        /* ---- Filament Layout Overrides ---- */
        .fi-simple-layout {
            background: transparent !important;
            min-height: auto !important;
        }

        .fi-simple-main-ctn {
            flex-grow: 0 !important;
            width: 100% !important;
        }

        .fi-simple-main {
            display: block !important;
            width: 100% !important;
            max-width: 100% !important;
            min-height: 0 !important;
            box-shadow: none !important;
            background: transparent !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        /* ---- Responsive ---- */
        @media (max-width: 900px) {
            .ap-split {
                flex-direction: column;
            }
            .ap-brand {
                padding: 40px 24px;
            }
            .ap-login {
                padding: 24px;
            }
            .ap-login-card {
                padding: 32px 24px;
            }
            .ap-login-heading {
                font-size: 28px;
            }
        }

        @media (max-width: 480px) {
            .ap-login-card {
                padding: 24px 20px;
            }
            .ap-login-heading {
                font-size: 24px;
            }
            .ap-brand {
                padding: 32px 20px;
            }
        }
    </style>
</div>
