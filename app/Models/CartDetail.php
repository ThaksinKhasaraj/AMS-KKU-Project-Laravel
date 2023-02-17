<?php

namespace App\Models;

use App\Models\Material;
use App\Models\Cart;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CartDetail extends Model
{
    use HasFactory;
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    protected $fillable = [
        'cart_id','material_id','amount','status'
    ];

    // public function carts(){
    //     return $this->hasMany(Cart::class ,'cart_id');
    // }

    // public function material(){
    //     return $this->belongsTo(Material::class, 'material_id');
    // }

    // public function users()
    // {
    //     return $this->hasMany(User::class ,  'cart_id');
    // }
    // public function withdraws(){
    //     return $this->hasMany(Withdraw::class, 'Withdraw_id');
    // }


}
