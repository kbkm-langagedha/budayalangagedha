<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        Blade::component('admin.components.modal', 'modal');
        Blade::component('admin.components.btn-submit-form', 'btn-submit-form');
        Blade::component('admin.components.form-section', 'form-section');
        Blade::component('admin.components.toast', 'toast');
    }
}
