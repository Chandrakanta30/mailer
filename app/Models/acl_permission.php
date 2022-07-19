<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class acl_permission extends Model
{
    use HasFactory;
    public function acl_roles()
    {
        return $this->belongsToMany(acl_role_permission::class);
    }
}
