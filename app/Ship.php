<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    //
    public function pirate()
    {
        return $this->belongsTo('App\Pirate');
    }

}
