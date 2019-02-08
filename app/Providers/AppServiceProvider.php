<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

use App\User;
use App\AndroidApp;

use App\Observers\UserObserver;
use App\Observers\AndroidAppObserver;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Observers
        User::observe(UserObserver::class);
        AndroidApp::observe(AndroidAppObserver::class);
        //limit string length see: https://laravel-news.com/laravel-5-4-key-too-long-error
        //Schema::defaultStringLength(191);
        // Component aliases
        Blade::component('components.linkbutton', 'linkbutton');
        Blade::component('components.card', 'card');
        Blade::component('components.textfield', 'textfield');
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
