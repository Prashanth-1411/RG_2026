<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use App\Models\ServiceCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationLabel = 'Service Manager';
    protected static ?string $navigationGroup = 'Services';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('Service')->tabs([
                Forms\Components\Tabs\Tab::make('Details')->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),
                        Forms\Components\TextInput::make('slug')->required(),
                        Forms\Components\Select::make('service_type')
                            ->options(['ambulance' => 'Ambulance', 'funeral' => 'Funeral'])
                            ->required(),
                        Forms\Components\Select::make('category_id')
                            ->label('Category')
                            ->options(ServiceCategory::pluck('name', 'id')),
                        Forms\Components\TextInput::make('icon')->helperText('Bootstrap icon name e.g. truck'),
                        Forms\Components\Toggle::make('is_featured'),
                        Forms\Components\Toggle::make('status')->default(true),
                        Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                    ]),
                    Forms\Components\TextInput::make('short_description')->maxLength(255),
                    Forms\Components\RichEditor::make('description')->columnSpanFull(),
                ]),
                Forms\Components\Tabs\Tab::make('Media')->schema([
                    Forms\Components\FileUpload::make('image')->image()->maxSize(2048)->imageResizeTargetWidth(1200)->imageResizeMode('cover')->directory('services'),
                    Forms\Components\FileUpload::make('banner_image')->image()->maxSize(2048)->imageResizeTargetWidth(1920)->imageResizeMode('cover')->directory('services/banners'),
                ]),
                Forms\Components\Tabs\Tab::make('Features')->schema([
                    Forms\Components\Repeater::make('features')
                        ->relationship()
                        ->schema([
                            Forms\Components\TextInput::make('feature')->required(),
                            Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                        ])
                        ->orderColumn('sort_order')
                        ->defaultItems(0),
                ]),
                Forms\Components\Tabs\Tab::make('SEO')->schema([
                    Forms\Components\TextInput::make('meta_title'),
                    Forms\Components\Textarea::make('meta_description')->rows(3),
                    Forms\Components\TextInput::make('meta_keywords'),
                ]),
            ])->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')->label('Image'),
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('service_type')->badge(),
                Tables\Columns\IconColumn::make('is_featured')->boolean(),
                Tables\Columns\IconColumn::make('status')->boolean(),
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
            'index' => Pages\ManageServices::route('/'),
        ];
    }
}
