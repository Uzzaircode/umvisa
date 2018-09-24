<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use Auth;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer('backend.partials.header', function ($view) {
        //     $view->with('user', Auth::user());
        // });
        Blade::component('components.cards.dynamic', 'dynamicCard');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
