<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Material;
use App\Models\Category;
use App\Models\Withdraw;
use App\Models\WithdrawDetail;
use App\Models\Department;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','department_id',
        'withdraw_id','withdraw_detail_id', 
        
         
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function withdraws()
    {
        return $this->hasMany(Withdraw::class);
    }

    public function withdraw_details()
    {
        return $this->hasMany(WithdrawDetail::class);
    }

}

