<?php

namespace App\Models;

use App\Models\Material;
use App\Models\User;
use App\Models\Department;
use App\Models\CartDetail;
use App\Models\Withdraw;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    protected $fillable = [
        'user_id','status'
    ];


    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' );
    }

    public function department()
    {
        return $this->belongsTo(Department::class , 'department_id' );
    }

    public function materials(){
        return $this->hasMany(Material::class, 'material_id');
    }
   
  
    // public function withdraw(){
    //     return $this->belongsTo(Withdraw::class, 'Withdraw_id');
    // }



   

}
