<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use \ECPay_PaymentMethod as ECPayMethod;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders', compact('orders'));
    }

    //新增購買訂單時
    public function new(Request $request)
    {
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        //dd($cart);
        return view('order',[
            'Carts'=> $cart->items,
            'totalPrice'=> $cart->totalPrice,
            'totalQty'=>$cart->totalQty]);
    }

    //訂單形成
    public function store()
    {
        request()->validate([
            '購買人' => 'required',
            'email' => 'required',
            '住址'
        ]);

        $cart = session()->get('cart');

        $uuid_temp = str_replace("-", "",substr(Str::uuid()->toString(), 0,18));

        $order = Order::create([
            'name' => request('name'),
            'email' => request('email'),
            'cart' => serialize($cart),
            'uuid' => $uuid_temp
        ]);
        // session()->flash('success', 'Order success!');

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
            $obj->Send['ReturnURL']         = " https://69308166.ngrok.io/callback" ;    //付款完成通知回傳的網址
            $obj->Send['PeriodReturnURL']   = " https://69308166.ngrok.io/callback" ;    //付款完成通知回傳的網址
            $obj->Send['ClientBackURL']     = " https://69308166.ngrok.io/success" ;    //付款完成通知回傳的網址
            $obj->Send['MerchantTradeNo']   = $MerchantTradeNo;                          //訂單編號
            $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');                       //交易時間
            $obj->Send['TotalAmount']       = $cart->totalPrice;                         //交易金額
            $obj->Send['TradeDesc']         = "good to drink" ;                          //交易描述
            $obj->Send['ChoosePayment']     = ECPayMethod::Credit ;              //付款方式:Credit
            $obj->Send['IgnorePayment']     = ECPayMethod::GooglePay ;           //不使用付款方式:GooglePay
            //訂單的商品資料
            array_push($obj->Send['Items'], array('Name' => request('name'), 'Price' => $cart->totalPrice,
            'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "dedwed"));
            session()->forget('cart');
            $obj->CheckOut();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function callback()
    {
        //dd(request());
        $order = Order::where('uuid', '=', request('MerchantTradeNo'))->firstOrFail();
        $order->paid = !$order->paid;
        $order->save();
    }


    //成功
    public function redirectFromECpay () {
        session()->flash('success', 'Order success!');
        return redirect('/');
    }
}


