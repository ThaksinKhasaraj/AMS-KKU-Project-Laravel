<?php

namespace App\Models;

use App\Models\Withdraw;
use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WithdrawDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        
        'withdraw_id','material_id','amount','checkout_amount','note'
        
    ];

    public function material(){

        return $this->belongsTo(Material::class, 'material_id');
    }

    public function withdraw(){

        return $this->belongsTo(Withdraw::class, 'withdraw_id' );
    }
   
}
