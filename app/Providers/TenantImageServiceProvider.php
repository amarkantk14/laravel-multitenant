<?php

namespace App\Providers;

use App\Helpers\TenantImage;
use Illuminate\Support\ServiceProvider;

class TenantImageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('tImage', 'App\Helpers\TenantImage');
    }
}
