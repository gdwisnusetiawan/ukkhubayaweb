<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
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
     * The contacts that belong to the member.
     */
    public function contacts()
    {
        return $this->belongsToMany('App\Contact')->withPivot('link')->withTimestamps();
    }
}
