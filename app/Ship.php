<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{

    protected $attributes = [
        'name' => 'Default Ship Name',
//        'pirates' => NULL,
    ];

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

    public function name()
    {
        return $this->name;

    }
}
