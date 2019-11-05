<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PhpParser\Node\Stmt\Unset_;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|max:12'
        ];

        if (request()->route('user_id') && intval(request()->route('user_id')) > 0) {
            unset($rules['password']);
        }
        return $rules;

    }

    public function messages()
    {
        return [
            'name.required' => 'لطفا نام را وارد کنید',
            'email.required' => 'لطفا ایمیل را وارد  کنید',
            'email.email' => 'ایمیل معتبر نمی باشد',
            'password.required' => 'لطفا رمز عبور را وارد کنید',
            'password.min' => 'تعداد رقم های رمز کمتر از حد مجاز می باشد',
            'password.max' => 'تعداد رقم های رمز بیشتر از حد مجاز می باشد'
        ];
    }
}
