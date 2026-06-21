<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityLogResource\Pages;
use App\Models\ActivityLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ActivityLogResource extends Resource
{
    protected static ?string $model = ActivityLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 5;
    protected static ?string $slug = 'activity-logs';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Activity Details')->schema([
                Forms\Components\TextInput::make('action')->required(),
                Forms\Components\TextInput::make('module'),
                Forms\Components\Textarea::make('description'),
                Forms\Components\TextInput::make('ip_address')->label('IP Address'),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('User'),
                Forms\Components\TextInput::make('created_at')->label('Date')->disabled(),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('action')->badge()->sortable()->searchable(),
                Tables\Columns\TextColumn::make('module')->badge()->sortable(),
                Tables\Columns\TextColumn::make('description')->limit(50)->searchable(),
                Tables\Columns\TextColumn::make('user.name')->label('User')->toggleable(),
                Tables\Columns\TextColumn::make('ip_address')->label('IP')->toggleable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('action'),
                Tables\Filters\SelectFilter::make('module'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivityLogs::route('/'),
        ];
    }
}
