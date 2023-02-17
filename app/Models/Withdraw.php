<?php

namespace App\Models;


use App\Models\Cart;
use App\Models\WithdrawDetail;
use App\Models\User;
use App\Models\Department;
use App\Models\Approve;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Withdraw extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[];
    
    //const
    
    protected $fillable = [
        'user_id','department_id','withdraw_num' ,'status', 'withdraw_status' , 
        'approve_mng','approve_spo','spo_user', 'approve_dir',
        'dir_user', 'approve_success', 'pay_user','total' 
         
    ];


    public function withdraw_details()
    {
        return $this->hasMany(WithdrawDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    
    public function approves()
    {
        return $this->hasMany(Approve::class);
    }

}

