<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    protected $guarded=['user_package_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
