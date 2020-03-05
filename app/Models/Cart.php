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

    public function increaseByOne($lotid)
    {
        // Get item from items based on $id
        // Increase item qty by one
        $this->items[$lotid]['qty']++;

        // Update item price
        $this->items[$lotid]['price'] += $this->items[$lotid]['item'][0]['price'];

        // Update totalqty
        $this->totalQty++;

        // update total price
        $this->totalPrice += $this->items[$lotid]['item'][0]['price'];
    }


    public function decreaseByOne($lotid)
    {
        // Get item from items based on $id
        // Increase item qty by one
        $this->items[$lotid]['qty']--;

        // Update item price
        $this->items[$lotid]['price'] -= $this->items[$lotid]['item'][0]['price'];

        // Update totalqty
        $this->totalQty--;

        // update total price
        $this->totalPrice -= $this->items[$lotid]['item'][0]['price'];

        // unset item if qty < 0
        if($this->items[$lotid]['qty'] < 1) {
            unset($this->items[$lotid]);
        }
    }

    public function removeItem($lotid)
    {

        // Get item from items based on $id
        //dd($this->totalPrice);
        // Update totalqty
        $this->totalQty -= $this->items[$lotid]['qty'];

        // update total price
        $this->totalPrice = $this->totalPrice-($this->items[$lotid]['qty']*$this->items[$lotid]['item'][0]['price']);

        // unset item消除
        unset($this->items[$lotid]);
    }
}
