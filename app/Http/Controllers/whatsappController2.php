<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class whatsappController2 extends Controller
{
    //

    public function getUserNumber(Request $request)
    {
        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://graph.facebook.com/v13.0/100530932683948/messages',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "messaging_product": "whatsapp",
    "to": "2349057333812",
    "type": "template",
    "template": {
        "name": "hello_world",
        "language": {
            "code": "en_US"
        }
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer EAAHkbhDvBtsBAGTsFfbEc3FsjkTAM4ZCPZC0pfI0E0N1pciWQcxbHUBIkl0sZCLxDNY8DjIrBJOCysZAGxxelPUxwXZAs64RGCjZBg9BvZBPazOYt3TS2RiGOqwUgnL1lYBjLnUXqYxLDZCmrdtgCIFlukGP1nEk7g9sVQimZAv0yDeo1RplmDn3iJHjkt25POEBeR1OyyP79swZDZD'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
        return redirect()->back()->with('message', 'Message has been sent successfully');
    }


}



// class whatsappController2 extends Controller
// {
//     //

//     public function getUserNumber(Request $request)
//     {
//         $to = $request->input('phone_number');

//         $message = "A message has been sent to you";

// $phoneNumberid="100530932683948"; //this should come from.env
// $version= "v13.0"; //this should come from.env
// //this should come from.env
// $token = "EAAHkbhDvBtsBAI51sXX5TpTU8T8G3ZCkUy5O4QEpYcprnrZBMetcfz1L9FC9S3MvdysNFxVGt019RMG8F5YjGwTtW9VrpBJSb7IFjeKKxw8ABvqltVOtDECKE6CIla31E79RNJ90zbTmRqpZBlpvrLd10JjCg18P8KT8Sd54XYypyRDuSjEIZB3lzcfT0ZCEddZCPeXJdYkwZDZD";

// $form_params=[
// "messaging_product"=> "whatsapp",
// "to"=>$to,
// "type"=> "template",
// "template"=>[
// "name"=>$message,
// "language"=>[
// "code"=>"en_US"
//         ]
//     ]
// ];


// $curl = curl_init();
// curl_setopt_array($curl, array(
//     CURLOPT_URL => "https://graph.facebook.com/".$version."/".$phoneNumberid."/messages",
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => '',
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 0,
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => 'POST',
//     CURLOPT_POSTFIELDS => json_encode($form_params),
//     CURLOPT_HTTPHEADER => array(
// "Authorization: Bearer $token",
// 'Content-Type: application/json',
// ),
// ));
// $response = curl_exec($curl);

// // return $form_params;
// if($response === FALSE) {
//     die(curl_error($curl));
// return "Curl didn't work";
// }
//         return redirect()->back()->with('message', 'Message has been sent successfully');
//     }
// }