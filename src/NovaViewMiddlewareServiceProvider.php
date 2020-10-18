<?php

namespace Vitorhugodotpt\NovaViewMiddleware;

use Illuminate\Support\ServiceProvider;

class NovaViewMiddlewareServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Register the main class to use with the facade
        $this->app->singleton('nova-view-middleware', function () {
            return new NovaViewMiddleware;
        });
    }
}
