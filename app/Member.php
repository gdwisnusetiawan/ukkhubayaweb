<?php

namespace App;

use Illuminate\Support\Facades\DB;
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

    public function faculty()
    {
        return $this->belongsTo('App\Faculty');
    }

    /**
     * The managements that belong to the member.
     */
    public function managements()
    {
        return $this->belongsToMany('App\Management')->withPivot('role')->withTimestamps();
    }

    public static function getEnumValues(){
        $type = DB::select(DB::raw('SHOW COLUMNS FROM members WHERE Field = "type"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();
        foreach(explode(',', $matches[1]) as $value){
            $values[] = trim($value, "'");
        }
        return $values;
    }
}
