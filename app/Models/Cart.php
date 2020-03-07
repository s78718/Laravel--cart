<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    // items is an associative array
    public $items;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart) {
            $this->items        = $oldCart->items;
            $this->totalQty     = $oldCart->totalQty;
            $this->totalPrice   = $oldCart->totalPrice;
        }
    }

    //帶入顏色尺寸id
    public function add($item, $id, $color, $size)
    {
        //因為新增qty先設為0
        // empty state of storedItem (qty(0), price(item.price), item(object))
        $storedItem;
        if(!$item[0]->saleprice){
            $storedItem = ['qty'=>0, 'price'=>$item[0]->price, 'item'=>$item ,'color'=>$color,'size'=>$size];
        }
        else{
            $storedItem = ['qty'=>0, 'price'=>$item[0]->saleprice, 'item'=>$item ,'color'=>$color,'size'=>$size];
        }

        // check if cart has items 判別有沒有重複
        if($this->items) {
            // check if cart has existing product
            // if yes let storedItem = Cart Item
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

        //更新訊息
        // storedItem qty increase by one
        $storedItem['qty']++;

        // update current items with storedItem
        $this->items[$id] = $storedItem;

        // update total Qty
        $this->totalQty++;

        // storedItem price = current book [price] * storedItem qty
        if(!$item[0]->saleprice){
            $storedItem['price'] = $item[0]->price * $storedItem['qty'];
            // update total Price
            $this->totalPrice += $item[0]->price;
        }
        else{
            $storedItem['price'] = $item[0]->saleprice * $storedItem['qty'];
            // update total Price
            $this->totalPrice += $item[0]->saleprice;
        }

    }

    public function increaseByOne($id)
    {
        // Get item from items based on $id
        // Increase item qty by one
        $this->items[$id]['qty']++;

        if(!$this->items[$id]['item'][0]['saleprice'])
        {
            // Update item price
            $this->items[$id]['price'] += $this->items[$id]['item'][0]['price'];
            // update total price
            $this->totalPrice += $this->items[$id]['item'][0]['price'];
        }
        else
        {
            // Update item price
            $this->items[$id]['price'] += $this->items[$id]['item'][0]['saleprice'];
            // update total price
            $this->totalPrice += $this->items[$id]['item'][0]['saleprice'];
        }

        // Update totalqty
        $this->totalQty++;


    }


    public function decreaseByOne($id)
    {
        // Get item from items based on $id
        // Increase item qty by one
        $this->items[$id]['qty']--;

        if(!$this->items[$id]['item'][0]['saleprice'])
        {
            // Update item price
            $this->items[$id]['price'] -= $this->items[$id]['item'][0]['price'];
            // update total price
            $this->totalPrice -= $this->items[$id]['item'][0]['price'];
        }
        else
        {
            // Update item price
            $this->items[$id]['price'] -= $this->items[$id]['item'][0]['saleprice'];
            // update total price
            $this->totalPrice -= $this->items[$id]['item'][0]['saleprice'];
        }

        // Update totalqty
        $this->totalQty--;

        // unset item if qty < 0
        if($this->items[$id]['qty'] < 1) {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id)
    {

        // Get item from items based on $id
        //dd($this->totalPrice);
        // Update totalqty
        $this->totalQty -= $this->items[$id]['qty'];

        if(!$this->items[$id]['item'][0]['saleprice']){
            // update total price
            $this->totalPrice = $this->totalPrice-($this->items[$id]['qty']*$this->items[$id]['item'][0]['price']);
        }
        else{
            // update total price
            $this->totalPrice = $this->totalPrice-($this->items[$id]['qty']*$this->items[$id]['item'][0]['saleprice']);
        }

        // unset item消除
        unset($this->items[$id]);
    }
}
