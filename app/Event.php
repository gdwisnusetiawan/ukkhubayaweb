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
     * Get the management that owns the event.
     */
    public function management()
    {
        return $this->belongsTo('App\Management');
    }

    /**
     * Get the program that owns the event.
     */
    public function program()
    {
        return $this->belongsTo('App\Program');
    }
}
