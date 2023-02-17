<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Category;
use App\Models\User;

use App\Models\Withdraw;
use App\Models\WithdrawDetail;



class Material extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[];
    //const
    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;


    protected $fillable = [

        'category_id',
        'user_id',
        'mateID', 
        'mate_name',
        'mate_amount', 
        'mate_price', 
        'mate_unit', 
        'mate_detail',
        'mate_status',
        'mate_note',
        'mateImage'

    ];

    

    public function category(){
           
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


}
