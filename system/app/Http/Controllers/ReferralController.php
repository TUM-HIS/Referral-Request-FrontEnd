<?php

namespace App\Http\Controllers;

//use ;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class ReferralController extends Controller
{
    public function index(){

        $referrals = [];

        return view('referrals.index')->with(['referrals' => $referrals]);
    }

    public function outgoingReferrals(){

        $referrals = [];

        return view('referrals.outgoing.outgoing')->with(['referrals' => $referrals]);
    }

    public function addReferral(){

        return view('referrals.addReferral');
    }

//    public function getFacilities(){
//
//        $apifacilities = Http::withToken('xN1xg42a71GUnXs9Kwf2VLrik7Jtq2')->get('http://api.kmhfltest.health.go.ke/api/facilities/facilities/?format=json');
//
//        return $apifacilities['results'];
//
//    }


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
