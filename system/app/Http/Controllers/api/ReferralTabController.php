<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\api\services\SmsController;
use App\Http\Controllers\Controller;
use App\Models\Referral;
use App\Models\User;
use App\Services\AfricasTalking\Sms\SmsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferralTabController extends Controller
{



    function saveTab1Data(Request $request){
        $referral = new Referral;
        $loggedInUserId = $request->input('userId');
        $user = User::where('id', $loggedInUserId)->first();


        $referringOfficer = $request->input('referringOfficer');
        $historyInvestigation = $request->input('historyInvestigation');
        $diagnosis = $request->input('diagnosis');
        $reasonReferral = $request->input('reasonReferral');
        $additionalNotes = $request->input('additionalNotes');
        $priorityLevel = $request->input('priorityLevel');
        $referringFacilityId =$user->facility_id;

        $referral->referringOfficer = $referringOfficer;
        $referral->historyInvestigation = $historyInvestigation;
        $referral->diagnosis = $diagnosis;
        $referral->reasonReferral = $reasonReferral;
        $referral->additionalNotes = $additionalNotes;
       $referral->referring_facility_id = $referringFacilityId;
       $referral->clientName = $request->input('clientName');
       $referral->clientUPI = $request->input('clientUPI');
        $referral->priorityLevel =$priorityLevel;
        $referral->status = "incomplete";

        $referral->save();
        $referralId = $referral->id;



        return response()->json(
            ['success' => true,
                'referralId' => $referralId]
        );
    }

    function saveTab2Data(Request $request){
        $referralId = $request->referralId;
        $referral = Referral::where('id', $referralId)->first();

        $referral->serviceCategory = $request->input('serviceCategory');
        $referral->service = $request->input('service');
        $referral->referredFacility = $request->input('referredFacilityCode');
        $referral->status = "Pending";

        $referral->save();

        return response()->json(
            ['success' => true,
                'referralId' => $referralId]
        );

    }


    protected SmsService $smsService;
    function saveTab3Data(Request $request){
        $this->smsService  = new SmsService();

        $message = "message from Kenya Referral System";

        $recipients = "+254708392326";

        $result = $this->smsService->sendSms(1, $recipients, $message);

        return response()->json($result);

//        return response()->json(
//            ['success' => true]
//        );

    }
}
