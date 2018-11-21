<?php

namespace App\Http\Controllers;


use App\Cart;
use App\Currency;
use App\Product;
use App\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProductsController extends Controller
{
    public function index ()
    {

        $products = Product::all();
        if (!Session::has('cart') && !Session::has('currency')) {
            return view('app', compact(['products']));
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $oldCurrency = Session::get('currency');
        $currency = new Currency($oldCurrency);

        //View
        $items = $cart->items;
        $totalPrice = $cart->totalPrice;
        $totalQty = $cart->totalQty;
        $currencyType = $currency->currencyType;
        $currencyRate = $currency->currencyRate;

        return view('app', compact(['products', 'items', 'totalPrice', 'totalQty', 'currencyType', 'currencyRate']));
    }

    public function getAddToCart (Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);

        return redirect()->route('app');
    }


    public function removeCart ()
    {
        session()->forget('cart');
        return redirect()->route('app');
    }

    public function checkoutCart ()
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $oldCurrency = Session::get('currency');
        $currency = new Currency($oldCurrency);

        $currencyType = $currency->currencyType;
        $totalPrice = $cart->totalPrice;

        if($totalPrice != null && $currencyType != null){
            $checkout = new Checkout();
            $paymenturl = $checkout->checkoutPayment($totalPrice,$currencyType);

        }else{
            echo "Parameters are missing.";
        }

        return redirect($paymenturl);
    }
}