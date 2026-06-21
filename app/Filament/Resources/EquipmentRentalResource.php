<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EquipmentRentalResource\Pages;
use App\Models\EquipmentRental;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class EquipmentRentalResource extends Resource
{
    protected static ?string $model = EquipmentRental::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationLabel = 'Equipment Rental Manager';
    protected static ?string $navigationGroup = 'Services';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->maxLength(255)->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),
                Forms\Components\TextInput::make('slug')->required()->maxLength(255),
                Forms\Components\FileUpload::make('image')->image()->directory('equipment'),
                Forms\Components\TextInput::make('price')->numeric()->prefix('$'),
                Forms\Components\Toggle::make('is_available'),
                Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                Forms\Components\Textarea::make('description'),
                Forms\Components\Textarea::make('features'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('slug')->searchable(),
                Tables\Columns\TextColumn::make('price')->money()->sortable(),
                Tables\Columns\IconColumn::make('is_available')->boolean(),
                Tables\Columns\TextColumn::make('sort_order')->numeric()->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->headerActions([CreateAction::make()])
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
            'index' => Pages\ManageEquipmentRentals::route('/'),
        ];
    }
}
