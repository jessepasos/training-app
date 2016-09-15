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
        'user_id', 'ship_id', 'name', 'rank_id', 'saltiness'
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
    public function ship()
    {
        return $this->belongsTo(Ship::class);
    }

    /**
     * A pirate is assigned a rank
     */
    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public function getRankName()
    {
        if ($this->rank) {
            return $this->rank->name;
        }

        return "Unassigned";

    }
}
