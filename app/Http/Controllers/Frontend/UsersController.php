<?php

namespace App\Http\Controllers\Frontend;

use App\Events\UserRegistered;
use App\Jobs\SendEmailNotify;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function login()
    {
        return view('frontend.users.login');
    }

    public function doLogin(Request $request)
    {
        $remember = $request->has('remember');
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember)) {
            $user = Auth::user();
            $job = (new SendEmailNotify($user))->onQueue('emails');
            $job->delay(Carbon::now()->addMinutes(15));
            dispatch($job);
            return redirect()->route('home');
        }
        return redirect()->back()->with('loginError', 'ایمیل یا رمز عبور اشتباه می باشد');
    }

    public function register()
    {
        return view('frontend.users.register');
    }

    public function doRegister(Request $request)
    {
        $newUserData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        $newUser = User::create($newUserData);
        if ($newUser && $newUser instanceof User) {
            event(new UserRegistered($newUser));
            return redirect()->route('home')->with('registerSuccess', 'ثبت نام شما با موفقیت انجام شد');
        }
        return redirect()->back()->with('registerError', 'ثبت نام ناموفق بود');
    }

    public function dashboard()
    {

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

}
