<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pirate extends Model
{
    protected $attributes = [
        'name' => 'Default',
        'rank' => 'Cook',
        'attributes' => 'totally average',
        'ship_id' => 1,
    ];

    public function ship()
    {
        return $this->belongsTo('App\Ship');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
