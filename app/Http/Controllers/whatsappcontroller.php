<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class whatsappcontroller extends Controller
{



    public function getUserNumber(Request $request)
    {
        $to = $request->input('phone_number');

        $message = "A message has been sent to you";

        $this->WhatappMsg($to, $message);
// $this->initiateSmsGuzzle($phone_number, $message);

        return redirect()->back()->with('message', 'Message has been sent successfully');
    }




    public function WhatappMsg($to, $message)
{
$phoneNumberid="100530932683948"; //this should come from.env
$version= "v13.0"; //this should come from.env
//this should come from.env
$token
="EAAHkbhDvBtsBACfgeDVQnYU2rQX6vJZBsyJsyDPb5ZC686dwfFh80bBkTLCUH5ChNbuTlmdaKPwGWW6KvBRjZC9t6Cgs87JrJICqgbskFMTXHxfAzLc6ZBJdCNXXbQF4NZB75DaGnKzMLnZBqCSrppvBmPkRPT9alO4Dcx0bvgCouxZBd0rhUaixE7bFct9KBpJZCkqVP7RhfAZDZD";

$form_params=[
"messaging_product"=> "whatsapp",
"to"=>$to,
"type"=> "template",
"template"=>[
"name"=>$message,
"language"=>[
"code"=>"en_US"
        ]
    ]
];


$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://graph.facebook.com/$version/$phoneNumberid/messages",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($form_params),
    CURLOPT_HTTPHEADER => array(
"Authorization: Bearer $token",
'Content-Type: application/json',
),
));
$response = curl_exec($curl);
}
}