<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Models\Package;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller

{
    //method 1 admin page prevent auth
//    public function __construct()
//    {
//        if (!Auth::check()) {
//            Redirect::to('/')->send();
//        }
//    }

    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'))->with(['panel_title' => 'لیست کاربران']);
    }

    public function create()
    {
        return view('admin.user.create')->with(['panel_title' => 'ثبت کاربر جدید']);
    }

    public function store(UserRequest $userRequest)
    {

//        $this->validate(request(),[
//           'name'=>'required',
//            'email'=>'required|email',
//            'password'=>'required|min:6|max:12'
//        ],[
//            'name.required'=>'لطفا نام را وارد کنید',
//            'email.required'=>'لطفا ایمیل را وارد  کنید',
//            'email.email'=>'ایمیل معتبر نمی باشد',
//            'password.required'=>'لطفا رمز عبور را وارد کنید',
//            'password.min'=>'تعداد رقم های رمز کمتر از حد مجاز می باشد',
//            'password.max'=>'تعداد رقم های رمز بیشتر از حد مجاز می باشد'
//        ]);


        $user_data = [
            'name' => request()->input('name'),
            'email' => request()->input('email'),
            'password' => request()->input('password'),
            'role' => request()->input('role'),
            'wallet' => request()->input('wallet')
        ];

        $new_user = User::create($user_data);
        if ($new_user instanceof User) {
            return redirect()->route('admin.users.list')->with('success', 'کاربر با موفقیت ایجاد شد');
        }
    }

    public function delete($user_id)
    {
        if ($user_id && ctype_digit($user_id)) {
            // User::destroy($user_id);   //method 1
            //method 2
            $userItem = User::find($user_id);
            if ($userItem && $userItem instanceof User) {
                $userItem->delete();
                return redirect()->route('admin.users.list')->with('success', 'کاربر با موفقیت حذف شد');
            }
        }
    }

    public function edit($user_id)
    {
        if ($user_id && ctype_digit($user_id)) {
            $userItem = User::find($user_id);
            if ($userItem && $userItem instanceof User) {
                return view('admin.user.edit', compact('userItem'))->with(['panel_title' => 'ویرایش کاربر']);
            }
        }
    }

    public function update(UserRequest $userRequest, $user_id)
    {

        $inputs = [
            'name' => request()->input('name'),
            'email' => request()->input('email'),
            'password' => request()->input('password'),
            'role' => request()->input('role'),
            'wallet' => request()->input('wallet')
        ];
        if (!request()->has('password')) {
            unset($inputs['password']);
        }

        $userItem = User::find($user_id);
        $userItem->update($inputs);
        return redirect()->route('admin.users.list')->with('success', 'کاربر با موفقیت ویرایش شد');

    }

    public function packages(Request $request, $user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return redirect()->back();
        }
        $user_packages = $user->packages()->get();

        return view('admin.user.packages', compact('user_packages'))->with('panel_title', 'لیست پکیج های خریداری شده');
    }
}
