<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class FooterSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';
    protected static ?string $navigationLabel = 'Footer Settings';
    protected static ?string $navigationGroup = 'CMS';
    protected static ?int $navigationSort = 4;

    protected static string $view = 'filament.pages.theme-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $settings = Setting::firstOrCreate(['id' => 1]);
        $this->form->fill($settings->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Footer Settings')->tabs([
                    Tabs\Tab::make('General')->schema([
                        Grid::make(2)->schema([
                            FileUpload::make('logo')->label('Logo')->image()->maxSize(5120)->imageResizeTargetWidth(300)->imageResizeMode('contain')->directory('logos'),
                            FileUpload::make('favicon')->label('Favicon')->image()->maxSize(5120)->imageResizeTargetWidth(64)->imageResizeMode('contain')->directory('favicons'),
                            TextInput::make('company_name')->label('Company Name')->required(),
                            TextInput::make('tagline')->label('Tagline'),
                        ]),
                        Grid::make(1)->schema([
                            Textarea::make('footer_description')->label('Footer Description')->rows(3)->helperText('Shown below the logo in footer'),
                            TextInput::make('footer_text')->label('Footer Copyright Text'),
                        ]),
                    ]),
                    Tabs\Tab::make('Contact')->schema([
                        Grid::make(2)->schema([
                            TextInput::make('phone_primary')->label('Primary Phone')->tel(),
                            TextInput::make('phone_secondary')->label('Secondary Phone')->tel(),
                            TextInput::make('phone_office')->label('Office Phone')->tel(),
                            TextInput::make('whatsapp')->label('WhatsApp Number'),
                            TextInput::make('email')->label('Email')->email(),
                            TextInput::make('address')->label('Address'),
                            TextInput::make('city')->label('City'),
                            TextInput::make('state')->label('State'),
                            TextInput::make('pincode')->label('Pincode'),
                            Textarea::make('map_embed')->label('Google Maps Embed')->rows(3),
                        ]),
                    ]),
                    Tabs\Tab::make('Social Media')->schema([
                        Grid::make(2)->schema([
                            TextInput::make('facebook')->label('Facebook URL')->url()->prefix('https://'),
                            TextInput::make('twitter')->label('Twitter URL')->url()->prefix('https://'),
                            TextInput::make('instagram')->label('Instagram URL')->url()->prefix('https://'),
                            TextInput::make('linkedin')->label('LinkedIn URL')->url()->prefix('https://'),
                            TextInput::make('youtube')->label('YouTube URL')->url()->prefix('https://'),
                        ]),
                    ]),
                    Tabs\Tab::make('SEO')->schema([
                        Grid::make(1)->schema([
                            TextInput::make('meta_keywords')->label('Meta Keywords')->placeholder('ambulance, funeral, medical transport')->maxLength(300),
                            Textarea::make('meta_description')->label('Meta Description')->rows(4)->maxLength(300)->helperText('Maximum 300 characters'),
                        ]),
                    ]),
                ])->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $settings = Setting::firstOrCreate(['id' => 1]);
        $settings->update($this->data);

        Notification::make()->title('Footer settings saved successfully!')->success()->send();
    }

    protected function getFormActions(): array
    {
        return [
            \Filament\Actions\Action::make('save')->label('Save Footer Settings')->action('save')->color('primary'),
        ];
    }
}
