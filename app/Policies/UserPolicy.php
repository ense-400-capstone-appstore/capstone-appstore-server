<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use TCG\Voyager\Policies\UserPolicy as VoyagerUserPolicy;

class UserPolicy extends VoyagerUserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine which users are allowed full access to users.
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
     * Determine whether the user can view models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function index(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the user.
     *
     * @param  \App\User  $user
     * @param  \App\AndroidApp  $androidApp
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        return $user->id == $model->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
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
    public function avatarUpload(User $user, User $model)
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
    public function avatarDownload(User $user, User $model)
    {
        return true;
    }

    /**
     * Determine whether the user can get a listing of a user's AndroidApps
     *
     * @param User $user
     * @param User $model
     * @return void
     */
    public function androidApps(User $user, User $model)
    {
        return $user->id == $model->id;
    }
}
