<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    // protected $table = '';
    protected $primaryKey = 'plan_id';
    protected $guarded = ['plan_id'];
    public $timestamps = false;

    public function subscribes()
    {
        return $this->hasMany(Subscribe::class,'subscribe_plan_id');
    }

}
