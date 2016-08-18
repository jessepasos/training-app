<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    public function isAdmin()
    {
        return $this->admin; // this looks for an admin column in your users table
    }

    public function pirates()
    {
        return $this->hasMany('App\Pirate');
    }

    public function ships()
    {
        return $this->hasMany('App\Ship');
    }

    public function seaports()
    {
        return $this->hasMany('App\Seaport');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
