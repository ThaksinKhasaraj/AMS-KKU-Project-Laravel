<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Withdraw;
use App\Models\Material;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    //use SoftDeletes;
    protected $guarded =[];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [

        'department_id',
        'name',
        'email',
        'password',
        'role',
        'emp_position',
        'emp_type',
        'emp_phone',
        'line_id',
        'emp_note',
        'signatureImage'
      
    ];
    
    public function department(){
        return $this->belongsTo(Department::class);
        }

    public function carts(){
        return $this->hasMany(Cart::class);
        }
    
    public function withdraws(){
        return $this->hasMany(Withdraw::class);
        }

    public function materials(){
        return $this->hasMany(Material::class, 'material_id');
        }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
