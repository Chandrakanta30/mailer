<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminLogin extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];
    public function roles()
    {
        return $this->belongsTo(acl_roles::class,'roleid');
    }

}
