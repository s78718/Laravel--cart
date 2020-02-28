<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kid_Cloth;
use App\Models\Man_Cloth;
use App\Models\Woman_Cloth;
use Session;

class CartController extends Controller
{

    public function cart()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        /*return view('cart',[
            'books'=> $cart->items,
            'totalPrice'=> $cart->totalPrice,
            'totalQty'=>$cart->totalQty]);*/
    }

    //添加
    public function getAddToCart(Request $request, $id)
    {
        $book = Books::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($book, $book->id);
        Session::put('cart', $cart);
        return redirect()->back();
    }


    //+1
    public function increaseByOne($id)
    {
        $cart = new Cart(Session::get('cart'));
        $cart->increaseByOne($id);
        session()->put('cart', $cart);
        return redirect()->action('BooksController@cart');
    }

    //-1
    public function decreaseByOne($id)
    {
        $cart = new Cart(Session::get('cart'));
        $cart->decreaseByOne($id);
        session()->put('cart', $cart);
        return redirect()->action('BooksController@cart');
    }

    //remove
    public function removeItem($id)
    {
        $cart = new Cart(Session::get('cart'));
        $cart->removeItem($id);
        session()->put('cart', $cart);
        return redirect()->action('BooksController@cart');
    }

    //清除購物車
    public function clearCart()
    {
        if(session()->has('cart')){
            session()->forget('cart');
        }

        return redirect()->action('BooksController@index');
    }
}
