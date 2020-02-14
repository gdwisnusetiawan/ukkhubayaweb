<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'icon', 'order',
    ];

    /**
     * Get the managements for the position.
     */
    public function managements()
    {
        return $this->hasMany('App\Management');
    }

    /**
     * Get the committess for the position.
     */
    public function committees()
    {
        return $this->hasMany('App\Committee');
    }
}
