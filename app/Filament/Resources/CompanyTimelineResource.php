<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyTimelineResource\Pages;
use App\Models\CompanyTimeline;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Table;

class CompanyTimelineResource extends Resource
{
    protected static ?string $model = CompanyTimeline::class;
    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Grid::make(2)->schema([
                Forms\Components\TextInput::make('year')->required()->maxLength(20),
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\Toggle::make('status')->default(true),
                Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
            ]),
            Forms\Components\Textarea::make('description')->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('year')->sortable(),
            Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
            Tables\Columns\IconColumn::make('status')->boolean(),
            Tables\Columns\TextColumn::make('sort_order')->sortable(),
        ])->defaultSort('sort_order')
          ->headerActions([CreateAction::make()])
          ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
          ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ManageCompanyTimelines::route('/')];
    }
}
