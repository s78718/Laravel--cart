<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kid_Cloth;
use App\Models\Man_Cloth;
use App\Models\Woman_Cloth;
use App\Models\Cart;
use App\Models\price; //Model
use App\Models\Product; //Model 產品資訊
use Session;

class CartController extends Controller
{


    //購物車首頁
    public function cart(Request $request)
    {
        //刪除指令
        //$request->session()->flush();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        //dd($cart);
        return view('cart',[
                            'Carts'=> $cart->items,
                            'totalPrice'=> $cart->totalPrice,
                            'totalQty'=>$cart->totalQty,
                            'color'=>$cart->color,
                            'size'=>$cart->size,
                            ]);
    }

    //添加到購物車
    public function getAddToCart(Request $request, $id, $color, $size)
    {
        //查id
        $item = Product::join('prices','prices.lotid','=','products.lotid')
                            ->where('products.lotid',$id)
                            ->get();

        //dd($product);
        //載入舊購物車資料
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);

        //加入必需的元素呼叫cart model
        $cart->add($item, $id, $color, $size);

        //資料帶在session裡
        Session::put('cart', $cart);

        return redirect()->back();
    }


    //購物車+1
    public function increaseByOne($id)
    {
        $cart = new Cart(Session::get('cart'));
        $cart->increaseByOne($id);
        session()->put('cart', $cart);
        return redirect()->action('CartController@cart');
    }

    //購物車-1
    public function decreaseByOne($id)
    {
        $cart = new Cart(Session::get('cart'));
        $cart->decreaseByOne($id);
        session()->put('cart', $cart);
        return redirect()->action('CartController@cart');
    }

    //購物車remove
    public function removeItem($id)
    {
        $cart = new Cart(Session::get('cart'));
        $cart->removeItem($id);
        session()->put('cart', $cart);
        return redirect()->action('CartController@cart');
    }

    //清除購物車
    public function clearCart()
    {
        if(session()->has('cart')){
            session()->forget('cart');
        }
        return view('mik');
    }
}
