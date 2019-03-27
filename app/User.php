<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use TCG\Voyager\Models\User as VoyagerUser;
use Illuminate\Support\Facades\Storage;
use Image;
use App\AndroidApp;
use App\Group;

class User extends VoyagerUser
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the AndroidApps that this user owns
     *
     * @return void
     */
    public function androidApps()
    {
        return $this->belongsToMany('App\AndroidApp', 'user_android_app');
    }

    /**
     * Get the AndroidApps that this user created
     *
     * @return void
     */
    public function createdAndroidApps()
    {
        return $this->hasMany('App\AndroidApp', 'creator_id');
    }

    /**
     * Get the groups that this user belongs to
     *
     * @return void
     */
    public function groups()
    {
        return $this
            ->belongsToMany('App\Group', 'group_user')
            ->using('App\Pivots\GroupUser');
    }

    /**
     * Get the groups that this user created
     *
     * @return void
     */
    public function createdGroups()
    {
        return $this->hasMany('App\Group', 'owner_id');
    }

    /**
     * Get all AndroidApps that are visible to this user
     *
     * @return void
     */
    public function accessibleApps()
    {
        if ($this->isAdmin()) return AndroidApp::select('android_apps.*');

        // Get all android apps
        // JOIN w/ group_android_app and group_user pivot tables for group
        // WHERE either user belongs to the group OR app is not private
        return AndroidApp::select('android_apps.*')
            ->leftJoin(
                'group_android_app',
                'android_apps.id',
                '=',
                'group_android_app.android_app_id'
            )
            ->leftJoin(
                'group_user',
                'group_android_app.group_id',
                '=',
                'group_user.group_id'
            )
            ->leftJoin(
                'user_android_app',
                'android_apps.id',
                '=',
                'user_android_app.android_app_id'
            )
            ->where('group_user.user_id', $this->id)
            ->orWhere('user_android_app.user_id', $this->id)
            ->orWhere('private', false)
            ->distinct();
    }

    /**
     * Get all AndroidApps created by a user that are visible to this user
     *
     * @param [type] $user
     * @return void
     */
    public function accessibleCreatedApps($user)
    {
        if ($user->id == $this->id) return $this->createdAndroidApps();

        return $this->accessibleApps()
            ->where('creator_id', $user->id)
            ->distinct();
    }

    /**
     * Get all AndroidApps in a given category that are visible to this user
     *
     * @param [type] $category
     * @return void
     */
    public function accessibleCategoryApps($category)
    {
        return $this->accessibleApps()->leftJoin(
            'category_android_app',
            'android_apps.id',
            '=',
            'category_android_app.android_app_id'
        )
            ->where('category_android_app.category_id', $category->id)
            ->distinct();
    }

    public function accessibleGroupApps($group)
    {
        return $this->accessibleApps()
            ->leftJoin(
                'group_android_app',
                'android_apps.id',
                '=',
                'group_android_app.android_app_id'
            )
            ->where('group_android_app.group_id', $group->id)
            ->distinct();
    }

    /**
     * Get all groups that are visible to this user
     *
     * @return void
     */
    public function accessibleGroups()
    {
        if ($this->isAdmin()) return Group::select('groups.*');

        return Group::select('groups.*')
            ->leftJoin(
                'group_user',
                'groups.id',
                '=',
                'group_user.group_id'
            )
            ->where('user_id', $this->id)
            ->orWhere('private', false)
            ->distinct();
    }

    /**
     * Return true if user's role is "admin"
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    /**
     * Return true if user's role is "vendor"
     *
     * @return boolean
     */
    public function isVendor()
    {
        return $this->hasRole('vendor');
    }

    /**
     * Return true if user's role is "admin" or "vendor"
     *
     * @return boolean
     */
    public function isAdminOrVendor()
    {
        return $this->hasRole('vendor') || $this->hasRole('admin');
    }

    /**
     * Set the avatar for this user
     *
     * @var Illuminate\Http\UploadedFile $avatar
     */
    public function setAvatar($avatar)
    {
        $path = "users/{$this->id}/avatar.jpg";
        $avatarResized = Image::make($avatar)->fit(256)->encode('jpg');

        Storage::disk('public')->put($path, $avatarResized);

        $this->avatar = $path;
        $this->save();
    }

    /**
     * Get this user's avatar
     */
    public function getAvatar()
    {
        return Storage::disk('public')->get($this->avatar);
    }
}
