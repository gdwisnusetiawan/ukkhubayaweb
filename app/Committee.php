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
}
