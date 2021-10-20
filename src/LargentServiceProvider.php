<?php

namespace Laragrad\Largent;

use Illuminate\Support\ServiceProvider;

class LargentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/', 'laragrad/largent');
        $this->mergeConfigFrom(__DIR__.'/../config/largent.php', 'laragrad.largent');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        
        // lang
        $this->publishes([
            __DIR__.'/../resources/lang/' => resource_path('lang/vendor/laragrad/largent'),
        ], 'lang');

        // config
        $this->publishes([
            __DIR__.'/../config/largent.php' => config_path('laragrad/largent.php'),
        ], 'config');
        
        // migrations
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations'),
        ], 'migrations');
        
    }
}