<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class FormInputServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Form Open Components
        Blade::component('components.form.form-open','form');
        // Form Card Components
        Blade::component('components.cards.card', 'card');
        Blade::component('components.cards.card-header', 'cardHeader');
        Blade::component('components.cards.card-body','cardBody');
        Blade::component('components.cards.card-options', 'cardOptions');

        // Form Input Components
        Blade::component('components.form.form-group', 'formGroup');

        // Table Components
        Blade::component('components.tables.table', 'table');        
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
