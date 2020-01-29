<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'color',
    ];

    public function members()
    {
        return $this->hasMany('App\Member');
    }

    public static function colors()
    {
    	return [
    		'primary',
    		'secondary',
    		'info',
    		'success',
    		'warning',
    		'danger',
    		'black',
    		'gray-dark',
    		'gray',
    		'light',
    		'indigo',
    		'lightblue',
    		'navy',
    		'purple',
    		'fuchsia',
    		'pink',
    		'maroon',
    		'orange',
    		'lime',
    		'teal',
    		'olive',
    	];
    }
}
