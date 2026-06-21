<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Models\TeamMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('Team Member')->tabs([
                Forms\Components\Tabs\Tab::make('Details')->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('name')->required()->maxLength(255),
                        Forms\Components\TextInput::make('designation')->maxLength(255),
                        Forms\Components\TextInput::make('email')->email()->maxLength(255),
                        Forms\Components\TextInput::make('phone')->tel()->maxLength(255),
                        Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                        Forms\Components\Toggle::make('status')->default(true),
                    ]),
                    Forms\Components\Textarea::make('bio')->columnSpanFull(),
                    Forms\Components\Textarea::make('description')->columnSpanFull(),
                ]),
                Forms\Components\Tabs\Tab::make('Photo')->schema([
                    Forms\Components\FileUpload::make('image')->image()->directory('team'),
                ]),
                Forms\Components\Tabs\Tab::make('Social Media')->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('facebook')->prefix('facebook.com/'),
                        Forms\Components\TextInput::make('twitter')->prefix('twitter.com/'),
                        Forms\Components\TextInput::make('linkedin')->prefix('linkedin.com/in/'),
                        Forms\Components\TextInput::make('instagram')->prefix('instagram.com/'),
                    ]),
                ]),
            ])->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->circular(),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('designation')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('phone')->searchable(),
                Tables\Columns\IconColumn::make('status')->boolean()->sortable(),
                Tables\Columns\TextColumn::make('sort_order')->numeric()->sortable(),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('status'),
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
            'index' => Pages\ManageTeamMembers::route('/'),
        ];
    }
}
