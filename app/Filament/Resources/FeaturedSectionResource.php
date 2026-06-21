<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeaturedSectionResource\Pages;
use App\Models\FeaturedSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Table;

class FeaturedSectionResource extends Resource
{
    protected static ?string $model = FeaturedSection::class;
    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Grid::make(2)->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\TextInput::make('icon')->helperText('Bootstrap icon name'),
                Forms\Components\Select::make('section_type')->options(['feature' => 'Feature', 'service' => 'Service']),
                Forms\Components\Toggle::make('status')->default(true),
                Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
            ]),
            Forms\Components\Textarea::make('description')->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('section_type')->badge(),
            Tables\Columns\IconColumn::make('status')->boolean(),
            Tables\Columns\TextColumn::make('sort_order')->sortable(),
        ])->defaultSort('sort_order')
          ->headerActions([CreateAction::make()])
          ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
          ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ManageFeaturedSections::route('/')];
    }
}
