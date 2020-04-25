<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Get the period that owns the management.
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    /**
     * Get the position that owns the management.
     */
    public function position()
    {
        return $this->belongsTo('App\Position');
    }

    /**
     * The members that belong to the committee.
     */
    public function members()
    {
        return $this->belongsToMany('App\Member')->withPivot('role')->withTimestamps();
    }

    /**
     * Get the committeeMember for the committee.
     */
    public function committeeMember(Member $member = null)
    {
        if($member != null)
        {
            return $this->hasMany('App\CommitteeMember')->where('member_id', $member->id)->get()->first();
        }
        else
        {
            return $this->hasMany('App\CommitteeMember');
        }
    }
}
