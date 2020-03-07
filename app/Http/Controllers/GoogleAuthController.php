<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Validator; //驗證器
use Hash; //雜湊
use Mail; //寄信
use Socialite;
use Auth;
use App\Models\GoogleUser; //使用者 Eloquent ORM Model
use Illuminate\Support\Str;


class GoogleAuthController extends Controller
{

    //google登入
    public function googleSignInProcess()
    {

        $redirect_url = env('GOOGLE_REDIRECT');
        return Socialite::driver('google')
        ->redirectUrl($redirect_url)
        ->redirect();

    }


        //google登入重新導向授權資料處理
    public function googleSignInCallbackProcess()
    {

        if(request()->error=="access_denied")
        {
            throw new Exception('授權失敗，存取錯誤');
        }
        //依照網域產出重新導向連結 (來驗證是否為發出時同一callback)
        $redirect_url = env('GOOGLE_REDIRECT');


        //不要加nickname
        $googleUser = Socialite::driver('google')
            ->redirectUrl($redirect_url)->stateless()->user();

        $google_email = $googleUser->email;
        if(is_null($google_email))
        {
            throw new Exception('未授權取得使用者 Email');
        }
        //取得 google 資料
        $google_id = $googleUser->id;
        $google_name = $googleUser->name;

        //取得使用者資料是否有此google_id資料
        $User = GoogleUser::where('google_id', $google_id)->first();

        if(is_null($User))
        {
             //隨機編碼一組數字當唯一會員編號
             $member_no = str_replace("-", "",substr(Str::uuid()->toString(), 0,18));
             //尚未註冊
             $input = [
                'member_no'=>$member_no ,
                'email' => $google_email, //E-mail
                'name' => $google_name, //暱稱
                'password' => uniqid(), //隨機產生密碼
                'google_id' => $google_id, //google ID
                'type' => 'G', //一般使用者
            ];

            //密碼加密
            $input['password'] = Hash::make($input['password']);

            //新增會員資料
            $User = GoogleUser::create($input);

            //寄送註冊通知信
            $mail_binding = [
                'name' => $input['name']
            ];

            //寄送註冊通知信
            //寄信需要去google設定低安全性
            Mail::send('email.sendEmailNotification', ['name' => $input['name']], function($message) use ($input)
            {
                $message->to($input['email'],' mik 購物')->subject('恭喜註冊 mik 成功');
            });

        }

        //echo "登入成功!";
        //重新導向到登入頁
        //把名稱放入session
        $User = GoogleUser::where('google_id', $google_id)->first();
        session()->put('logintype','google');
        session()->put('member_no',$User->member_no);
        session()->put('buyerName',$google_name);
        session()->put('buyerEmail',$google_email);
        return redirect('/');

    }
}
