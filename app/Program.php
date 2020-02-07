<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'logo',
    ];

    /**
     * Get the events for the program.
     */
    public function events()
    {
        return $this->hasMany('App\Event');
    }
}
