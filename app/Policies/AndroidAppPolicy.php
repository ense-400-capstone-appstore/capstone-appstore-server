<?php

namespace App\Policies;

use App\User;
use App\AndroidApp;
use Illuminate\Auth\Access\HandlesAuthorization;
use TCG\Voyager\Policies\BasePolicy;

class AndroidAppPolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine which users are allowed full access to android apps.
     * @param  \App\User  $user
     * @param  mixed  $ability
     * @return mixed
     */
    public function before($user, $ability)
    {
        if ($user->hasRole('admin')) return true;
    }

    /**
     * Determine whether the user can view the android app.
     *
     * @param  \App\User  $user
     * @param  \App\AndroidApp  $androidApp
     * @return mixed
     */
    public function view(User $user, AndroidApp $androidApp)
    {
        //
    }

    /**
     * Determine whether the user can view the listing of android apps.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function browse(User $user)
    {
        //
    }

    /**
     * Determine whether the user can create android apps.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the android app.
     *
     * @param  \App\User  $user
     * @param  \App\AndroidApp  $androidApp
     * @return mixed
     */
    public function update(User $user, AndroidApp $androidApp)
    {
        //
    }

    /**
     * Determine whether the user can delete the android app.
     *
     * @param  \App\User  $user
     * @param  \App\AndroidApp  $androidApp
     * @return mixed
     */
    public function delete(User $user, AndroidApp $androidApp)
    {
        //
    }

    /**
     * Determine whether the user can restore the android app.
     *
     * @param  \App\User  $user
     * @param  \App\AndroidApp  $androidApp
     * @return mixed
     */
    public function restore(User $user, AndroidApp $androidApp)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the android app.
     *
     * @param  \App\User  $user
     * @param  \App\AndroidApp  $androidApp
     * @return mixed
     */
    public function forceDelete(User $user, AndroidApp $androidApp)
    {
        //
    }
}
