<?php

namespace App;


class Checkout
{

    public function checkoutPayment ($price_amount,$price_currency)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api-sandbox.coingate.com/v2/orders",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "price_amount=".$price_amount."&price_currency=USD&receive_currency=".$price_currency,
            CURLOPT_HTTPHEADER => array(
                "authorization: Token hzXf1jWdbBH8xogfmze27nmptdRVUg-YsPs8wy-B",
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
                "postman-token: b1fde5cd-d8af-eb5c-92ca-074c0263f759"
            ),
        ));
        $response = curl_exec($curl);

        curl_close($curl);
        $json = json_decode($response, true);

        return $json['payment_url'];

    }
}


