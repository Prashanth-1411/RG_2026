<?php

namespace App\Filament\Widgets;

use App\Models\BlogPost;
use App\Models\Booking;
use App\Models\ContactInquiry;
use App\Models\EquipmentRental;
use App\Models\Fleet;
use App\Models\FuneralBooking;
use App\Models\Service;
use App\Models\Testimonial;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Services', Service::count())
                ->description('Active medical services')
                ->descriptionIcon('heroicon-o-truck')
                ->color('primary'),

            Stat::make('Fleet', Fleet::count())
                ->description('Funeral & medical fleet')
                ->descriptionIcon('heroicon-o-truck')
                ->color('info'),

            Stat::make('Equipment Rentals', EquipmentRental::count())
                ->description('Available equipment')
                ->descriptionIcon('heroicon-o-cog')
                ->color('warning'),

            Stat::make('Testimonials', Testimonial::count())
                ->description('Customer reviews')
                ->descriptionIcon('heroicon-o-star')
                ->color('success'),

            Stat::make('Blog Posts', BlogPost::count())
                ->description('Published articles')
                ->descriptionIcon('heroicon-o-newspaper')
                ->color('gray'),

            Stat::make('Inquiries', ContactInquiry::count())
                ->description('Total contact inquiries')
                ->descriptionIcon('heroicon-o-inbox')
                ->color('danger'),

            Stat::make('Ambulance Bookings', Booking::count())
                ->description('Total bookings')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('secondary'),

            Stat::make('Funeral Bookings', FuneralBooking::count())
                ->description('Total funeral bookings')
                ->descriptionIcon('heroicon-o-circle-stack')
                ->color('primary'),

            Stat::make('Pending Bookings', Booking::where('status', 'pending')->count() + FuneralBooking::where('status', 'pending')->count())
                ->description('Awaiting confirmation')
                ->descriptionIcon('heroicon-o-clock')
                ->color('warning'),
        ];
    }
}
