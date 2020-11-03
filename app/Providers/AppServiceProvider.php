<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        Schema::defaultStringLength(191);
        View::share('key', 'value');
        if(env('REDIRECT_HTTPS'))
        {
            $url->forceScheme('https');
        }
    }
}
