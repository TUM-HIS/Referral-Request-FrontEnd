<?php

namespace App\utils;
use Illuminate\Support\Facades\Http;


class KMHFLService
{
    protected $mykmhflkey = "IAJVYgkRSL3qzzoYK5hclmGEGxD0HH";

    // Constructor
    public function __construct()
    {
        $this->mykmhflkey = "IAJVYgkRSL3qzzoYK5hclmGEGxD0HH";

    }




    public function facilitiesFromServiceId($serviceId){

        $response = $this->facilityIdsFromService();
       $results = $response['results'];

       //FOR TESTING PURPOSES
//       $facilityId =  $results[0]['facility'];
//        return$facilityInfo = $this->facilitiesFromFacilityIds($facilityId);


        $facilities = [];
        $facilityIds = [];
        foreach ($results as $item) {
            $facilityId = $item['facility'];
            // Use the facility ID to fetch facility information
            $facilityInfo = $this->facilitiesFromFacilityIds($facilityId);
            $facilities[] = $facilityInfo;
            $facilityIds = $facilityId;
        }

        return $facilities;

//        return $results;

    }


    public function facilitiesFromFacilityIds($facilityId){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->mykmhflkey,
        ])
            ->get('http://api.kmhfltest.health.go.ke/api/facilities/facilities', [
                'format' => 'json',
                'id' => $facilityId,
            ]);

        if ($response->failed()) {
            $error = $response->body();
            // Handle the error
        } else {
            $jsonResponse = $response->json();
            return $jsonResponse;
        }

    }


    public function facilityIdsFromService(){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->mykmhflkey,
        ])
            ->get('http://api.kmhfltest.health.go.ke/api/facilities/facility_services', [
                'format' => 'json',
                'service' => '368c963a-b8de-461b-aa82-5ee1b0c0e391',
                'county' => 'Nairobi'
            ]);

        if ($response->failed()) {
            $error = $response->body();
            // Handle the error
        } else {
            return $response->json();
        }
    }


    public function countyIdFromName($county_name){

        $response = Http::withHeaders([
            'Authorization' => 'Bearer dP6McfKHK3sbOUwCrrVcmrcnDxqlB9',
        ])
            ->get('http://api.kmhfltest.health.go.ke/api/common/counties', [
                'format' => 'json',
                'name' => 'Nairobi',
            ]);

        if ($response->failed()) {
            $error = $response->body();
            // Handle the error
        } else {
            return $response->json();
        }

    }

}
