<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'icon',
    ];

    /**
     * The members that belong to the contact.
     */
    public function members()
    {
        return $this->belongsToMany('App\Member')->withPivot('link')->withTimestamps();
    }
}
