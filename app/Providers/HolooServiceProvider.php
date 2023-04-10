<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HolooServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('holoo', 'App\Services\Holoo');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
