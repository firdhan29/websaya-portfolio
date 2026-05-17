<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as BaseAuth;

class CustomLogin extends BaseAuth
{

    public function getHeading(): string | \Illuminate\Contracts\Support\Htmlable | null
    {
        return new \Illuminate\Support\HtmlString('
            <style>
                main {
                    background: linear-gradient(-45deg, #fbcfe8, #c7d2fe, #e0e7ff, #ede9fe) !important;
                    background-size: 400% 400% !important;
                    animation: gradientBG 15s ease infinite !important;
                }
                @keyframes gradientBG {
                    0% { background-position: 0% 50%; }
                    50% { background-position: 100% 50%; }
                    100% { background-position: 0% 50%; }
                }
                /* Target the main simple page card */
                .fi-simple-main-ctn > div {
                    backdrop-filter: blur(16px) saturate(180%) !important;
                    -webkit-backdrop-filter: blur(16px) saturate(180%) !important;
                    background-color: rgba(255, 255, 255, 0.65) !important;
                    border: 1px solid rgba(255, 255, 255, 0.5) !important;
                    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15) !important;
                    border-radius: 1.5rem !important;
                    transform: translateY(0);
                    transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1) !important;
                    animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards !important;
                }
                .fi-simple-main-ctn > div:hover {
                    transform: translateY(-5px) scale(1.01) !important;
                    box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.2) !important;
                }
                @keyframes slideUp {
                    from { opacity: 0; transform: translateY(30px); }
                    to { opacity: 1; transform: translateY(0); }
                }
                /* Button animation */
                .fi-btn-primary {
                    transition: all 0.3s ease !important;
                }
                .fi-btn-primary:hover {
                    transform: scale(1.03) !important;
                    box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.4) !important;
                }
                /* Logo glow */
                .fi-logo {
                    filter: drop-shadow(0 4px 6px rgba(99, 102, 241, 0.3)) !important;
                    transition: transform 0.3s ease !important;
                }
                .fi-logo:hover {
                    transform: scale(1.05) !important;
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
