<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use TCG\Voyager\Models\User as VoyagerUser;
use Illuminate\Support\Facades\Storage;
use Image;

class User extends VoyagerUser
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
