<?php

namespace Morpheusadam\Anypay;

use Illuminate\Support\ServiceProvider;

class AnypayServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('anypay', function ($app) {
            return new Anypay();
        });
    }

    /**
     * Bootstrap any application services.
    
     * @return void
     */
    public function boot()
    {
        // Here you can bootstrap your package services.
    }
}
