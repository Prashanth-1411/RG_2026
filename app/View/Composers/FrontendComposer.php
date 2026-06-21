<?php

namespace App\View\Composers;

use App\Models\NavigationItem;
use App\Models\SeoMetum;
use App\Models\Setting;
use App\Services\SiteContentService;
use App\Services\ThemeService;
use Illuminate\View\View;

class FrontendComposer
{
    public function compose(View $view): void
    {
        $view->with([
            'site' => Setting::first() ?? new Setting([
                'company_name' => 'R.G. Ambulance Service',
                'tagline' => 'Premium Emergency Medical Transport',
            ]),
            'theme' => ThemeService::all(),
            'content' => SiteContentService::all(),
            'headerNav' => NavigationItem::where('location', 'header')
                ->where('status', true)
                ->whereNull('parent_id')
                ->orderBy('sort_order')
                ->with(['children' => fn ($q) => $q->where('status', true)->orderBy('sort_order')])
                ->get(),
            'footerNav' => NavigationItem::where('location', 'footer')
                ->where('status', true)
                ->whereNull('parent_id')
                ->orderBy('sort_order')
                ->with(['children' => fn ($q) => $q->where('status', true)->orderBy('sort_order')])
                ->get(),
            'seo' => $this->resolveSeo(),
        ]);
    }

    protected function resolveSeo(): ?SeoMetum
    {
        $route = request()->route()?->getName();
        $map = [
            'frontend.home' => 'home',
            'frontend.about' => 'about',
            'frontend.services' => 'services',
            'frontend.services.show' => 'services',
            'frontend.fleet' => 'fleet',
            'frontend.fleet.show' => 'fleet',
            'frontend.mortuary' => 'mortuary',
            'frontend.testimonials' => 'testimonials',
            'frontend.contact' => 'contact',
            'frontend.faq' => 'faq',
        ];

        $pageName = $map[$route] ?? null;
        if (!$pageName) {
            return null;
        }

        return SeoMetum::where('page_name', $pageName)->first();
    }
}
