<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{

    public function pirates()
    {
        return $this->hasMany('App\Pirate');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function seaport()
    {
        return $this->belongsTo('App\Seaport');
    }

}
