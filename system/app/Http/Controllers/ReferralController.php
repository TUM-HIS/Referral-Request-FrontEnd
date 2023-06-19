<?php

namespace App\Http\Controllers;

//use ;
use App\Models\m_f_l_s;
use App\Models\User;
use App\Notifications\ReferralRequestSent;
use App\utils\SendReferral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use App\Models\Patient;
use App\Models\Referral;
use App\Models\Mappings;

class ReferralController extends Controller
{
    public function index(){

        $referrals = [];

        return view('referrals.index')->with(['referrals' => $referrals]);
    }

    public function addReferral(){

        return view('referrals.addReferral');
    }

    public function destroy(referral $referral) {
        $referralRequests = Referral::where('id', $referral->id)->first();

        // Perform any additional checks or authorization if needed
        if (!$referralRequests) {
            return redirect()->route('referrals.outgoing')->with('error', 'Record not found');
        }
        // Delete the record
        $referralRequests->delete();

        return redirect()->route('referrals.outgoing.outgoing')->with('success', 'Record deleted successfully');

    }

    public function facilities(){

        return view('referrals.facilities');
    }
    public function medicalTerms(){

        return view('referrals.medicalTerms');
    }

    public function worklist(){

        $patients = Patient::all(); // Retrieve all patients from the database

        return view('referrals.worklist', ['patients' => $patients]);
    }

    public function createreferal(Patient $patient){

        $facilities = m_f_l_s::take(20)->get();
        $patientDetails = Patient::where('id', $patient->id)->first();
        $diagnosis = Mappings::select('id', 'from concept name')->get();

        return view('referrals.createReferral')->with(['facilities' => $facilities, 'patient' => $patientDetails, 'diagnosis' => $diagnosis]);
    }

    public function viewReferal(Referral $referral){

        // $facilities = m_f_l_s::take(20)->get();
        // $patientDetails = Patient::where('id', $patient->id)->first();
        $referralRequests = Referral::where('id', $referral->id)->first();
        $patientDetails = Patient::where('upi', $referral->clientUPI)->first();

        $data = [
            'referral' => $referralRequests,
            'patient' => $patientDetails,
        ];


        return view('referrals.outgoing.viewReferral', $data);
    }

    public function viewIncomingReferal(Referral $referral){

        // $facilities = m_f_l_s::take(20)->get();
        // $patientDetails = Patient::where('id', $patient->id)->first();
        $referralRequests = Referral::where('id', $referral->id)->first();
        $patientDetails = Patient::where('upi', $referral->clientUPI)->first();

        $data = [
            'referral' => $referralRequests,
            'patient' => $patientDetails,
        ];


        return view('referrals.incoming.viewReferral', $data);
    }


    public function submitReferral(Request $request)
    {
        //Validate the form data
        $validatedData = $request->validate([
            'referringOfficer' => 'required',
            //'reasonReferral' => 'required',
            'priorityLevel' => 'required',
            // Add validation rules for other form fields
        ]);

        // Create a new referral instance
        $referral = new Referral;
        $referral->clientName = $request->input('clientName');
        $referral->clientUPI = $request->input('clientUPI');
        $referral->referringOfficer = Auth::user()->name;
        $referral->referring_facility_id = Auth::user()->facility_id;
        $referral->historyInvestigation = $request->input('historyInvestigation');
        $referral->diagnosis = $request->input('diagnosis');
        $referral->reasonReferral = $request->input('reasonReferral');
        $referral->attachments = $request->input('attachments');
        $referral->additionalNotes = $request->input('additionalNotes');
        $referral->priorityLevel = $request->input('priorityLevel');
        $referral->serviceCategory = $request->input('serviceCategory');
        $referral->service = $request->input('service');
        $referral->referredFacility = $request->input('facility');
        $referral->distance = $request->input('distance');
        $referral->serviceNotes = $request->input('serviceNotes');


        // Save the referral to the database
        $referral->save();

        //return redirect()->back()->with('success', 'Referral Request Submitted successfully');


        $referralId = $referral->id;

        $user = Auth::user();
        $userFacility = $user->userFacility;

        $facility = m_f_l_s::where('Code', $referral->referredFacility)->first();
        $notification = new ReferralRequestSent($referralId, $userFacility->Code, "Referral Request");

        Notification::send($facility, $notification);



 /*
        $savedId = $referral->id;
        $SendReferral = new SendReferral();
        $res = json_decode($SendReferral->sendPost($savedId));
        $referral->referralId = $res->referralRes->referralId;

        //local and remote referral ids
        $local = $savedId;
        $remote = $referral->referralId;

        $referral = Referral::find($local);
        $referral->referralId =$remote;
        $referral->update();*/


        // Redirect to a success page or display a success message
        return Redirect::route('referral.outgoing')->with('success', 'Referral Request Submitted successfully');
    }



    public function outgoing(){
        $loggedInuserFacility = Auth::user()->userFacility->Code;
        $referrals = Referral::where('referredFacility', $loggedInuserFacility)
            ->orderBy('created_at', 'desc')
            ->get();

        //$referralRequests = referralRequest::all();
        return view('referrals.outgoing.outgoing',['referralRequests'=>$referrals]);
    }



    public function incomingReferrals(){
        //getting referrals associated to a particular facility
        $referralRequests = Referral::orderBy('created_at', 'desc')->get();

         $loggedInuserFacility = Auth::user()->userFacility->Code;

        //dd($loggedInuserFacility);

        $referrals = Referral::where('referredFacility', $loggedInuserFacility)
            ->orderBy('created_at', 'desc')
            ->get();

        //dd($referrals);

        return view('referrals.index')->with(['referralRequests' => $referrals]);

    }



