<?php

namespace App\Providers\Filament;

use App\Filament\Pages\SiteSettings;
use App\Filament\Pages\ThemeSettings;
use App\Filament\Resources\SeoMetaResource;
use App\Filament\Resources\SettingResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(\App\Filament\Pages\Auth\Login::class)
            ->brandName('R.G. Ambulance Service')
            ->brandLogoHeight('40px')
            ->colors([
                'primary' => Color::hex('#D4AF37'),
                'secondary' => Color::hex('#C9A227'),
                'accent' => Color::hex('#F2E8C9'),
                'success' => Color::hex('#28A745'),
                'danger' => Color::hex('#DC3545'),
                'warning' => Color::hex('#D4AF37'),
            ])
            ->font('Outfit')
            ->renderHook(
                \Filament\View\PanelsRenderHook::HEAD_START,
                fn(): string => '<link rel="stylesheet" href="' . asset('css/admin/luxury.css') . '">',
            )
            ->renderHook(
                \Filament\View\PanelsRenderHook::SCRIPTS_AFTER,
                fn(): string => '<script src="' . asset('js/admin/luxury.js') . '"></script>',
            )
            ->favicon(asset('favicon.ico'))
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->resources([
                SettingResource::class,
                \App\Filament\Resources\ServiceResource::class,
                \App\Filament\Resources\FleetResource::class,
                \App\Filament\Resources\FleetCategoryResource::class,
                \App\Filament\Resources\FeaturedSectionResource::class,
                \App\Filament\Resources\CompanyTimelineResource::class,
                \App\Filament\Resources\ServiceAreaResource::class,
                \App\Filament\Resources\EquipmentRentalResource::class,
                \App\Filament\Resources\MortuaryResource::class,
                \App\Filament\Resources\FuneralServiceResource::class,
                \App\Filament\Resources\TestimonialResource::class,
                \App\Filament\Resources\BlogPostResource::class,
                \App\Filament\Resources\HeroSlideResource::class,
                \App\Filament\Resources\PageResource::class,
                \App\Filament\Resources\TeamMemberResource::class,
                \App\Filament\Resources\FaqResource::class,
                \App\Filament\Resources\StatisticResource::class,
                \App\Filament\Resources\NavigationItemResource::class,
                \App\Filament\Resources\ServiceCategoryResource::class,
                \App\Filament\Resources\ContactInquiryResource::class,
                \App\Filament\Resources\BookingResource::class,
                \App\Filament\Resources\FuneralBookingResource::class,
                \App\Filament\Resources\BlogCategoryResource::class,
                \App\Filament\Resources\CertificateResource::class,
                \App\Filament\Resources\AlbumResource::class,
                \App\Filament\Resources\ActivityLogResource::class,
                SeoMetaResource::class,
            ])
            ->pages([
                Pages\Dashboard::class,
                ThemeSettings::class,
                SiteSettings::class,
            ])
            ->widgets([
                Widgets\AccountWidget::class,
                \App\Filament\Widgets\StatsOverview::class,
                \App\Filament\Widgets\RecentInquiries::class,
                \App\Filament\Widgets\MonthlyBookingsChart::class,
                \App\Filament\Widgets\RecentBookings::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->spa();
    }
}
