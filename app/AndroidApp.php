<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Image;
use App\User;
use App\Scopes\ApprovedScope;

class AndroidApp extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'version',
        'description',
        'price',
        'avatar',
        'package_name',
        'creator_id',
        'private',
        'approved',
    ];

    /**
     * The booting method of the model
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ApprovedScope);
    }

    /**
     * Get the user that created this AndroidApp
     *
     * @return void
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }

    /**
     * Get the users that own this AndroidApp
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_android_app');
    }

    /**
     * Return the categories that this AndroidApp belongs to
     *
     * @return void
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_android_app');
    }

    /**
     * Return the groups that this AndroidApp belongs to
     *
     * @return void
     */
    public function groups()
    {
        return $this
            ->belongsToMany('App\Group', 'group_android_app')
            ->using('App\Pivots\GroupAndroidApp');
    }

    /**
     * Set the avatar for this user
     *
     * @var Illuminate\Http\UploadedFile $avatar
     */
    public function setAvatar($avatar)
    {
        $path = "android_apps/{$this->id}/avatar.jpg";
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

    /**
     * Set the file for this AndroidApp
     *
     * @var Illuminate\Http\UploadedFile $file
     */
    public function setFile($file)
    {
        $path = "android_apps/{$this->id}";
        $fileName = "{$this->id}-{$this->version}.apk";

        $filePath = Storage::disk('local')->putFileAs($path, $file, $fileName);

        $this->file = $filePath;
        $this->save();
    }

    /**
     * Get this AndroidApp's file
     */
    public function getFile()
    {
        if ($this->file == '') return;

        return Storage::disk('local')->download($this->file, null, [
            'Content-Type' => 'application/vnd.android.package-archive'
        ]);
    }

    /**
     * Add this AndroidApp to a user (i.e., the user 'owns' this AndroidApp)
     *
     * @param User $user
     * @return void
     */
    public function addToUser(User $user)
    {
        return $user->androidApps()->attach($this);
    }

    /**
     * Remove this AndroidApp from a user (i.e., the user no longer
     * 'owns' this AndroidApp)
     *
     * @param User $user
     * @return void
     */
    public function removeFromUser(User $user)
    {
        return $user->androidApps()->detach($this);
    }
}
