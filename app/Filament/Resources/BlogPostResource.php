<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostResource\Pages;
use App\Filament\Resources\BlogPostResource\RelationManagers;
use App\Models\BlogPost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Blog';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('content')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('excerpt')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('featured_image')
                    ->image()->maxSize(2048)->imageResizeTargetWidth(1200)->imageResizeMode('cover'),
                Forms\Components\FileUpload::make('image')
                    ->image()->maxSize(2048)->imageResizeTargetWidth(1200)->imageResizeMode('cover'),
                Forms\Components\TextInput::make('category_id')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('tags')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('author')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('reading_time')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('views')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('meta_title')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('meta_description')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_featured')
                    ->required(),
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
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('featured_image_url')->label('Featured'),
                Tables\Columns\ImageColumn::make('image_url')->label('Image'),
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tags')
                    ->searchable(),
                Tables\Columns\TextColumn::make('author')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reading_time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('views')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('meta_title')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
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
            'index' => Pages\ManageBlogPosts::route('/'),
        ];
    }
}
