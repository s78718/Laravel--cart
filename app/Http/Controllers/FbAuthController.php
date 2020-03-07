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
use App\Models\FbUser; //使用者 Eloquent ORM Model
use Illuminate\Support\Str;



class FbAuthController extends Controller
{

   //Facebook登入
   public function facebookSignInProcess()
   {

       $redirect_url = env('FB_REDIRECT');

       return Socialite::driver('facebook')
           //->scopes(['user_friends'])
           ->redirectUrl($redirect_url)
           ->redirect();

   }


    //Facebook登入重新導向授權資料處理
    public function facebookSignInCallbackProcess()
    {
        if(request()->error=="access_denied")
        {
            throw new Exception('授權失敗，存取錯誤');
        }
        //依照網域產出重新導向連結 (來驗證是否為發出時同一callback)
        $redirect_url = env('FB_REDIRECT');


        //不要加nickname
        $FacebookUser = Socialite::driver('facebook')
            ->fields([
                'name',
                'email',
            ])
            //->stateless()不加入會出錯
            ->redirectUrl($redirect_url)->stateless()->user();


        $facebook_email = $FacebookUser->email;

        if(is_null($facebook_email))
        {
            throw new Exception('未授權取得使用者 Email');
        }

        //取得 Facebook 資料
        $facebook_id = $FacebookUser->id;
        $facebook_name = $FacebookUser->name;

        //取得使用者資料是否有此Facebook_id資料
        $User =  FbUser::where('facebook_id', $facebook_id)->first();

        if(is_null($User))
        {
            //隨機編碼一組數字當唯一會員編號
            $member_no = str_replace("-", "",substr(Str::uuid()->toString(), 0,18));
            //尚未註冊
            $input = [
                'member_no'=>$member_no ,
                'email' => $facebook_email, //E-mail
                'name' => $facebook_name, //暱稱
                'password' => uniqid(), //隨機產生密碼
                'facebook_id' => $facebook_id, //Facebook ID
                'type' => 'G', //一般使用者
            ];

            //密碼加密
            $input['password'] = Hash::make($input['password']);

            //新增會員資料
            $User = FbUser::create($input);

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
        $User =  FbUser::where('facebook_id', $facebook_id)->first();
        session()->put('logintype','fb');
        session()->put('member_no',$User->member_no);
        session()->put('buyerName',$facebook_name);
        session()->put('buyerEmail',$facebook_email);
        session()->put('buyerPhone',$User->phone);
        session()->put('buyerAddress',$User->address);
        return redirect('/');
    }

}
