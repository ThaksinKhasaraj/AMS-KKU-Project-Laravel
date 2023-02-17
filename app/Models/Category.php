<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Material;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
   
    protected $guarded =[];
    protected $fillable = [
        'cate_name'
    ];

    public function materials(){
        return $this->hasMany(Material::class, 'material_id');
    }

    


    
}
