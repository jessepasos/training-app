<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    /**
     * A ship belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A user has many pirates in their inventory
     */
    public function ships()
    {
        return $this->hasMany(Pirate::class);
    }
}
