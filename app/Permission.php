<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        
    ];


    /**
     * Finds a specific permission
     * @param String $permission
     * @return \App\Permission
     * @return  boolean
     */
    static function getPermission(String $permission){
        $permissions = Permission::all();
            
        for($i = 0; $i < count($permissions); $i++){
            if($permissions[$i]->name === $permission)
                return $permissions[$i];
        }

        return false;
    }


}
