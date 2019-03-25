<?php

namespace App\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GroupUser extends Pivot
{
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function androidApps()
    {
        return $this->hasManyThrough('App\AndroidApp', 'App\Group');
    }
}
