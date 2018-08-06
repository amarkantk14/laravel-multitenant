<?php

namespace App\Providers;

use App\Observers\UserObserver;
use App\User;
use Illuminate\Support\ServiceProvider;
use Orchestra\Support\Facades\Tenanti;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(new UserObserver);

        Tenanti::connection('tenants', function (User $entity, array $config) {
            $db_prefix = config('database.db_prefix');
            $config['database'] = $db_prefix."_user_{$entity->id}";

            return $config;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }
}
