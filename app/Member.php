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

    public static function getEnumValues(){
        $type = DB::select(DB::raw('SHOW COLUMNS FROM members WHERE Field = "type"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();
        foreach(explode(',', $matches[1]) as $value){
            $values[] = trim($value, "'");
        }
        return $values;
    }

    /**
     * The faculty that owns the member.
     */
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

    /**
     * The committees that belong to the member.
     */
    public function committees()
    {
        return $this->belongsToMany('App\Committee')->withPivot('role')->withTimestamps();
    }

    /**
     * The contacts that belong to the member.
     */
    public function contacts()
    {
        return $this->belongsToMany('App\Contact')->withPivot('link')->withTimestamps();
    }

    /**
     * Get the user that owns the member.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function managementPermission($positions)
    {
        $active = $this->managements->contains(function ($item, $key) {
            return $item->isActive();
        });
        $role = $this->managements->contains(function ($item, $key) use ($positions){
            return $item->position->whereIn('name', $positions)->get()->isNotEmpty();
        });
        return $active && $role;
    }

    public function committeePermission($positions)
    {
        $active = $this->committees->contains(function ($item, $key) {
            return $item->event->isActive();
        });
        $role = $this->committees->contains(function ($item, $key) use ($positions){
            return $item->position->whereIn('name', $positions)->get()->isNotEmpty();
        });
        return $this->managementPermission($positions) || ($active && $role);
    }
}
