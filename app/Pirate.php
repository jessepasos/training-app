<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pirate extends Model
{
    public function ship(){
        return $this->belongsTo('App\Ship');
    }
//    //
//    public function ship()
//    {
//        return $this->hasOne('App\Ship');
//    }

}
