<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class MflController extends Controller
{
    public function index(){

    }

    public function getServiceFromCategory(Request $request){
        $categoryName = $request->input('category_name');

        // Fetch the services based on the category ID
        $services = Service::where('category_name', $categoryName)->get();

        //dd($services);
        // You can modify the response format as per your requirement
        return response()->json($services);
    }
}
