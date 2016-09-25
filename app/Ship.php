<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'captain',
        'displacement',
        'length',
        'draft',
        'saltiness',
        'cannons',
        'rank',
    ];

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
