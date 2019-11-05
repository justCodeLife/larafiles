<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $guarded = ['subscribe_id'];
    protected $dates = ['subscribe_expired_at'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'subscribe_user_id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class,'subscribe_plan_id');
    }

}
