<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = 'Bookings';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Customer Information')->schema([
                Forms\Components\TextInput::make('name')->required()->maxLength(255),
                Forms\Components\TextInput::make('phone')->tel()->required()->maxLength(255),
            ])->columns(2),
            Forms\Components\Section::make('Trip Details')->schema([
                Forms\Components\TextInput::make('pickup')->maxLength(255),
                Forms\Components\TextInput::make('destination')->maxLength(255),
                Forms\Components\Select::make('service_type')->options([
                    'ambulance' => 'Ambulance',
                    'funeral' => 'Funeral',
                ]),
                Forms\Components\Select::make('booking_type')->options([
                    'emergency' => 'Emergency',
                    'scheduled' => 'Scheduled',
                    'transfer' => 'Transfer',
                ]),
                Forms\Components\TextInput::make('service_name')->maxLength(255),
                Forms\Components\DatePicker::make('booking_date'),
                Forms\Components\Textarea::make('notes')->columnSpanFull(),
            ])->columns(2),
            Forms\Components\Section::make('Management')->schema([
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('ip_address')->maxLength(255)->disabled(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('phone')->searchable(),
                Tables\Columns\TextColumn::make('booking_type')->badge(),
                Tables\Columns\TextColumn::make('pickup')->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('destination')->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('service_name')->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('booking_date')->date()->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'confirmed' => 'info',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
                Tables\Filters\SelectFilter::make('booking_type'),
                Tables\Filters\SelectFilter::make('service_type'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBookings::route('/'),
        ];
    }
}
