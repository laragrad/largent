<?php

namespace Laragrad\Largent\Providers;

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
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang/', 'laragrad/largent');
        $this->mergeConfigFrom(__DIR__ . '/../resources/config/largent.php', 'laragrad.largent');

        // lang
        $this->publishes([
            __DIR__ . '/../resources/lang/' => resource_path('lang/vendor/laragrad/largent')
        ], 'largent');

        // config
        $this->publishes([
            __DIR__ . '/../resources/config/largent.php' => config_path('laragrad/largent.php')
        ], 'largent');

        // migrations
        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations')
        ], 'largent');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\Laragrad\Largent\Services\OperationService::class, function ($app) {
            return new \Laragrad\Largent\Services\OperationService();
        });

        $this->app->singleton(\Laragrad\Largent\Services\EntryService::class, function ($app) {
            return new \Laragrad\Largent\Services\EntryService();
        });
    }
}