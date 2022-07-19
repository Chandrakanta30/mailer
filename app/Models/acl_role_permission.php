<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class acl_role_permission extends Model
{
    use HasFactory;
    public function acl_role()
    {
        return $this->belongsTo(acl_role::class);
    }
    public function acl_permission()
    {
        return $this->belongsTo(acl_permission::class);
    }
}
