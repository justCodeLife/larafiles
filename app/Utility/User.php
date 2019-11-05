<?php
/**
 * Created by PhpStorm.
 * User: Ghost
 * Date: 2/1/2019
 * Time: 5:03 PM
 */

namespace App\Utility;


use App\Models\Subscribe;
use Carbon\Carbon;

class User
{
    public static function is_user_subscribed($user_id = null): bool
    {
        $user = \App\User::find($user_id);
        if (!$user) {
            return false;
        }
        $user_subscribe = $user->subscribes()->where('subscribe_expired_at', '>=', Carbon::now())->first();
        return !empty($user_subscribe) && ($user_subscribe instanceof Subscribe);
    }
}
