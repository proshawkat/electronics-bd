<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\View;

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
        View::composer(['frontend.partials.header', 'frontend.partials.footer'], function ($view) {
            $settings = cache()->remember('general_settings', 3600, function () {
                return GeneralSetting::first();
            });
            $view->with('generalSettings', $settings);
        });
    }
}
