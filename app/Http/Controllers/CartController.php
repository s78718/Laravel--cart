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
    public function index()
    {
        return view('mik');
    }

    //購物車首頁
    public function cart()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        return view('cart',[
                            'Carts'=> $cart->items,
                            'totalPrice'=> $cart->totalPrice,
                            'totalQty'=>$cart->totalQty]);
    }

    //添加到購物車
    public function getAddToCart(Request $request, $id)
    {
        //查id
        $categroy = Categroy::find($id);
        //查color size
        $product=Product::where('product','=',$categroy->product)->select('color','size')->get();

        //載入舊購物車資料
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);

        //加入必需的元素呼叫cart model
        $cart->add($categroy, $categroy->id, $product);

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
        return redirect()->action('CartController@index');
    }
}
