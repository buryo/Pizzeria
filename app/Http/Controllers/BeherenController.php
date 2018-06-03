<?php

namespace Pizzeria\Http\Controllers;

use Pizzeria\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class BeherenController extends Controller
{

    public function index()
    {
        if (Auth::user()) {
            $pizza = Products::where('type', 'pizza')->count();
            $pasta = Products::where('type', 'pasta')->count();
            $ovenschotel = Products::where('type', 'ovenschotel')->count();
            $broodje = Products::where('type', 'broodje')->count();
            $salade = Products::where('type', 'salade')->count();
            $vleesgerecht = Products::where('type', 'vleesgerecht')->count();
            $visgerecht = Products::where('type', 'visgerecht')->count();
            $dessert = Products::where('type', 'dessert')->count();
            $drank = Products::where('type', 'drank')->count();

            return view('beheren.beheren', compact('pizza', 'pasta', 'ovenschotel', 'broodje', 'salade', 'vleesgerecht', 'visgerecht', 'dessert', 'drank'));
        } else {
            return view('auth.login');
        }
    }

    public function nieuweProduct()
    {
        return view('beheren.nieuweProduct');
    }

    public function nieuweProductAdd(Request $data)
    {
        $this->validate($data, array(
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'price' => 'required',
            'description' => 'max:255',
            'price' => 'required|max:22|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/',
        ));

        $product = new Products();

        $product->name = ucfirst($data->name);
        $product->type = $data->type;
        $product->price = $data->price;
        $product->description = ucfirst($data->description);

        if ($data->hasFile('image')) {
            $image = $data->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/products/' . $imageName);
            Image::make($image)->resize(600, 600)->save($location);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->back();
    }

    public function bewerkenIndex($type)
    {
        $products = Products::where('type', $type)->get();
        return view('beheren.bewerken', compact('type', 'products'));
    }

    public function bewerkenDeleteSelected(Request $data)
    {
        $checkedCheckBoxes = $data->checkbox;
        Products::whereIn('id', $checkedCheckBoxes)->delete();
        return back();
    }

    public function getSelectedProduct($type, $id)
    {
        $productData = Products::where('id', $id)->first();
        return view('beheren.bewerk-product', compact('productData', 'id', 'type'));
    }

    public function bewerkenSelectedProduct(Request $request, $type, $id)
    {
        $product = $productData = Products::where('id', $id)->first();

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $location = '/home/u24550p18816/domains/bsenn.nl/public_html/osolemio/images/products/' . $imageName;
            Image::make($image)->resize(600, 600)->save($location);
            $product->image = $imageName;
        }

        $product->name = ucfirst($request->name);
        $product->type = $request->type;
        $product->price = $request->price;
        $product->description = ucfirst($request->description);


        $product->save();

        return redirect()->back();
    }
}
