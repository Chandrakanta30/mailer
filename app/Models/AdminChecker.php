<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminChecker extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['action','view'];
    public function getViewAttribute()
    {
        return '<a href="'.route('adminchecker.edit',$this->id).'" class="btn btn-info btn-sm">View</a>';
    }

    public function getActionAttribute()
    {
        return '<a href="'.route('adminchecker.edit',$this->id).'" class="btn btn-primary btn-sm">Edit</a>';
    }
}
