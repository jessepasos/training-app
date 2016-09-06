<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pirate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'ship_id', 'name', 'rank'
    ];

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
