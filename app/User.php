<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'treasure',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A user belongs to a port
     */
    public function port()
    {
        return $this->belongsTo(Port::class);
    }

    /**
     * A user has many pirates in their inventory
     */
    public function pirates()
    {
        return $this->hasMany(Pirate::class);
    }

    /**
     * A user has many ships
     */
    public function ships()
    {
        return $this->hasMany(Ship::class);
    }
}
