<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use Illuminate\Http\Request;

class ReferralTabController extends Controller
{




    function saveTab1Data(Request $request){
        $referral = new Referral;
        $referringOfficer = $request->input('referringOfficer');



        return response()->json("success: ".$referringOfficer);
    }

    function saveTab2Data(Request $request){
        $referralId = $request->referral_id;
        $referralRequests = Referral::where('id', $referralId)->first();
    }
}
