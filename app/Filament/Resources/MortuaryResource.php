<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MortuaryResource\Pages;
use App\Filament\Resources\MortuaryResource\RelationManagers;
use App\Models\Mortuary;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MortuaryResource extends Resource
{
    protected static ?string $model = Mortuary::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?string $navigationLabel = 'Mortuary Manager';
    protected static ?string $navigationGroup = 'Services';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('title')->required()->maxLength(255),
                    Forms\Components\TextInput::make('slug')->required()->maxLength(255),
                    Forms\Components\FileUpload::make('image')->image()->maxSize(5120)->imageResizeTargetWidth(1200)->imageResizeMode('cover')->directory('mortuaries'),
                    Forms\Components\TextInput::make('sort_order')->required()->numeric()->default(0),
                ]),
                Forms\Components\Textarea::make('description')->columnSpanFull(),
                Forms\Components\Textarea::make('features')->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')->label('Image'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            'index' => Pages\ManageMortuaries::route('/'),
        ];
    }
}
