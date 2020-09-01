<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    protected $guarded = [];
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function roleHasPermission($permission_slug){
        foreach($this->permissions as $role_permissions){
            if($role_permissions->slug==$permission_slug){
                return true;
                break;
            }
        }
    }
}
