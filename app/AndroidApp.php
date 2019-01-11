<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AndroidApp extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'name',
        'version',
        'description',
        'price',
        'avatar',
    ];

    public function androidAppPermission()
    {
        return $this->hasOne('App\AndroidAppPermission');
    }
}
