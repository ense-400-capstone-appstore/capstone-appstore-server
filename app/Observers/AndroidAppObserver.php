<?php

namespace App\Observers;

use App\AndroidApp;
use Auth;

class AndroidAppObserver
{
    /**
     * Handle the android app "created" event.
     *
     * @param  \App\AndroidApp  $androidApp
     * @return void
     */
    public function created(AndroidApp $androidApp)
    {
        // Set the app's creator to the current user on creation
        if (Auth::user()) {
            $androidApp->creator()->associate(Auth::user());
            $androidApp->save();
        }
    }

    /**
     * Handle the android app "updated" event.
     *
     * @param  \App\AndroidApp  $androidApp
     * @return void
     */
    public function updated(AndroidApp $androidApp)
    {
        //
    }

    /**
     * Handle the android app "deleting" event.
     *
     * @param  \App\AndroidApp  $androidApp
     * @return void
     */
    public function deleting(AndroidApp $androidApp)
    {
        //
    }

    /**
     * Handle the android app "deleted" event.
     *
     * @param  \App\AndroidApp  $androidApp
     * @return void
     */
    public function deleted(AndroidApp $androidApp)
    {
        //
    }

    /**
     * Handle the android app "restored" event.
     *
     * @param  \App\AndroidApp  $androidApp
     * @return void
     */
    public function restored(AndroidApp $androidApp)
    {
        //
    }

    /**
     * Handle the android app "force deleted" event.
     *
     * @param  \App\AndroidApp  $androidApp
     * @return void
     */
    public function forceDeleted(AndroidApp $androidApp)
    {
        //
    }
}
