<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class acl_roles extends Role
{
    use HasFactory;
    public function acl_permissions()
    {
        return $this->belongsToMany(acl_permission::class,'acl_role_permissions','role_id','permission_id');
    }
    
    
}
