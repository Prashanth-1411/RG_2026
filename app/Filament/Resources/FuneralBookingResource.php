<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FuneralBookingResource\Pages;
use App\Models\FuneralBooking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FuneralBookingResource extends Resource
{
    protected static ?string $model = FuneralBooking::class;

    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';
    protected static ?string $navigationGroup = 'Bookings';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Customer Information')->schema([
                Forms\Components\TextInput::make('customer_name')->required()->maxLength(255),
                Forms\Components\TextInput::make('phone')->tel()->required()->maxLength(255),
                Forms\Components\TextInput::make('email')->email()->maxLength(255),
                Forms\Components\Textarea::make('address'),
            ])->columns(2),
            Forms\Components\Section::make('Service Details')->schema([
                Forms\Components\Select::make('service_type')
                    ->options([
                        'cremation' => 'Cremation',
                        'burial' => 'Burial',
                        'memorial' => 'Memorial Service',
                        'transport' => 'Body Transport',
                        'embalming' => 'Embalming',
                        'other' => 'Other',
                    ]),
                Forms\Components\TextInput::make('deceased_name')->maxLength(255),
                Forms\Components\DatePicker::make('service_date'),
                Forms\Components\Textarea::make('special_requests'),
            ])->columns(2),
            Forms\Components\Section::make('Management')->schema([
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('admin_notes'),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('phone')->searchable(),
                Tables\Columns\TextColumn::make('service_type')->badge(),
                Tables\Columns\TextColumn::make('service_date')->date()->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'confirmed' => 'info',
                        'in_progress' => 'primary',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
                Tables\Filters\SelectFilter::make('service_type'),
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageFuneralBookings::route('/'),
        ];
    }
}
