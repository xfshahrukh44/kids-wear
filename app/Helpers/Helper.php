<?php

use App\Product;

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

function login_fedex ($client_id = 'l73ccffdbd6b7048f7aa2cbe4e611f1f94', $client_secret = 'd48322c8ee714556ad5a5b0dd092f221'){
    $ch = curl_init();
    curl_setopt(
        $ch,
        CURLOPT_URL,
        'https://apis-sandbox.fedex.com/oauth/token'
    );
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt(
        $ch,
        CURLOPT_POSTFIELDS,
        'grant_type=client_credentials&client_id='.$client_id.'&client_secret='.$client_secret
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded',
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $token = json_decode(curl_exec($ch))->access_token;
    curl_close($ch);
    return $token;

}

function create_fedex_shipment ($data) {
    $cart = Session::get('cart');
    $requestedPackageLineItems = [];
    foreach ($cart as $key => $value) {
        $weightarray = [
            'weight' => [
                'units' => 'KG',
                'value' => Product::find($value['id'])->weight ?? 1.0,
            ],
        ];
        for ($i = 0; $i < $value['qty']; $i++) {
            array_push($requestedPackageLineItems, $weightarray);
        }
    }


    $shippingArray = [
        "index" => \Str::random(10),
        "requestedShipment" => [
            "shipper" => [
                "contact" => [
                    "personName" => "Vivian Eugene",
                    "phoneNumber" => '2156136030',
                ],
                "address" => [
                    "streetLines" => ['7714 Castor Ave, Philadelphia, PA 19152, USA'],
                    "city" => 'Philadelphia',
                    "stateOrProvinceCode" => "PA",
                    "postalCode" => "19152",
                    "countryCode" => "US",
                ],
            ],
            "recipients" => [
                [
                    "contact" => [
                        "personName" => $data['first_name'],
                        "phoneNumber" => $data['phone']
                    ],
                    "address" => [
                        "streetLines" => [$data['address_line_1']],
                        "city" => $data['city'],
                        "stateOrProvinceCode" => $data['state'],
                        "postalCode" => $data['postal_code'],
                        "countryCode" => $data['country'],
                    ],
                ],
            ],
            "serviceType" => $data['country'] == "US" ? "FEDEX_2_DAY" : "INTERNATIONAL_ECONOMY",
            "packagingType" => "YOUR_PACKAGING",
            "pickupType" => "CONTACT_FEDEX_TO_SCHEDULE",
            "shippingChargesPayment" => ["paymentType" => "SENDER"],
            "requestedPackageLineItems" => $requestedPackageLineItems
        ],
        "labelResponseOptions" => 'URL_ONLY',
        "accountNumber" => ["value" => "740561073"],
    ];

    $ch = curl_init(
//        'https://apis-sandbox.fedex.com/ship/v1/openshipments/create'
        'https://apis-sandbox.fedex.com/ship/v1/shipments'
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type:application/json',
        'authorization:Bearer ' . login_fedex(),
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($shippingArray));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //gzip
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");

    $apiResponse = json_decode(curl_exec($ch));

    if($apiResponse->output->transactionShipments){

        return [
            'success' => true,
            'tracking_number'=>$apiResponse->output->transactionShipments[0]->masterTrackingNumber
        ];

    }
    else{
        return [
            'success' => false,
            'tracking_number'=>$apiResponse->errors[0]->message
        ];
    }
}

