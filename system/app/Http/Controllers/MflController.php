<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\utils\KMHFLService;
use App\utils\KmhflTokenGenerator;
use Illuminate\Http\Request;

class MflController extends Controller
{
      public function getFacilityFromService(Request $request){

        $serviceId = $request->service_id;
        $ownerName = $request->owner_name;
        $kmhflService = new KMHFLService();
        $kmhflServiceResponse = $kmhflService->facilitiesFromServiceId($serviceId, $ownerName);

        return $kmhflServiceResponse;
    }



    public function getServiceFromCategory(Request $request){
        $categoryName = $request->input('category_name');
        $services = Service::where('category_name', $categoryName)->get();
        return response()->json($services);
    }




    public function tokenGenerator(){
         $token =  KmhflTokenGenerator::tokenGenerator();
         return $token;
    }
}
