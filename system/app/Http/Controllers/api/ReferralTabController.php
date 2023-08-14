<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\api\services\SmsController;
use App\Http\Controllers\Controller;
use App\Models\m_f_l_s;
use App\Models\Referral;
use App\Models\User;
use App\Notifications\ReferralRequestSent;
use App\Services\AfricasTalking\Sms\SmsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

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
        $referringFacilityCode = $request->referringFacilityCode;
        $referredFacilityCode = $request->referredFacilityCode;
        $referralId = $request->referralId;
        $referringFacility = m_f_l_s::where('Code', $referringFacilityCode)->first();
        $officialName = $referringFacility->Officialname;
        $this->smsService  = new SmsService();
        $message = "Referral Request recieved from ".$officialName;
        $recipients = "+254708392326";

        $result = $this->smsService->sendSms(1, $recipients, $message);


        $facility = m_f_l_s::where('Code', $referredFacilityCode)->first();
        $notification = new ReferralRequestSent($referralId, $referringFacilityCode, "Referral Request");

        Notification::send($facility, $notification);
//      return Redirect::route('referral.outgoing')->with('success', 'Referral Request Submitted successfully');

        return response()->json($result);

//        return response()->json(
//            ['success' => true]
//        );

    }
}
