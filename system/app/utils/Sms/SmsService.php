<?php

namespace App\Services\AfricasTalking\Sms;

use AfricasTalking\SDK\AfricasTalking;
use Exception;

class SmsService
{
    private String $username;
    private String $apiKey;
    private String $from;
    private AfricasTalking $AT;

    public function __construct()
    {
        //$this->username = env('AT_USERNAME');
        $this->username = "teka";
        $this->apiKey = env('AT_KEY');
        //$this->from = env('AT_FROM');
        $this->from = "";

        // Initialize the SDK
        $this->AT = new AfricasTalking($this->username, $this->apiKey);
    }


    public function sendSms($numOfRecipients, $recipients, $message)
    {
        try {
            // Get the SMS service
            $sms = $this->AT->sms();

            $result = $sms->send([
                'to' => $recipients,
                'message' => $message,
                'from' => ""
            ]);

            return $result;

        } catch (Exception $e) {
            return "error: ".$e;
        }
    }



}
