<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as BaseAuth;

class CustomLogin extends BaseAuth
{

    public function getHeading(): string | \Illuminate\Contracts\Support\Htmlable | null
    {
        return new \Illuminate\Support\HtmlString('
            <style>
                body {
                    background: linear-gradient(-45deg, #fbcfe8, #c7d2fe, #e0e7ff, #ede9fe) !important;
                    background-size: 400% 400% !important;
                    animation: gradientBG 15s ease infinite !important;
                }
                @keyframes gradientBG {
                    0% { background-position: 0% 50%; }
                    50% { background-position: 100% 50%; }
                    100% { background-position: 0% 50%; }
                }
                .fi-simple-main-ctn {
                    backdrop-filter: blur(20px) !important;
                    background-color: rgba(255, 255, 255, 0.7) !important;
                    border-radius: 1rem !important;
                    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25) !important;
                    padding: 2rem !important;
                    border: 1px solid rgba(255, 255, 255, 0.5) !important;
                }
            </style>
            <div class="text-3xl font-extrabold tracking-tight text-gray-900 mt-4 mb-1">
                Selamat Datang!
            </div>
        ');
    }

    public function getSubheading(): string | \Illuminate\Contracts\Support\Htmlable | null
    {
        return 'Masuk untuk memulai atau mengelola portofolio Anda.';
    }

    public function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->components([
                $this->getEmailFormComponent()->label('ALAMAT EMAIL')->placeholder('nama@email.com'),
                $this->getPasswordFormComponent()->label('KATA SANDI')->placeholder('••••••••')->hint(filament()->hasPasswordReset() ? new \Illuminate\Support\HtmlString(\Illuminate\Support\Facades\Blade::render('<x-filament::link :href="filament()->getRequestPasswordResetUrl()" class="text-[#6366f1] hover:text-[#4f46e5] text-xs font-bold">LUPA SANDI?</x-filament::link>')) : null),
                $this->getRememberFormComponent()->label('Ingat Saya'),
            ])
            ->statePath('data');
    }

    protected function getAuthenticateFormAction(): \Filament\Actions\Action
    {
        return parent::getAuthenticateFormAction()
            ->label('MASUK SEKARANG');
    }
}
