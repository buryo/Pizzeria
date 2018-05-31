<?php

namespace App;

// Shopping cart class
// Made Created March 2018
// Burak Sen


class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];

        if ($this->items) {
//            check if item already exists
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function quantityPlusOne($id)
    {
//        Only quantity plus one if quantity == 0 or higher
        if ($this->items[$id]['qty'] >= 0) {
            $this->totalQty++;
            $this->items[$id]['qty']++;
            $this->totalPrice += $this->items[$id]['item']['price'];
            $this->items[$id]['price'] = $this->items[$id]['qty'] * $this->items[$id]['item']['price'];
        }
    }

    public function quantityMinusOne($id)
    {
//      Turning quantity into an integer
        $thisInt = (int) $this->items[$id]['qty'];

        if ($thisInt > 0) {
            $this->totalQty--;
            $this->items[$id]['qty']--;
            $this->totalPrice -= $this->items[$id]['item']['price'];
            $this->items[$id]['price'] = $this->items[$id]['qty'] * $this->items[$id]['item']['price'];
        }elseif ($thisInt <= 0){
//          if quantity is zero or lower, the item will be destroyed
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['price'];
            unset($this->items[$id]);
        }
    }

    public function destroyItem($id)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
