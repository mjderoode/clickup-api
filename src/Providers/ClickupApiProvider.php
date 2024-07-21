<?php

namespace Mjderoode\ClickupApi\Providers;

use Illuminate\Support\ServiceProvider;

class ClickupApiProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('clickup-api.php'),
        ], 'clickup-api-config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php',
            'clickup-api'
        );
    }
}
