<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FleetResource\Pages;
use App\Models\Fleet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class FleetResource extends Resource
{
    protected static ?string $model = Fleet::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationLabel = 'Fleet Manager';
    protected static ?string $navigationGroup = 'Services';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Grid::make(2)->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),
                Forms\Components\TextInput::make('slug')->required(),
                Forms\Components\FileUpload::make('image')->image()->directory('fleet'),
                Forms\Components\TextInput::make('category')->required(),
                Forms\Components\Toggle::make('is_available')->default(true),
                Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
            ]),
            Forms\Components\Textarea::make('description')->rows(4)->columnSpanFull(),
            Forms\Components\KeyValue::make('specifications')
                ->label('Specifications')
                ->keyLabel('Label')
                ->valueLabel('Value')
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category'),
                Tables\Columns\IconColumn::make('is_available')->boolean(),
                Tables\Columns\TextColumn::make('sort_order')->sortable(),
            ])
            ->defaultSort('sort_order')
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
            'index' => Pages\ManageFleets::route('/'),
        ];
    }
}
