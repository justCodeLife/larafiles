<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\UserSubscribed;
use App\Models\Plan;
use App\Models\Subscribe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
    public function index(Request $request, $plan_id)
    {
        $plan = Plan::find($plan_id);
        return view('frontend.subscribe.index', compact('plan'));
    }

    public function register(Request $request, $plan_id)
    {
        $plan = Plan::find($plan_id);
        if (!$plan) {
            return redirect()->back()->with('planError', 'طرح مورد نظر وجود ندارد');
        }
        $expire_at = Carbon::now()->addDays($plan->plan_days_count);
        $user = Auth::user();
        $subscribeData = [
            'subscribe_user_id' => $user->id,
            'subscribe_plan_id' => $plan_id,
            'subscribe_download_limit' => $plan->plan_limit_download_count,
            'subscribe_created_at' => Carbon::now(),
            'subscribe_expired_at' => $expire_at
        ];
        $subscribe = Subscribe::create($subscribeData);
        Mail::to($user)->send(new UserSubscribed($subscribe));
//        Mail::to($user)->later(Carbon::now()->addMinutes(15), new UserSubscribed($subscribe));
    }
}
