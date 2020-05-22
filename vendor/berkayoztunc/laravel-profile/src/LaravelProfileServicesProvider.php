<?php

namespace Berkayoztunc\LaravelProfile;

use Illuminate\Support\ServiceProvider;

class LaravelProfileServicesProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'profile');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadTranslationsFrom(__DIR__.'/lang', 'profileLang');
        $this->publishes([
            __DIR__.'/config/profile.php' => config_path('profile.php')
        ], 'config');
        $this->publishes([
            __DIR__.'/migrations/' => database_path('migrations')
        ], 'migrations');
        $this->publishes([
            __DIR__.'/views' => resource_path('views')
        ], 'views');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app['config']->get('profile') === null) {
            $this->app['config']->set('profile', require __DIR__.'/config/profile.php');
        }

        include __DIR__.'/routes.php';
        $this->app->make('Berkayoztunc\LaravelProfile\LaravelProfileController');
    }
}
