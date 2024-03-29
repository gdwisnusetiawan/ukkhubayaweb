<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
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
     * Get the formatted name for the event.
     */
    public function name()
    {
        return $this->program->name.' '.$this->year;
    }

    /**
     * Get the period that owns the event.
     */
    public function period()
    {
        return $this->belongsTo('App\Period');
    }

    /**
     * Get the program that owns the event.
     */
    public function program()
    {
        return $this->belongsTo('App\Program');
    }

    /**
     * Get the committess for the event.
     */
    public function committees()
    {
        return $this->hasMany('App\Committee');
    }

    public function isActive()
    {
        return $this->period->active == 'yes';
    }
}
