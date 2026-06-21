<?php

namespace App\Filament\Widgets;

use App\Models\ContactInquiry;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentInquiries extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(ContactInquiry::latest()->limit(10))
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('phone'),
                TextColumn::make('subject')->limit(30),
                TextColumn::make('created_at')->dateTime()->label('Date'),
            ]);
    }
}
