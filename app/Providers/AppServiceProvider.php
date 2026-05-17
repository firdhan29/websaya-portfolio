<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);

        // Security & Optimization: Force strict mode for models (prevents N+1, mass assignment, and lazy loading bugs)
        \Illuminate\Database\Eloquent\Model::shouldBeStrict(! $this->app->isProduction());

        // Max Security: Force HTTPS for all URLs in production
        if ($this->app->environment('production')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }
}
