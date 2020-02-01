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
}
