<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

trait SparcoTrait {

    public function verifyTransaction($merchantReference)
    {
        $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://live.sparco.io/gateway/api/v1/transaction/query?merchantReference='.$merchantReference.'',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwdWJLZXkiOiJkZTdhZmQ2MTc2YmI0ZWZmOTkzMTZkY2Y1MDhlNWJlNiIsImlhdCI6MTY5MjcwNzIwOH0.Qi6KFBzFy7iST0bFylG-Vb5cpzVJ710lg1V296uRKck',
            ),
        ));
    
        $response = curl_exec($curl);
        $result = json_decode($response);
    
        curl_close($curl);
        return ($result);
    }  

    public function collect(array $request){

        try {
                    $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));
        // Prepare the payload data as a JSON string
        $data = [
            "transactionName"=> "Online Counseling Service",
            "amount"=> 1,
            "currency"=> $request['currency'],
            "chargeMe"=> "true",
            "wallet"=>  $request['wallet'],
            "transactionReference"=> $uuid,
            "customerFirstName"=> $request['customerFirstName'],
            "customerLastName"=> $request['customerLastName'],
            "customerEmail"=> $request['customerEmail'],
            "customerPhone"=> $request['wallet'],
            "returnUrl"=> "http://localhost/Sparco/verify_pay.php?ref=".$uuid,
            "autoReturn"=> "true", // Fix the variable interpolation
            "merchantPublicKey"=> "de7afd6176bb4eff99316dcf508e5be6"
        ];

        // Convert the data to bytes
        $payload = json_encode(["payload" => $data], JSON_UNESCAPED_UNICODE);
        // dd($payload);
        $token ='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwdWJLZXkiOiJkZTdhZmQ2MTc2YmI0ZWZmOTkzMTZkY2Y1MDhlNWJlNiIsImlhdCI6MTY5Mjc0MDk5NH0._bpDmqyjKNEmJl82BDLOxfhh74UTP_BTQ8tATqFlmyE';
        // $byteToken = utf8_encode($token);
        // Set the cURL options
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://live.sparco.io/gateway/api/v1/momo/credit');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-PUB-KEY: de7afd6176bb4eff99316dcf508e5be6',
            'Content-Type: application/json',
            'token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwdWJLZXkiOiJkZTdhZmQ2MTc2YmI0ZWZmOTkzMTZkY2Y1MDhlNWJlNiIsImlhdCI6MTY5Mjc0MDk5NH0._bpDmqyjKNEmJl82BDLOxfhh74UTP_BTQ8tATqFlmyE',
        ]);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);

        // Execute the cURL request
        $response = curl_exec($curl);

        // Check for cURL errors
        if (curl_errno($curl)) {
            echo 'Request failed: ' . curl_error($curl);
            exit;
        }
        curl_close($curl);

        dd($response);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function collect2(array $request){
        // UUID ID generator
        $uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));

        $curl = curl_init();
        $var = true;

        curl_setopt_array($curl, array(
            // CURLOPT_URL => 'https://live.sparco.io/gateway/api/v1/momo/debit',
            CURLOPT_URL => 'https://checkout.sparco.io/gateway/api/v1/checkout',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "transactionName": "Online Counseling Service",
                "amount": "'.$request['amount'].'",
                "currency": "'.$request['currency'].'",
                "chargeMe": "true",
                "wallet":  "'.$request['wallet'].'",
                "customerAddr": "Test",
                "customerCity": "Lusaka",
                "customerState": "Lusaka",
                "customerCountryCode": "ZM",
                "customerPostalCode": "10101",
                "transactionReference": "'.$uuid.'",
                "customerFirstName": "'.$request['customerFirstName'].'",
                "customerLastName": "'.$request['customerLastName'].'",
                "customerEmail": "'.$request['customerEmail'].'",
                "customerPhone": "'.$request['wallet'].'",
                "returnUrl": "https://nsansawellness.com/transaction-summary/'.auth()->user()->id.'/'.$request['billing_id'].'/'.$uuid.'",
                "autoReturn": '.$var.',
                "webhookUrl": "https://2150-165-58-129-124.ngrok.io/webhook?src=test",
                "merchantPublicKey": "de7afd6176bb4eff99316dcf508e5be6"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwdWJLZXkiOiJkZTdhZmQ2MTc2YmI0ZWZmOTkzMTZkY2Y1MDhlNWJlNiIsImlhdCI6MTY5MjcwNzIwOH0.Qi6KFBzFy7iST0bFylG-Vb5cpzVJ710lg1V296uRKck',
                'X-PUB-KEY; de7afd6176bb4eff99316dcf508e5be6' 
            ),
        ));

        $response = curl_exec($curl);
        $result = json_decode($response);
        curl_close($curl);

        // Checkout link
        // print_r($result);
        // Return checkout link or json data
        return $result;
    }

    public function disburse(array $request){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://live.sparco.io/gateway/api/v1/momo/credit',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $request,
            CURLOPT_HTTPHEADER => array(
                'X-PUB-KEY: de7afd6176bb4eff99316dcf508e5be6',
                'Content-Type: application/json',
                'token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwdWJLZXkiOiJkZTdhZmQ2MTc2YmI0ZWZmOTkzMTZkY2Y1MDhlNWJlNiIsImlhdCI6MTY5MjcwNzIwOH0.Qi6KFBzFy7iST0bFylG-Vb5cpzVJ710lg1V296uRKck'
            ),
        ));
    
        $response = curl_exec($curl);
    
        curl_close($curl);
    
        return $response;
    }

    public function card(){

    }



}