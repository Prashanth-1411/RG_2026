<?php

namespace App\Filament\Pages;

use App\Models\Configuration;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class SiteSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Homepage Manager';
    protected static ?string $navigationGroup = 'CMS';
    protected static ?int $navigationSort = 3;

    protected static string $view = 'filament.pages.theme-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = Configuration::getGroup('content');
        $this->form->fill($settings);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Content')->tabs([
                    Tabs\Tab::make('General')->schema([
                        Grid::make(2)->schema([
                            TextInput::make('site_name')->label('Site Name')->required(),
                            TextInput::make('site_tagline')->label('Tagline'),
                            TextInput::make('site_description')->label('Site Description'),
                            TextInput::make('footer_text')->label('Footer Copyright Text'),
                        ]),
                    ]),
                    Tabs\Tab::make('Home Page')->schema([
                        Grid::make(2)->schema([
                            TextInput::make('hero_title')->label('Hero Title')->default('Your Trusted Medical & Funeral Service Partner'),
                            Textarea::make('hero_subtitle')->label('Hero Subtitle')->rows(3),
                            TextInput::make('hero_cta_text')->label('Hero CTA Button Text')->default('Our Services'),
                            TextInput::make('hero_cta_link')->label('Hero CTA Link')->default('/services'),
                            TextInput::make('hero_cta_secondary_text')->label('Secondary CTA Text')->default('Contact Us'),
                            TextInput::make('hero_cta_secondary_link')->label('Secondary CTA Link')->default('/contact'),
                        ]),
                        Grid::make(1)->schema([
                            Textarea::make('hero_video_url')->label('Hero Background Video URL')->helperText('YouTube or MP4 URL'),
                        ]),
                    ]),
                    Tabs\Tab::make('About Page')->schema([
                        Grid::make(2)->schema([
                            TextInput::make('about_title')->label('Title'),
                            Textarea::make('about_subtitle')->label('Subtitle')->rows(3),
                            Textarea::make('about_description')->label('Description')->rows(5),
                            TextInput::make('about_mission_title')->label('Mission Title'),
                            Textarea::make('about_mission_text')->label('Mission Text')->rows(3),
                            TextInput::make('about_vision_title')->label('Vision Title'),
                            Textarea::make('about_vision_text')->label('Vision Text')->rows(3),
                        ]),
                    ]),
                    Tabs\Tab::make('Services Page')->schema([
                        Grid::make(2)->schema([
                            TextInput::make('services_title')->label('Page Title')->default('Our Services'),
                            Textarea::make('services_subtitle')->label('Page Subtitle')->rows(2),
                            TextInput::make('services_cta_text')->label('CTA Text'),
                        ]),
                    ]),
                    Tabs\Tab::make('Contact Page')->schema([
                        Grid::make(2)->schema([
                            TextInput::make('contact_title')->label('Page Title'),
                            Textarea::make('contact_subtitle')->label('Page Subtitle')->rows(2),
                            TextInput::make('contact_phone')->label('Phone Number'),
                            TextInput::make('contact_whatsapp')->label('WhatsApp Number'),
                            TextInput::make('contact_email')->label('Email'),
                            Textarea::make('contact_address')->label('Address')->rows(3),
                            Textarea::make('contact_map_embed')->label('Google Maps Embed URL')->rows(2),
                        ]),
                    ]),
                    Tabs\Tab::make('Sections')->schema([
                        Repeater::make('sections')
                            ->label('Homepage Sections')
                            ->schema([
                                TextInput::make('name')->label('Section Name')->required(),
                                Toggle::make('enabled')->label('Enabled')->default(true),
                                TextInput::make('sort_order')->label('Order')->numeric()->default(0),
                            ])
                            ->defaultItems(0)
                            ->addActionLabel('Add Section'),
                    ]),
                ])->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        foreach ($this->data as $key => $value) {
            Configuration::setValue($key, $value, 'content');
        }

        \App\Services\ThemeService::clearCache();

        Notification::make()->title('Site content saved!')->success()->send();
    }

    protected function getFormActions(): array
    {
        return [
            \Filament\Actions\Action::make('save')->label('Save Content')->action('save')->color('primary'),
        ];
    }
}
