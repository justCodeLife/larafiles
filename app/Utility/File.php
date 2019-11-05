<?php
/**
 * Created by PhpStorm.
 * User: Ghost
 * Date: 2/1/2019
 * Time: 11:12 PM
 */

namespace App\Utility;


use Carbon\Carbon;

class File
{
    public static function user_can_download($user_id)
    {
        if (!User::is_user_subscribed($user_id)) {
            return false;
        }
        $userItem = \App\User::find($user_id);
        $user_subscribe = $userItem->subscribes()->where('subscribe_expired_at', '>=', Carbon::now())->first();
        if (!$user_subscribe) {
            return false;
        }

        if ($user_subscribe->subscribe_download_count >= $user_subscribe->subscribe_download_limit) {
            return false;
        }
        return true;
    }
}
