<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FleetCategoryResource\Pages;
use App\Models\FleetCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class FleetCategoryResource extends Resource
{
    protected static ?string $model = FleetCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Services';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Grid::make(2)->schema([
                Forms\Components\TextInput::make('name')->required()->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),
                Forms\Components\TextInput::make('slug')->required(),
                Forms\Components\FileUpload::make('image')->image()->maxSize(5120)->imageResizeTargetWidth(1200)->imageResizeMode('cover')->directory('fleet-categories'),
                Forms\Components\Select::make('type')->options(['fleet' => 'Fleet', 'mortuary' => 'Mortuary']),
                Forms\Components\TextInput::make('icon')->helperText('Bootstrap icon name'),
                Forms\Components\TextInput::make('subtitle')->label('Sub Heading'),
                Forms\Components\Toggle::make('status')->default(true),
                Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
            ]),
            Forms\Components\Textarea::make('description')->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('image_url')->label('Image'),
            Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('type')->badge(),
            Tables\Columns\IconColumn::make('status')->boolean(),
            Tables\Columns\TextColumn::make('sort_order')->sortable(),
        ])->defaultSort('sort_order')
          ->headerActions([CreateAction::make()])
          ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
          ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ManageFleetCategories::route('/')];
    }
}
