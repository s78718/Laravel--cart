<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Validator;

class Login_RegisteController extends Controller
{
    //註冊登入畫面
    public function Login_Register()
    {
        return view('login_register');
    }

    //登出
    public function Logout()
    {
        session()->forget('name');
        return view('/');
    }

    //登入驗證
    public function Login_Validate(Request $request)
    {
        //驗證
        $rules = [
            'email' => 'required',
            'password' => 'required|min:6',
        ];
        $messages = [
            'email.required' => '帳號不得為空!',
            'password.required' => '密碼不得為空!',
            'password.min' => '密碼長度不足6!',
        ];
        request()->validate($rules, $messages);

        $email=$request->email;
        $password=$request->password;

        $user=User::where('email',$email)->first();

        if($user->email==null)
        {
            return redirect()->back()->with('error','帳號錯誤');
        }

        if($user->password!=$password)
        {
            return redirect()->back()->with('error','密碼錯誤');
        }

        session()->put('name',$user->name);
        return redirect('/');

    }

}
