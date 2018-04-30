<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Products;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function getIndex()
    {
        $products = Products::where('type', 'pizza')->get();
        return view('home', ['products' => $products]);
    }

    public function getProductPage($type){
        $products = Products::where('type', $type)->get();

        $productLinks = array([
            'pizza',
            'pasta',
            'ovenschotel',
            'salade',
            'vleesgerecht',
            'visgerecht',
            'broodje',
            'dessert',
            'drank',
        ]);

        return view('layouts.product', compact('products', 'productLinks'));
    }

    public function getAddToCart(Request $request, $id){
        $product = Products::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getCart(){
        if (!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);

    }

    public function getCheckout(){
        if (!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total, 'products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }


    public function quantityPlusOne($id){
        if (!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->quantityPlusOne($id);

        Session::put('cart', $cart);
        return redirect()->route('products.shoppingCart');
    }

    public function quantityMinusOne($id){
        if (!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->quantityMinusOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->route('products.shoppingCart');
    }

    public function destroyItem($id){
        if (!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->destroyItem($id);

        if (count($cart->items) > 0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->route('products.shoppingCart');
    }

    public function postCheckout(Request $data){
        if (!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $order = new Order();
        $order->name = $data->input('name');
        $order->tussenvoegsel = $data->input('tussenvoegsel');
        $order->surname = $data->input('surname');
        $order->phone = $data->input('phone');
        $order->email = $data->input('email');
        $order->address = $data->input('address');
        $order->postalcode = $data->input('postalcode');
        $order->description = $data->input('description');
        $order->cart = serialize($cart);

        $order->save();

        $order->cart = unserialize($order->cart);

        Session::forget('cart');

        $bestelingOke = 1;
        return view('shop.checkout', compact('bestelingOke', 'order'));
    }

    public function destroyCart(){
        Session::forget('cart');
        return redirect()->route('products.shoppingCart');
    }
}
