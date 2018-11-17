<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AndroidAppPermission extends Model
{
    /**
     * The attributes that are mass assignable .
     *
     * @var array
     */
    protected $fillable = [
        'available'
    ];

    public function androidApp()
    {
        return $this->belongsTo('App\AndroidApp');
    }
}
