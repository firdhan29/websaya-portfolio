<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as BaseAuth;

class CustomLogin extends BaseAuth
{
    protected static string $view = 'filament.pages.auth.custom-login';

    public function form(\Filament\Forms\Form $form): \Filament\Forms\Form
    {
        return $form
            ->schema([
                $this->getEmailFormComponent()->label('ALAMAT EMAIL')->placeholder('nama@email.com'),
                $this->getPasswordFormComponent()->label('KATA SANDI')->placeholder('••••••••')->hint(filament()->hasPasswordReset() ? new \Illuminate\Support\HtmlString(\Illuminate\Support\Facades\Blade::render('<x-filament::link :href="filament()->getRequestPasswordResetUrl()" class="text-[#6366f1] hover:text-[#4f46e5] text-xs font-bold">LUPA SANDI?</x-filament::link>')) : null),
                $this->getRememberFormComponent()->label('Ingat Saya'),
            ])
            ->statePath('data');
    }
}
