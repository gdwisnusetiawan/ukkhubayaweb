<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job', 'information', 'period_id', 'position_id',
    ];

    /**
     * Get the period that owns the management.
     */
    public function period()
    {
        return $this->belongsTo('App\Period');
    }

    /**
     * Get the position that owns the management.
     */
    public function position()
    {
        return $this->belongsTo('App\Position');
    }

    /**
     * The members that belong to the management.
     */
    public function members()
    {
        return $this->belongsToMany('App\Member')->withPivot('role')->withTimestamps();
    }

    /**
     * Get the events for the management.
     */
    public function events()
    {
        return $this->hasMany('App\Event');
    }
}
