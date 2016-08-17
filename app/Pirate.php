<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pirate extends Model
{
    public function ship()
    {
        return $this->belongsTo('App\Ship');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }



}
