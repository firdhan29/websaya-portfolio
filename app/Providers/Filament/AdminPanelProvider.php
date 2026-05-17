<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(\App\Filament\Pages\Auth\CustomLogin::class)
            ->colors([
                'primary' => Color::Indigo,
                'gray' => Color::Slate,
            ])
            ->font('Inter')
            ->sidebarFullyCollapsibleOnDesktop()
            ->spa() // Enables Single Page Application mode with page transition animations!
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
            ])
            ->navigationItems([
                \Filament\Navigation\NavigationItem::make('Lihat Website')
                    ->url(fn (): string => url('/'))
                    ->icon('heroicon-o-globe-alt')
                    ->sort(100)
                    ->openUrlInNewTab(),
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->renderHook(
                \Filament\View\PanelsRenderHook::HEAD_END,
                fn (): string => \Illuminate\Support\Facades\Blade::render('
                    <style>
                        /* Animated Login UI */
                        .fi-simple-main { 
                            animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; 
                            opacity: 0; 
                            transform: translateY(30px) scale(0.95);
                        }
                        .fi-simple-page {
                            background: radial-gradient(circle at 50% -20%, rgba(99,102,241,0.15) 0%, rgba(15,23,42,1) 100%) !important;
                        }
                        .fi-simple-main-ctn > div {
                            backdrop-filter: blur(20px);
                            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.6), inset 0 1px 0 rgba(255,255,255,0.1);
                            border: 1px solid rgba(255, 255, 255, 0.05);
                            border-radius: 1.5rem;
                            overflow: hidden;
                            position: relative;
                        }
                        .fi-simple-main-ctn > div::before {
                            content: "";
                            position: absolute;
                            top: 0; left: 0; right: 0; height: 4px;
                            background: linear-gradient(90deg, #6366f1, #a855f7, #ec4899);
                        }
                        .fi-btn {
                            transition: all 0.3s ease;
                        }
                        .fi-btn:hover {
                            transform: translateY(-2px);
                            box-shadow: 0 10px 20px -10px rgba(99,102,241,0.5);
                        }
                        @keyframes slideUp { 
                            to { opacity: 1; transform: translateY(0) scale(1); } 
                        }
                    </style>
                '),
            );
    }
}
