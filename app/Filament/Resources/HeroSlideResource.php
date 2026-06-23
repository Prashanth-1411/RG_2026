<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroSlideResource\Pages;
use App\Filament\Resources\HeroSlideResource\RelationManagers;
use App\Models\HeroSlide;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroSlideResource extends Resource
{
    protected static ?string $model = HeroSlide::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Homepage Slides';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('subtitle')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('badge_text')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\FileUpload::make('image')
                    ->image()->maxSize(2048)->imageResizeTargetWidth(1920)->imageResizeMode('cover'),
                Forms\Components\TextInput::make('video')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('button_text')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('button_link')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('button_text_2')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('button_link_2')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('badge_text')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image_url')->label('Image'),
                Tables\Columns\TextColumn::make('video')
                    ->searchable(),
                Tables\Columns\TextColumn::make('button_text')
                    ->searchable(),
                Tables\Columns\TextColumn::make('button_link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('button_text_2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('button_link_2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
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
            'index' => Pages\ManageHeroSlides::route('/'),
        ];
    }
}
