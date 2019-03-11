<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Return the AndroidApps that belong to this category
     *
     * @return void
     */
    public function androidApps()
    {
        return $this->belongsToMany('App\AndroidApp', 'category_android_app');
    }
}
