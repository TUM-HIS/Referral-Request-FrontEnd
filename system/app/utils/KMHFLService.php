<?php

namespace App\utils;

class KMHFLService
{

    public function facilitiesFromServiceId(){
        $curl = curl_init();
        $url = 'http://127.0.0.1:8000/api/referral/serviceRequest';

        $headers = [
            'Content-Type: application/json',
            'Authorization: Basic '
        ];
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        //SOME MORE LOGIC IN HERE
        $requestBody = null;


        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestBody));

        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            // Handle the error
        } else {
            // Process the response
            // $response contains the response body

            echo $response;

            $info = curl_getinfo($curl);

            // Display the response details
            echo "HTTP Code: " . $info['http_code'] . "\n";
            echo "Response Body: " . $response . "\n";
        }

        // Close the cURL handle
        curl_close($curl);

        return $response;
    }

}
