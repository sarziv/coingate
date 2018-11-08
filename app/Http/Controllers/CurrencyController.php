<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CurrencyController extends Controller
{
    public function index ()
    {
        //Receive currency type
    }

    public function setCurrency (Request $request, $type)
    {
        //set up product currency
        $client = new \GuzzleHttp\Client();
        $requestClient = $client->get("https://api.coingate.com/v2/rates/merchant/USD/" . "$type");
        $rate = $requestClient->getBody()->getContents();

        $oldCurrency = Session::has('currency') ? Session::get('currency') : null;
        $currency = New Currency($oldCurrency);

        $currency->changeCurrency($type,$rate);

        $request->session()->put('currency', $currency);

        return redirect()->route('app');
    }


}
