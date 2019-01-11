<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
        User::observe(UserObserver::class);
        AndroidApp::observe(AndroidAPpObserver::class);
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
