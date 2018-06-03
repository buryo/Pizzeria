<?php

namespace Pizzeria\Http\Controllers;

use Pizzeria\Products;
use Illuminate\Http\Request;
use Pizzeria\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('home', compact('products'));
    }

    public function getActies()
    {
        return view('layouts.acties');
    }
}
