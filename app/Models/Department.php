<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Profile;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[];

    protected $fillable =[
        'dept_nmae' , 'manager_nmae' ,  'dept_address'
    ];


    public function users(){
           
        return $this->hasMany(User::class , 'user_id');
    }

    public function profile(){
           
        return $this->hasMany(Profile::class , 'user_id');
    }

    public function withdraws(){
           
        return $this->hasMany(Withdraw::class);
    }
    

    
}
