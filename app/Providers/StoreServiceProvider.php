<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
class StoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Store::observe(new StoreObserver);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
