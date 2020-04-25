<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CommitteeMember extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'committee_member';

    public static function getEnumValues(){
        $type = DB::select(DB::raw('SHOW COLUMNS FROM committee_member WHERE Field = "role"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();
        foreach(explode(',', $matches[1]) as $value){
            $values[] = trim($value, "'");
        }
        return $values;
    }
}
