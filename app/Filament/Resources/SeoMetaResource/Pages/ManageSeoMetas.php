<?php

namespace App\Filament\Resources\SeoMetaResource\Pages;

use App\Filament\Resources\SeoMetaResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSeoMetas extends ManageRecords
{
    protected static string $resource = SeoMetaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
