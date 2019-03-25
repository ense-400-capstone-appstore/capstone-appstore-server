<?php

namespace App\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GroupAndroidApp extends Pivot
{
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function androidApp()
    {
        return $this->belongsTo('App\AndroidApp');
    }

    public function users()
    {
        return $this->hasManyThrough('App\User', 'App\Group');
    }
}
