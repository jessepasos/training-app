<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pirate extends Model
{
    /**
     * A pirate belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A pirate belongs to a ship
     */
    public function pirate()
    {
        return $this->belongsTo(Pirate::class);
    }
}
