<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class BestelingenController extends Controller
{
    public function index(){
        $orders = Order::orderBy('id', 'desc')->paginate(10);


        $orders->transform(function ($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('beheren.bestelingen', ['orders' => $orders]);
    }

    public function bestelingProgress($id){
        $bestelingProgress = Order::where('id', $id)->first();

        if ($bestelingProgress->progress == '1'){
            $bestelingProgress->progress = '2';
            $bestelingProgress->save();
        }else{
            $bestelingProgress->progress = '1';
            $bestelingProgress->save();
        }

        return back();
    }

}
