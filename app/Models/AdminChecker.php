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
        if($this->status==0){
            $action='';
             $action='<a href="'.route('mailrequest.accept',$this->id).'" class="btn btn-success btn-sm">Accept</a>';
            $action.= '<a href="'.route('mailrequest.reject',$this->id).'" class="btn btn-danger btn-sm">Accept</a>';
            return $action;
        }elseif($this->status==1){
            return 'Accepted';
        }else{
            return 'Rejected';
        }
        
    }
}
