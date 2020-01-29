<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * The primary key is not auto increment.
     *
     * @var array
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
