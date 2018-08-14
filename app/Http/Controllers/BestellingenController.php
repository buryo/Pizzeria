<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class BestellingenController extends Controller
{
//    Paginate(**) change this if you want more orders to be shown
    public function index(){
        $orders = Order::orderBy('id', 'desc')->paginate(10);

        $orders->transform(function ($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('beheren.bestellingen', ['orders' => $orders]);
    }

//  Changing order status 1 = waiting , 2 = completed
    public function bestellingProgress($id){
        $order = Order::where('id', $id)->first();

        if ($order->progress == "2" ? $order->progress = 1 : $order->progress = 2){
            $order->save();
        }

        return back();
    }

}
