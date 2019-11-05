<?php

namespace App;

use App\Models\Package;
use App\Models\Payment;
use App\Models\Subscribe;
use App\Models\UserPackage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const USER = 1;
    const ADMIN = 2;

    use Notifiable;

//    protected $table='';
//    protected $primaryKey='id';


//
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];

    protected $guarded = ['role'];

    protected $hidden = [
        'password', 'remember_token',
    ];

//    public $timestamps=false;
//for updated at and created at :)

//    public const CREATED_AT = '';
//    public const UPDATED_AT = '';

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'payment_user_id');
    }

    public function subscribes()
    {
        return $this->hasMany(Subscribe::class, 'subscribe_user_id');
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'user_packages', 'user_id', 'package_id');
    }

}
