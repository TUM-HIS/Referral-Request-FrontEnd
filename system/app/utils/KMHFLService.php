<?php

namespace App\utils;
use Illuminate\Support\Facades\Http;


class KMHFLService
{

    public static function facilitiesFromServiceId($serviceId){

        $response = Http::withHeaders([
            'Authorization' => 'Bearer dP6McfKHK3sbOUwCrrVcmrcnDxqlB9',
        ])
            ->get('http://api.kmhfltest.health.go.ke/api/facilities/facility_services', [
                'format' => 'json',
                'service' => '368c963a-b8de-461b-aa82-5ee1b0c0e391',
            ]);

        if ($response->failed()) {
            $error = $response->body();
            // Handle the error
        } else {
            echo $response->body();
            echo "HTTP Code: " . $response->status() . "\n";
            echo "Response Body: " . $response->body() . "\n";
        }

        return $response->body();

    }

}
