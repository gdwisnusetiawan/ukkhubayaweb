<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ManagementMember extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'management_member';

    public static function getEnumValues(){
        $type = DB::select(DB::raw('SHOW COLUMNS FROM management_member WHERE Field = "role"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();
        foreach(explode(',', $matches[1]) as $value){
            $values[] = trim($value, "'");
        }
        return $values;
    }
}
