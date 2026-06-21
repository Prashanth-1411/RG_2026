<?php

namespace App\Filament\Pages\Auth;

use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Pages\Auth\Login as BaseLogin;

class Login extends BaseLogin
{
    protected static string $view = 'vendor.filament.pages.auth.login';

    public function authenticate(): ?LoginResponse
    {
        try {
            $this->rateLimit(5);
        } catch (\DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException $exception) {
            $this->getRateLimitedNotification($exception)?->send();

            return null;
        }

        $data = $this->form->getState();

        // Avoid remember_token DB write issues on some MySQL setups
        if (! \Filament\Facades\Filament::auth()->attempt($this->getCredentialsFromFormData($data), false)) {
            $this->throwFailureValidationException();
        }

        $user = \Filament\Facades\Filament::auth()->user();

        if (
            ($user instanceof \Filament\Models\Contracts\FilamentUser) &&
            (! $user->canAccessPanel(\Filament\Facades\Filament::getCurrentPanel()))
        ) {
            \Filament\Facades\Filament::auth()->logout();
            $this->throwFailureValidationException();
        }

        session()->regenerate();

        return app(LoginResponse::class);
    }
}
