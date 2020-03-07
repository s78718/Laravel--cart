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
use App\Models\LineUser; //使用者 Eloquent ORM Model
use Illuminate\Support\Str;


class LineAuthController extends Controller
{

   //Line登入
   public function lineSignInProcess()
   {

       $redirect_url = env('LINE_REDIRECT');
       return Socialite::driver('line')
       ->scopes(['profile'])
       ->redirectUrl($redirect_url)
       ->redirect();
   }

    //Line登入重新導向授權資料處理
    public function lineSignInCallbackProcess()
    {
        if(request()->error=="access_denied")
        {
            throw new Exception('授權失敗，存取錯誤');
        }
        //依照網域產出重新導向連結 (來驗證是否為發出時同一callback)
        $redirect_url = env('LINE_REDIRECT');



        //不要加nickname
        $LineUser = Socialite::driver('line')
            //->stateless()不加入會出錯
            ->redirectUrl($redirect_url)->stateless()->user();


        $line_email = $LineUser->email;

        if(is_null($line_email))
        {
            throw new Exception('未授權取得使用者 Email');
        }

        //取得 Line 資料
        $line_id = $LineUser->id;
        $line_name = $LineUser->name;

        //取得使用者資料是否有此Line_id資料
        $User =  LineUser::where('line_id', $line_id)->first();


        if(is_null($User))
        {
            //隨機編碼一組數字當唯一會員編號
            $member_no = str_replace("-", "",substr(Str::uuid()->toString(), 0,18));
            //尚未註冊
            $input = [
                'member_no'=>$member_no ,
                'email' => $line_email, //E-mail
                'name' => $line_name, //暱稱
                'password' => uniqid(), //隨機產生密碼
                'line_id' => $line_id, //line ID
                'type' => 'G', //一般使用者
            ];


            //密碼加密
            $input['password'] = Hash::make($input['password']);

            //新增會員資料
            $User = LineUser::create($input);

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
        $User = LineUser::where('line_id', $line_id)->first();
        session()->put('logintype','line');
        session()->put('member_no',$User->member_no);
        session()->put('buyerName',$line_name);
        session()->put('buyerEmail',$line_email);
        return redirect('/');
    }

}
