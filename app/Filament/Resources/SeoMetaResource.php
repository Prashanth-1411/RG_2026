<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeoMetaResource\Pages;
use App\Models\SeoMetum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SeoMetaResource extends Resource
{
    protected static ?string $model = SeoMetum::class;

    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass';
    protected static ?string $navigationLabel = 'SEO Manager';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 3;
    protected static ?string $modelLabel = 'SEO Meta';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('page_name')
                ->required()
                ->options([
                    'home' => 'Home',
                    'about' => 'About',
                    'services' => 'Services',
                    'fleet' => 'Fleet',
                    'equipment' => 'Equipment',
                    'mortuary' => 'Mortuary',
                    'gallery' => 'Gallery',
                    'testimonials' => 'Testimonials',
                    'blog' => 'Blog',
                    'contact' => 'Contact',
                    'faq' => 'FAQ',
                ]),
            Forms\Components\TextInput::make('meta_title')->maxLength(255),
            Forms\Components\Textarea::make('meta_description')->rows(3),
            Forms\Components\TextInput::make('meta_keywords'),
            Forms\Components\TextInput::make('og_title')->label('OG Title'),
            Forms\Components\Textarea::make('og_description')->label('OG Description')->rows(2),
            Forms\Components\FileUpload::make('og_image')->image()->directory('seo'),
            Forms\Components\TextInput::make('canonical_url')->url(),
            Forms\Components\Textarea::make('structured_data')->label('Structured Data (JSON-LD)')->rows(4),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page_name')->badge()->searchable(),
                Tables\Columns\TextColumn::make('meta_title')->limit(40),
                Tables\Columns\TextColumn::make('meta_description')->limit(50),
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
            'index' => Pages\ManageSeoMetas::route('/'),
        ];
    }
}
