<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */


    public function boot()
{
    Blade::if('canDo', function ($resource, $action) {
        return auth()->check() &&
               auth()->user()->hasPermission($resource, $action);
    });
}
}
