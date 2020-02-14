<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommitteeMember extends Model
{
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
