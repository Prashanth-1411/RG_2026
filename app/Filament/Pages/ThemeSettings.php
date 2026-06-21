<?php

namespace App\Filament\Pages;

use App\Models\Configuration;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ThemeSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-swatch';
    protected static ?string $navigationLabel = 'Theme Settings';
    protected static ?string $navigationGroup = 'CMS';
    protected static ?int $navigationSort = 2;

    protected static string $view = 'filament.pages.theme-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = Configuration::getGroup('theme');
        $this->form->fill($settings);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Design')
                    ->tabs([
                        Tabs\Tab::make('Colors')
                            ->schema([
                                Grid::make(2)->schema([
                                    ColorPicker::make('primary_color')->label('Primary Color')->default('#0F4CFF'),
                                    ColorPicker::make('secondary_color')->label('Secondary Color')->default('#0F172A'),
                                    ColorPicker::make('accent_color')->label('Accent Color')->default('#F59E0B'),
                                    ColorPicker::make('bg_color')->label('Background Color')->default('#F8FAFC'),
                                    ColorPicker::make('text_color')->label('Text Color')->default('#1E293B'),
                                    ColorPicker::make('heading_color')->label('Heading Color')->default('#0F172A'),
                                ]),
                            ]),
                        Tabs\Tab::make('Typography')
                            ->schema([
                                Grid::make(2)->schema([
                                    Select::make('body_font')->label('Body Font')
                                        ->options([
                                            'Outfit' => 'Outfit',
                                            'Inter' => 'Inter',
                                            'Poppins' => 'Poppins',
                                            'Roboto' => 'Roboto',
                                            'Open Sans' => 'Open Sans',
                                            'Lato' => 'Lato',
                                        ])->default('Outfit'),
                                    Select::make('heading_font')->label('Heading Font')
                                        ->options([
                                            'Cormorant Garamond' => 'Cormorant Garamond',
                                            'Playfair Display' => 'Playfair Display',
                                            'Merriweather' => 'Merriweather',
                                            'Inter' => 'Inter',
                                            'Poppins' => 'Poppins',
                                        ])->default('Cormorant Garamond'),
                                    TextInput::make('body_font_size')->label('Body Font Size (px)')->numeric()->default(16),
                                    TextInput::make('heading_font_size')->label('Heading Font Size (px)')->numeric()->default(32),
                                ]),
                            ]),
                        Tabs\Tab::make('Buttons & Cards')
                            ->schema([
                                Grid::make(2)->schema([
                                    TextInput::make('button_height')->label('Button Height (px)')->numeric()->default(48),
                                    TextInput::make('button_radius')->label('Button Border Radius (px)')->numeric()->default(8),
                                    TextInput::make('button_font_size')->label('Button Font Size (px)')->numeric()->default(14),
                                    Select::make('button_font_weight')->label('Button Font Weight')
                                        ->options([400 => 'Normal', 500 => 'Medium', 600 => 'Semi Bold', 700 => 'Bold'])->default(600),
                                    TextInput::make('card_padding')->label('Card Padding (px)')->numeric()->default(24),
                                    TextInput::make('border_radius')->label('Default Border Radius (px)')->numeric()->default(12),
                                ]),
                            ]),
                        Tabs\Tab::make('Hero')
                            ->schema([
                                Grid::make(2)->schema([
                                    FileUpload::make('hero_background')->label('Hero Background Image')->image()->directory('theme'),
                                    TextInput::make('hero_video')->label('Hero Background Video URL')->helperText('MP4 or YouTube embed URL'),
                                ]),
                            ]),
                        Tabs\Tab::make('Effects')
                            ->schema([
                                Grid::make(2)->schema([
                                    Toggle::make('enable_glassmorphism')->label('Enable Glassmorphism')->default(true),
                                    Toggle::make('enable_dark_mode')->label('Enable Dark Mode')->default(false),
                                    Toggle::make('enable_animations')->label('Enable Animations')->default(true),
                                    Toggle::make('enable_parallax')->label('Enable Parallax Effects')->default(true),
                                    Select::make('animation_speed')->label('Animation Speed')
                                        ->options(['slow' => 'Slow', 'normal' => 'Normal', 'fast' => 'Fast'])->default('normal'),
                                    Select::make('card_style')->label('Card Style')
                                        ->options(['elevated' => 'Elevated Shadow', 'flat' => 'Flat', 'bordered' => 'Bordered'])->default('elevated'),
                                    Select::make('button_style')->label('Button Style')
                                        ->options(['solid' => 'Solid', 'outline' => 'Outline', 'ghost' => 'Ghost'])->default('solid'),
                                    TextInput::make('container_width')->label('Container Width (px)')->numeric()->default(1320),
                                ]),
                            ]),
                    ])->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        foreach ($this->data as $key => $value) {
            Configuration::setValue($key, $value, 'theme');
        }

        \App\Services\ThemeService::clearCache();

        Notification::make()->title('Design settings saved successfully!')->success()->send();
    }

    protected function getFormActions(): array
    {
        return [
            \Filament\Actions\Action::make('save')->label('Save Settings')->action('save')->color('primary'),
        ];
    }
}
