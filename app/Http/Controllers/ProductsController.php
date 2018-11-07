<?php

namespace App\Http\Controllers;


use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProductsController extends Controller
{
    public function index(){
        return view('app');
    }

    public function getAddToCart (Request $request,$id,$price, $item)
    {

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($id, $price, $item);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('app');
    }
    public  function getCart(){
        if(Session::has('cart')){
            return view('app');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('app'/*,['products' => $cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]*/);
    }

}