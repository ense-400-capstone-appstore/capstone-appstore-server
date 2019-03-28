<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

use App\User;
use App\AndroidApp;
use App\Group;

use App\Observers\UserObserver;
use App\Observers\AndroidAppObserver;
use App\Observers\GroupObserver;

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
        Group::observe(GroupObserver::class);

        // Component aliases
        Blade::component('components.button', 'button');
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
