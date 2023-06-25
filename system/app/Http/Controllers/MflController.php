<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\utils\KMHFLService;
use Illuminate\Http\Request;

class MflController extends Controller
{
      public function getFacilityFromService(Request $request){

        $serviceId = $request->service_id;
        $kmhflService = new KMHFLService();
        $kmhflServiceResponse = $kmhflService->facilitiesFromServiceId($serviceId);

        return $kmhflServiceResponse;
    }



    public function getServiceFromCategory(Request $request){
        $categoryName = $request->input('category_name');
        $services = Service::where('category_name', $categoryName)->get();
        return response()->json($services);
    }
}
