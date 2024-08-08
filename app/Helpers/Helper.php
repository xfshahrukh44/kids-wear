<?php

function create_clover_order () {
    try {
        $url = "https://api.clover.com/v3/merchants/GRAD162XT6731/orders";

        // Initialize cURL session
        $ch = curl_init($url);

        // Set the necessary cURL options
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer 81f36ac3-2713-12c1-ed6c-f66d868fe0e9', // Replace with your actual access token
        ]);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the request
        $response = curl_exec($ch);

        if ($res = json_decode($response)) {
            return $res->id;
        }

        return false;
    } catch (\Exception $e) {
        return false;
    }
}

function create_clover_payment ($order_id, $amount, $number, $exp_month, $exp_year, $cvc) {
    try {
        $url = "https://api.clover.com/v3/merchants/GRAD162XT6731/payments";

        // Initialize cURL session
        $ch = curl_init($url);

        // Set the necessary cURL options
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer 81f36ac3-2713-12c1-ed6c-f66d868fe0e9', // Replace with your actual access token
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'amount' => $amount,
            'currency' => 'USD',
            'source' => [
                'type' => 'card',
                'card' => [
                    'number' => $number,
                    'exp_month' => $exp_month,
                    'exp_year' => $exp_year,
                    'cvc' => $cvc,
                ],
            ],
            'order' => [
                'id' => $order_id
            ],
            'tender' => [
                'id' => 'YP99ERD3HAJAY'
            ]
        ]));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the request
        $response = curl_exec($ch);

        if ($res = json_decode($response)) {
            if ($res->result && $res->result == 'SUCCESS') {
                return true;
            }

            return false;
        }

        return false;
    } catch (\Exception $e) {
        return false;
    }
}

