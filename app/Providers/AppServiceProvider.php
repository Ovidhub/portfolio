<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Force HTTPS links in production for correct canonical/OG URLs.
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Make site settings available to every view as $settings.
        View::composer('*', function ($view) {
            if (Schema::hasTable('site_settings')) {
                $view->with('settings', SiteSetting::current());
            } else {
                $view->with('settings', new SiteSetting);
            }
        });
    }
}
