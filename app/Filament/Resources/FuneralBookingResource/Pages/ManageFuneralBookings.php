<?php

namespace App\Filament\Resources\FuneralBookingResource\Pages;

use App\Filament\Resources\FuneralBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageFuneralBookings extends ManageRecords
{
    protected static string $resource = FuneralBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
