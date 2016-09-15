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
        'user_id', 'name', 'level', 'current_health', 'current_cannons'
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
    public function crew()
    {
        return $this->hasMany(Pirate::class);
    }


    public function levelDetails()
    {
        return $this->hasOne(ShipLevel::class, 'id', 'level');
    }

    public function getCrewMemberByRank($rank){
        try {
            return $this->crew()->where('rank_id',$rank)->first()->name;    
        } catch (\Exception $e) {
            return "Not Assigned";
        }
    }

    public function captain()
    {
        return $this->getCrewMemberByRank(1);
    }

    public function getCrewSize(){
        return $this->crew->count();
    }

    public function getRemainingCapacity(){
        return $this->levelDetails->max_crew - $this->getCrewSize();
    }

    public function getCrewSalt(){
        return $this->crew->sum('saltiness')+0;
    }

    public function getOtherCrew(){
        return $this->crew->where('rank_id', NULL)->count() + 0;
    }

}
