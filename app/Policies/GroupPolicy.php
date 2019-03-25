<?php

namespace App\Policies;

use App\User;
use App\Group;
use Illuminate\Auth\Access\HandlesAuthorization;
use TCG\Voyager\Policies\BasePolicy;

class GroupPolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine which users are allowed full access to groups.
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
     * Determine whether the user can view all groups
     *
     * @param User $user
     * @return void
     */
    public function index(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the group.
     *
     * @param  \App\User  $user
     * @param  \App\Group  $group
     * @return mixed
     */
    public function view(User $user, Group $group)
    {
        // The owner can view their group
        if ($user->id === $group->owner_id) return true;

        // Users who are members of the group can view the group
        return $user->groups->pluck('id')->contains($group->id);
    }

    /**
     * Determine whether the user can create groups.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdminOrVendor();
    }

    /**
     * Determine whether the user can update the group.
     *
     * @param  \App\User  $user
     * @param  \App\Group  $group
     * @return mixed
     */
    public function update(User $user, Group $group)
    {
        return $user->id === $group->owner_id;
    }

    /**
     * Determine whether the user can delete the group.
     *
     * @param  \App\User  $user
     * @param  \App\Group  $group
     * @return mixed
     */
    public function delete(User $user, Group $group)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the group.
     *
     * @param  \App\User  $user
     * @param  \App\Group  $group
     * @return mixed
     */
    public function restore(User $user, Group $group)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the group.
     *
     * @param  \App\User  $user
     * @param  \App\Group  $group
     * @return mixed
     */
    public function forceDelete(User $user, Group $group)
    {
        return false;
    }
}
