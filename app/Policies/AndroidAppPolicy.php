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
     *
     * @param  \App\User  $user
     * @param  mixed  $ability
     * @return mixed
     */
    public function before($user, $ability)
    {
        if ($user->hasRole('admin')) return true;
    }

    /**
     * Determine whether the user can view all android apps.
     *
     * @param  \App\User  $user
     * @param  \App\AndroidApp  $androidApp
     * @return mixed
     */
    public function index(User $user)
    {
        return true;
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
        return true;
    }

    /**
     * Determine whether the user can create android apps.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
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
        return false;
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
        return false;
    }

    /**
     * Determine whether the user can set an avatar.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function setAvatar(User $user, AndroidApp $model)
    {
        return $user->id == $model->id;
    }

    /**
     * Determine whether the user can get an avatar.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function getAvatar(User $user, AndroidApp $model)
    {
        return true;
    }

    /**
     * Determine whether the user can set a file.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function setFile(User $user, AndroidApp $model)
    {
        return $user->id == $model->id;
    }

    /**
     * Determine whether the user can get a file.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function getFile(User $user, AndroidApp $model)
    {
        // TODO: Only the owner and users who have this AndroidApp associated
        // with their model (i.e., they "purchased" the app) may access the file
        // First need to implement many to many relationship between User
        // and AndroidApp
        return $user->id == $model->id;
    }
}