    public function acceptReferralRequest(Referral $referral){
        $referral->status = "Accepted"; // Assign the new value to the column
        $referral->save();

        $user = Auth::user();
        $userFacility = $user->userFacility;
        $userFacility->unreadNotifications
            ->where('data.referral_id', $referral->id)
            ->each(function ($notification) {
                $notification->markAsRead();
                // Perform any other necessary updates
            });



        $referralRequests = Referral::orderBy('created_at', 'desc')->get();
        //$referralRequests = referralRequest::all();
        return  redirect()->route('referrals.incoming')->with(['referralRequests' => $referralRequests]);

    }

    public function rejectReferralRequest(Referral $referral){

        $referral->status = "Rejected"; // Assign the new value to the column
        $referral->save();

        //changing the status of the notification
        $user = Auth::user();
        $userFacility = $user->userFacility;
        $userFacility->unreadNotifications
            ->where('data.referral_id', $referral->id)
            ->each(function ($notification) {
                $notification->markAsRead();
                //you can add aditional code here for more functionality

            });

        //sending notification to referral facility of rejected referral
        $referralId = $referral->id;
        $facility = m_f_l_s::where('Code', $referral->referring_facility_id)->first();
        $notification = new ReferralRequestSent($referralId,$userFacility->Code , "Referral Request Rejected");

        Notification::send($facility, $notification);

        $referralRequests = Referral::orderBy('created_at', 'desc')->get();

        return redirect()->route('referrals.incoming')->with(['referralRequests' => $referralRequests]);
    }




    public function reviewed(){

        return view('referrals.incoming.reviewed');
    }

    public function counterReferral(){

        return view('referrals.incoming.counter-referral');
    }






















    public function fhirJson(){

        $json = [
            'resourceType' => 'referralRequest',
            "id" => "df792cca-af36-47ab-81b3-c9770fbe4bfd",
            "status" => "active",
            "subject"=> [
                "reference" => "https://client.registry/0-TGGA-rrTT",
                "code" => '0-TGGA-rrTT',
                "display"=> "John Doe"
                ],
            "priority"=> "STAT",
            "requester"=> [
                "reference"=> "https://worker.registry/0-TGGA-TYRTT",
                "code" => "0-TGGA-TYRTT",
                "display"=> "Dr. Jane Smith"
                ],
            "specialty"=> [
                "coding"=> [
                        "system"=> "http://nhdd.health.go.ke",
                        "code"=> "394585001",
                        "display"=> "Cardiology"
                        ],
                "text" => "Cardiology"
                ],
            "recipient"=> [
                [
                    "reference"=> "https://facility-registy.com/t6gr86gfrr",
                    "code" => "t6gr86gfrr",
                    "display" => "Coast General",
                ]
                ],
            "reasonCode"=> [
                "coding"=> [
                    "system"=> "http://nhdd.health.go.ke/162864005",
                    "code"=> "162864005",
                    "display"=> "Chest pain"
                ],
                "text" => "Chest Pain",
                ],
            "authoredOn"=> "2023-04-13T12:00:00Z",
            "reasonReference" => [
                [
                    "reference" => 'https://shr.go.ke/345678',
                    "code" => '345678',
                    "display" => 'specialized treatment'
                ],
                ] ,
           "relevantHistory" => [
               [
                "reference" => 'https://shr.go.ke/43GS556GSG',
               "code" => '43GS556GSG',
               'display' => 'Malaria include vitals',
               ],
               [
               "reference" => 'https://shr.go.ke/43GS556G8G',
               "code" => '43GS556G8G',
               "display" => 'TB Infection',
               ]
               ],
            "type" => [
                "coding" => [
                    "reference" => 'https://nhdd.go.ke/46765efg567',
                    "code" => '46765efg567',
                    "display" => 'Referral to cardiology service',
                ],
                ],
            "context" => [
                "reference" => "https://shr.go.ke/encounter/344S656S55S",
                "code" => "344S656S55S",
                "text" => "Episode 10",
                ],
            "supportingInfo" => [
                [
                "reference" => "https://shr.go.ke/34567823H",
                "code" => "34567823H",
                "text" => "Medical history, lab results and clinical notes and triage",
                ],
                [
                "reference" => "https://shr.go.ke/34567823H",
                "code" => "34567823H",
                "text" => "Medical history, lab results and clinical notes",
                ],
                [
                "reference" => "https://shr.go.ke/34567823H",
                "code" => "34567823H",
                "text" => "Medical history, lab results and clinical notes",
                ]
            ],

        ];

        $headers = [
          'Content-Type' => 'application',
          'Accept' => 'application/json'
        ];

        return response()->json($json);
    }
}













//
//
//
//
//
//"supportingInfo": [
//    {
//        "reference": "Observation/example",
//      "code": {
//        "coding": [
//          {
//              "system": "http://loinc.org",
//            "code": "8302-2",
//            "display": "Height"
//          }
//        ],
//        "text": "Patient height"
//      }
//    },
//    {
//        "code": {
//        "coding": [
//          {
//              "system": "http://snomed.info/sct",
//            "code": "162864005",
//            "display": "Vital signs"
//          }
//        ],
//        "text": "Clinical note"
//
//
//
//
//
//
//
//
//
//
//        "supportingInfo": [
//    {
//        "reference": "Observation/example-lab-result",
//      "code": {
//        "coding": [
//          {
//              "system": "http://loinc.org",
//            "code": "94531-1",
//            "display": "SARS-CoV-2 (COVID-19) RNA panel - Respiratory specimen by NAA with probe detection"
//          }
//        ],
//        "text": "COVID-19 lab results"
//      }
//    },
//    {
//        "reference": "DocumentReference/example-clinical-note",
//      "code": {
//        "coding": [
//          {
