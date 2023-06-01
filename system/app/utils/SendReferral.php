<?php

namespace App\utils;

class SendReferral
{
    public function sendpost(){
        $curl = curl_init();

        $url = '';


        $headers = [
            'Content-Type: application/json',
            'Authorization: Basic '
        ];
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


        $requestBody = [
            "resourceType" => "ServiceRequest",
            "identifier" => [
                [
                    "system" => "http://example.com/identifiers",
                    "value" => "12345"
                ]
            ],
            "subject" => [
                "reference" => "Patient/123"
            ],
            "basedOn" => [
                [
                    "reference" => "CarePlan/123"
                ]
            ],
            "status" => "active",
            "intent" => "order",
            "category" => [
                [
                    "coding" => [
                        [
                            "system" => "http://example.com/categories",
                            "code" => "lab"
                        ]
                    ],
                    "text" => "Laboratory Test"
                ]
            ],
            "priority" => "routine",
            "code" => [
                "coding" => [
                    [
                        "system" => "http://example.com/procedures",
                        "code" => "blood-test",
                        "display" => "Blood Test"
                    ]
                ],
                "text" => "Blood Test"
            ],
            "encounter" => [
                "reference" => "Encounter/123"
            ],
            "occurrenceDateTime" => "2023-04-14T10:30:00+00:00",
            "requester" => [
                "reference" => "Practitioner/123"
            ],
            "performer" => [
                [
                    "reference" => "Practitioner/456"
                ]
            ],
            "reasonCode" => [
                [
                    "coding" => [
                        [
                            "system" => "http://example.com/reasons",
                            "code" => "symptoms",
                            "display" => "Symptoms"
                        ]
                    ],
                    "text" => "Patient is experiencing flu-like symptoms"
                ]
            ],
            "supportingInfo" => [
                [
                    "reference" => "https://shr.go.ke/34567823H"
                ],
                [
                    "reference" => "https://shr.go.ke/34567823H"
                ],
                [
                    "reference" => "https://shr.go.ke/34567823H"
                ],
                [
                    "reference" => "https://shr.go.ke/34567823H",
                    "display" => "Care Plan for Patient",
                    "type" => "CarePlan",
                    "identifier" => [
                        "system" => "http://example.com/identifiers",
                        "value" => "12345"
                    ]
                ]
            ],
            "note" => [
                [
                    "text" => "Patient fasting for 12 hours prior to blood test"
                ]
            ],
            "patientInstruction" => "Please arrive at the lab fasting for at least 12 hours before the appointment",
            "relevantHistory" => [
                [
                    "reference" => "Provenance/123"
                ]
            ],
            "locationCode" => [
                [
                    "coding" => [
                        [
                            "system" => "http://kmhfl.com/location",
                            "code" => "32",
                            "display" => "tudor"
                        ]
                    ],
                    "text" => "Patient is experiencing flu-like symptoms"
                ]

            ]
        ];


        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestBody));

        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            // Handle the error
        } else {
            // Process the response
            // $response contains the response body

            echo $response;

            $info = curl_getinfo($curl);

            // Display the response details
            echo "HTTP Code: " . $info['http_code'] . "\n";
            echo "Response Body: " . $response . "\n";
        }

        // Close the cURL handle
        curl_close($curl);

        return $response;

    }
}

