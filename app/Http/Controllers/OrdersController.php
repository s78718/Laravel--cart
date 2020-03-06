<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Str;

use \ECPay_PaymentMethod as ECPayMethod;

class OrdersController extends Controller
{

    //新增購買訂單時
    public function new(Request $request)
    {
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        //dd(session()->has('cart'));
        //當cart為空的時候不動作
        if(!session()->has('cart'))
        {
            return redirect()->back();
        }
        //當購買數量為0禁止進入到付款畫面
        if($oldCart->totalQty==0)
        {
            return redirect()->back();
        }


        $cart = new Cart($oldCart);

        return view('order',[
            'Carts'=> $cart->items,
            'totalPrice'=> $cart->totalPrice,
            'totalQty'=>$cart->totalQty
            ]);
    }

    //訂單形成post
    public function store()
    {
        //驗證
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/(09)[0-9]{8}/',
            'address' => 'required',
            'payment' => 'required',
        ];
        $messages = [
            'email.required' => 'email格式錯誤!',
            'phone.required' => '手機格式錯誤!',
            'address.required' => '地址未填!',
            'name.required' => '名字未填!',
            'payment.required' => '付款方式未選擇!',
        ];
        request()->validate($rules, $messages);

        $cart = session()->get('cart');

        //隨機編碼一組數字待成功寫回資料庫
        $uuid_temp = str_replace("-", "",substr(Str::uuid()->toString(), 0,18));

        //品名
        $product=null;
        foreach ($cart->items as $c)
        {
            $product.=$c['item'][0]['product'].'_'
            .$c['item'][0]['size'].'_'
            .$c['item'][0]['color'].'_單價';

            if(!$c['item'][0]['saleprice']){
                $product.=$c['item'][0]['price'].'*';
            }
            else{
                $product.=$c['item'][0]['saleprice'].'*';
            }
            $product.=$c['qty'].'#';

        }

        //寫入資料庫
        $order = Order::create([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'payment' => request('payment'),
            'address' => request('address'),
            'bill'=>$cart->totalPrice,
            'cart' => $product,
            'uuid' => $uuid_temp,
            'state'=> '未付款',
            //'cart' => serialize($cart),
        ]);

        try {
            $obj = new \ECPay_AllInOne();

            //服務參數
            $obj->ServiceURL  = env('ServiceURL');                                          //服務位置
            $obj->HashKey     = env('HashKey') ;                                            //測試用Hashkey，請自行帶入ECPay提供的HashKey
            $obj->HashIV      = env('HashIV') ;                                             //測試用HashIV，請自行帶入ECPay提供的HashIV
            $obj->MerchantID  = env('MerchantID') ;                                         //測試用MerchantID，請自行帶入ECPay提供的MerchantID
            $obj->EncryptType = '1';                                                        //CheckMacValue加密類型，請固定填入1，使用SHA256加密
            //基本參數(請依系統規劃自行調整)
            $MerchantTradeNo = $uuid_temp ;
            $obj->Send['ReturnURL']             = env('ReturnURL') ;              //付款完成通知回傳的網址
            $obj->Send['PeriodReturnURL']       = env('PeriodReturnURL') ;        //付款完成通知回傳的網址
            $obj->Send['ClientBackURL']         = env('ClientBackURL') ;          //付款完成通知回傳的網址
            $obj->Send['MerchantTradeNo']       = $MerchantTradeNo;                 //訂單編號
            $obj->Send['MerchantTradeDate']     = date('Y/m/d H:i:s');              //交易時間
            $obj->Send['TotalAmount']           = $cart->totalPrice;                //交易金額
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
                        'Price' => $cart->totalPrice,
                        'Currency' => "元",
                        'Quantity' => (int) "1",
                        'URL' => "dedwed"
            ));

            $obj->CheckOut();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    //付款成功後綠界回調
    public function callback()
    {
        //清除購物車資料
        session()->forget('cart');
        //sesion()存放一次資訊
        session()->flash('EC', '綠界付款OK');
        //成功交易後寫入資料庫成功
        $order = Order::where('uuid', '=', request('MerchantTradeNo'))->firstOrFail();
        $order->paid = !$order->paid;//修改付款狀態
        $order->state ='已付款待處理';
        $order->save();
    }

    //交易完成時
    public function redirectFromECpay() {

        return redirect('/');
    }
}

// {
//     "CustomField1":null,
//     "CustomField2":null,
//     "CustomField3":null,
//     "CustomField4":null,
//     "MerchantID":"2000132",
//     "MerchantTradeNo":"Test1576073816",
//     "PaymentDate":"2019\/12\/11 22:17:57",
//     "PaymentType":"Credit_CreditCard",
//     "PaymentTypeChargeFee":"1",
//     "RtnCode":"1",
//     "RtnMsg":"\u4ea4\u6613\u6210\u529f",
//     "SimulatePaid":"0",
//     "StoreID":null,
//     "TradeAmt":"50",
//     "TradeDate":"2019\/12\/11 22:16:56",
//     "TradeNo":"1912112216567583",
//     "CheckMacValue":"6F42BE6F208E15FD08C189345D0973D0787983E3753CE670E105173A994F9AE2"
//  }

