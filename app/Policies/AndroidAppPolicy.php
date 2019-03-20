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
        if ($user->isAdmin()) return true;
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
        return $user->isAdminOrVendor();
    }

    /**
     * Determine whether the user can store android apps.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function store(User $user)
    {
        return $user->isAdminOrVendor();
    }

    /**
     * Determine whether the user can edit the android app.
     *
     * @param  \App\User  $user
     * @param  \App\AndroidApp  $model
     * @return mixed
     */
    public function edit(User $user, AndroidApp $model)
    {
        // The creator can edit the app
        if ($user->id == $model->creator_id) return true;

        return false;
    }

    /**
     * Determine whether the user can update the android app.
     *
     * @param  \App\User  $user
     * @param  \App\AndroidApp  $model
     * @return mixed
     */
    public function update(User $user, AndroidApp $model)
    {
        // The creator can update the app
        if ($user->id == $model->creator_id) return true;

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
        return $user->id == $model->creator_id;
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
        // The owner can download the file
        if ($user->id == $model->creator_id) return true;

        // Users who own the app can download the file
        if ($user->androidApps->pluck('id')->contains($model->id)) {
            return true;
        }

        return false;
    }
}
