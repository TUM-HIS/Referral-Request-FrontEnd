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

        $referralId = $referral->id;

        $user = User::find(1);
        $notification = new ReferralRequestSent($referralId);

        Notification::send($user, $notification);

        //$user->notify(new ReferralRequestSent());


 /*
$savedId = $referral->id;
        $SendReferral = new SendReferral();
        $res = json_decode($SendReferral->sendPost($savedId));
        $referral->referralId = $res->referralRes->referralId;

        //local and remote referral ids
        $local = $savedId;
        $remote = $referral->referralId;

        //TESTING
        //dd($res -> referralRes -> localRRID, );
        //dd($local. " " . $remote);
        //dd(gettype($res));

        $referral = Referral::find($local);
        $referral->referralId =$remote;
        $referral->update();*/


        // Redirect to a success page or display a success message
        return Redirect::route('referral.outgoing');
    }



    public function outgoing(){
        $referralRequests = Referral::orderBy('created_at', 'desc')->get();
        //$referralRequests = referralRequest::all();
        return view('referrals.outgoing.outgoing',['referralRequests'=>$referralRequests]);
    }

    public function incomingReferrals(){

        //getting referrals associated to a particular facility

        $referralRequests = Referral::orderBy('created_at', 'desc')->get();
        //$referralRequests = referralRequest::all();

        return view('referrals.index')->with(['referralRequests' => $referralRequests]);

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
