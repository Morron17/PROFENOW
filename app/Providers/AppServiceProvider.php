<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public const HOME = '/redirect-by-role';

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    if (app()->environment('production')) {
        URL::forceScheme('https');
    }
}
}
}
