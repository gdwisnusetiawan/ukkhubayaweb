<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year_begin', 'year_end',
    ];

    /**
     * Get the managements for the period.
     */
    public function managements()
    {
        return $this->hasMany('App\Management');
    }

    /**
     * Get the formatted name for the period.
     */
    public static function name()
    {
        return $this->year_begin.' / '.$this->year_end;
    }
}
