<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Validator;
use Hash;
use Mail;
use Auth;

class Login_RegisteController extends Controller
{
    //註冊登入畫面
    public function Login_Register()
    {
        return view('login_register');
    }

    //註冊畫面
    public function Register()
    {
        return view('register');
    }

    //登出
    public function Logout()
    {
        Auth::logout();//清空第三方登入

        //session()->forget('buyerName');
        //session()->forget('buyerEmail');
        //session()->forget('buyerPhone');
        //session()->forget('buyerAddress');
        //清空session
        session()->flush();
        return view('mik');
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

        //找不到狀態情況
        if($user==null)
        {
            return redirect()->back()->withErrors(['error'=>'帳號錯誤或是未註冊!']);
        }

        //驗證密碼
        $hashpassword=Hash::check($password, $user->password);
        if(!$hashpassword)
        {
            return redirect()->back()->withErrors(['error'=>'密碼錯誤!']);
        }

        //放入購買人相關資訊 orders會取出
        session()->put('buyerName',$user->name);
        session()->put('buyerEmail',$user->email);
        session()->put('buyerPhone',$user->phone);
        session()->put('buyerAddress',$user->address);

        return redirect('/');

    }

    //註冊驗證
    public function Register_Validate(Request $request)
    {
        //驗證
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'email',
            'password' => 'required|min:6|confirmed',
        ];
        $messages = [
            'name.required' => '名字不得為空!',
            'phone.required' => '電話不得為空!',
            'address.required' => '地址不得為空!',
            'email.required' => '帳號不得為空!',
            'password.required' => '密碼不得為空!',
            'password.min' => '密碼長度不足6!',
            'password.confirmed' => '密碼與確認密碼不一致!',
        ];

        $validator=request()->validate( $rules, $messages);

        $input=[
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'email'=>$request->email,
            'password'=>$request->password,
        ];


        $user=User::where('email',$input['email'])->first();

        if($user!=null)
        {
            return redirect()->back()->withErrors(['error'=>'已經有註冊資料,請使用登入!']);
        }

        //密碼加密
        $input['password'] = Hash::make($input['password']);

        //創建資料
        $create_new = User::create($input);

        //寄送註冊通知信
        //寄信需要去google設定低安全性
        Mail::send('email.sendEmailNotification', ['name' => $input['name']], function($message) use ($input)
        {
            $message->to($input['email'],' mik 購物')->subject('恭喜註冊 mik 成功');
        });

        return redirect('/');

    }

}
