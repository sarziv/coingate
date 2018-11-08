<?php

namespace App\Http\Controllers;


use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProductsController extends Controller
{
    public function index ()
    {
        $products = Product::all();
        return view('app', ['products' => $products]);
    }

    public function getAddToCart (Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        //session()->flush();

        return redirect()->route('app');
    }

    public function getCart ()
    {
        if (Session::has('cart')) {
            return view('app');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('app'/*,['products' => $cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]*/);
    }
}