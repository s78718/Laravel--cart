<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use \ECPay_PaymentMethod as ECPayMethod;
use Illuminate\Support\Str;

class OrdersController extends Controller
{

    //get
    public function index()
    {
        $orders = Order::all();
        return view('orders', compact('orders'));
    }

    //新增購買訂單時
    public function new(Request $request)
    {
        $oldCart = session()->has('cart') ? session()->get('cart') : null;

        //當cart為空的時候不動作
        if(!$oldCart)
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
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'pay' => 'required',
        ]);

        $cart = session()->get('cart');

        //隨機編碼一組數字待成功寫回資料庫
        $uuid_temp = str_replace("-", "",substr(Str::uuid()->toString(), 0,18));

          //品名
          $product=null;
          foreach ($cart->items as $c)
          {
              $product.=$c['item'][0]['product'].'-'
              .$c['item'][0]['size'].'-'
              .$c['item'][0]['color'].'-單價'
              .$c['item'][0]['price'].'*'
              .$c['qty'].'/';

          }

        $order = Order::create([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'pay' => request('pay'),
            //'cart' => serialize($cart),
            'cart' => $product,
            'uuid' => $uuid_temp
        ]);

        try {
            $obj = new \ECPay_AllInOne();

            //服務參數
            $obj->ServiceURL  = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5";//服務位置
            $obj->HashKey     = env('HashKey') ;                                            //測試用Hashkey，請自行帶入ECPay提供的HashKey
            $obj->HashIV      = env('HashIV') ;                                            //測試用HashIV，請自行帶入ECPay提供的HashIV
            $obj->MerchantID  = env('MerchantID') ;                                        //測試用MerchantID，請自行帶入ECPay提供的MerchantID
            $obj->EncryptType = '1';                                                       //CheckMacValue加密類型，請固定填入1，使用SHA256加密
            //基本參數(請依系統規劃自行調整)
            $MerchantTradeNo = $uuid_temp ;
            $obj->Send['ReturnURL']             = env('ECReturnURL') ;              //付款完成通知回傳的網址
            $obj->Send['PeriodReturnURL']       = env('ECPeriodReturnURL') ;        //付款完成通知回傳的網址
            $obj->Send['ClientBackURL']         = env('ECClientBackURL') ;          //付款完成通知回傳的網址
            $obj->Send['MerchantTradeNo']       = $MerchantTradeNo;                 //訂單編號
            $obj->Send['MerchantTradeDate']     = date('Y/m/d H:i:s');              //交易時間
            $obj->Send['TotalAmount']           = $cart->totalPrice;                //交易金額
            $obj->Send['TradeDesc']             = "mik購物" ;                       //交易描述

            if( $cart->pay=='信用卡付款')
                $obj->Send['ChoosePayment']     = ECPayMethod::Credit ;             //付款方式:Credit
            else if( $cart->pay=='超商付款')
                 $obj->Send['ChoosePayment']    = ECPayMethod::CVS ;                //付款方式:超商付款
            $obj->Send['IgnorePayment']         = ECPayMethod::GooglePay ;          //不使用付款方式:GooglePay

            //訂單的商品資料
            array_push($obj->Send['Items'], array('Name' =>  $product, 'Price' => $cart->totalPrice,
             'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "dedwed"));

            //清除cart資料
            session()->forget('cart');

            $obj->CheckOut();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback(Request $request)
    {
        //寫入資料庫
        $order = Order::where('uuid', '=', $request('MerchantTradeNo'))->firstOrFail();
        $order->paid = !$order->paid;//修改付款狀態
        $order->save();
    }

    //成功
    public function redirectFromECpay () {
        //sesion()存放一次資訊
        session()->flash('EC', 'Order success!');
        return redirect('/');
    }
}


