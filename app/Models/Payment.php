<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Payment extends Model
{
    protected $guarded = ['payment_id'];
    public const CREATED_AT = 'payment_created_at';
    public const UPDATED_AT = 'payment_updated_at';

    public const ONLINE = 1;
    public const WALLET = 2;

    public const COMPLETE = 1;
    public const INCOMPLETE = 2;

    public function user()
    {
        return $this->belongsTo(User::class, 'payment_user_id');
    }

    public function payment_method_format()
    {
        switch ($this->attributes['payment_method']) {
            case self::ONLINE:
                return 'آنلاین';
                break;

            case self::WALLET:
                return 'کیف پول';
                break;
        }
    }

}
