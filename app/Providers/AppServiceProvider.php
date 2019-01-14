<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

use App\User;
use App\AndroidApp;

use App\Observers\UserObserver;
use App\Observers\AndroidAppObserver;

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
        AndroidApp::observe(AndroidAPpObserver::class);

        // Component aliases
        Blade::component('components.button', 'button');
        Blade::component('components.card', 'card');
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
