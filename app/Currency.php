<?php

namespace App;

class Currency
{
    //Default
    public $currencyType = "USD";
    public $currencyRate = 1.0;

    public function __construct ($oldCurrency)
    {
        //old session constructor
        if ($oldCurrency) {
            $this->currencyType = $oldCurrency->currencyType;
            $this->currencyRate = $oldCurrency->currencyRate;
        }

    }

    public function changeCurrency($type,$rate) {
        $this->currencyRate = $rate;
        $this->currencyType = $type;
    }

}