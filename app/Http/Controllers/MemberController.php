<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order; //Model
use Illuminate\Support\Str;
use Session;

use \ECPay_PaymentMethod as ECPayMethod;

class MemberController extends Controller
{
    //
    public function member()
    {
        $member_no=session()->get('member_no');
        $order=Order::where('member_no','=',$member_no)
                        ->get();
                        //dd($order);
        return view('member',compact('order'));
    }

    //取消訂單
    public function cancelorder($id)
    {
        $order=Order::where('uuid','=',$id)
                        ->delete();
        return redirect('/Member');
    }

    //未付款後進會員中心點付款
    public function payorder($id)
    {
        $order=Order::where('uuid','=',$id)
                        ->get();
        //克服綠界重複碼
        $add= str_replace("-", "",substr(Str::uuid()->toString(), 0,3));
        $MerchantTradeNo= $order[0]->uuid.$add;
        $TotalAmount =  $order[0]->bill;
        $product=$order[0]->cart;

        //dd($MerchantTradeNo);
        try {
            $obj = new \ECPay_AllInOne();

            //服務參數
            $obj->ServiceURL  = env('ServiceURL');                                          //服務位置
            $obj->HashKey     = env('HashKey') ;                                            //測試用Hashkey，請自行帶入ECPay提供的HashKey
            $obj->HashIV      = env('HashIV') ;                                             //測試用HashIV，請自行帶入ECPay提供的HashIV
            $obj->MerchantID  = env('MerchantID') ;                                         //測試用MerchantID，請自行帶入ECPay提供的MerchantID
            $obj->EncryptType = '1';                                                        //CheckMacValue加密類型，請固定填入1，使用SHA256加密
            //基本參數(請依系統規劃自行調整)
            $obj->Send['ReturnURL']             = env('ReturnURL') ;              //付款完成通知回傳的網址
            $obj->Send['PeriodReturnURL']       = env('PeriodReturnURL') ;        //付款完成通知回傳的網址
            $obj->Send['ClientBackURL']         = env('ClientBackURL') ;          //付款完成通知回傳的網址
            $obj->Send['MerchantTradeNo']       = $MerchantTradeNo ;                //訂單編號
            $obj->Send['MerchantTradeDate']     = date('Y/m/d H:i:s');              //交易時間
            $obj->Send['TotalAmount']           = $TotalAmount;                     //交易金額
            $obj->Send['TradeDesc']             = "mik shop" ;                      //交易描述

            switch(request('payment')){
                case "信用卡":
                    $obj->Send['ChoosePayment'] = ECPayMethod::Credit ; //付款方式:Credit
                    break;
                case "WebATM":
                    $obj->Send['ChoosePayment'] = ECPayMethod::ATM ; //付款方式:ATM
                    $obj->Send['ExpireDate']    = 3; //用ATM付款的話，可以設定要求客戶要在幾天內完成付款
                    break;
                case "超商條碼":
                    $obj->Send['ChoosePayment'] = ECPayMethod::CVS ; //付款方式:CVS
                    $obj->Send['ExpireDate']    = 3; //用ATM付款的話，可以設定要求客戶要在幾天內完成付款
                    break;
            }

            $obj->Send['IgnorePayment']     = ECPayMethod::GooglePay ; //不使用付款方式:GooglePay

            //訂單的商品資料
            array_push($obj->Send['Items'],
                        array('Name' =>  $product,
                        'Price' =>  $TotalAmount,
                        'Currency' => "元",
                        'Quantity' => (int) "1",
                        'URL' => "dedwed"
            ));

            $obj->CheckOut();


        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    //修改這人資料
    public function personmodify()
    {

    }

}
