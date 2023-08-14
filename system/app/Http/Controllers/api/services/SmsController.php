<?php

namespace App\Http\Controllers\api\services;

use App\Http\Controllers\Controller;
use App\Services\AfricasTalking\Sms\SmsService;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    protected SmsService $smsService;
    // Set the numbers you want to send to in international format
    private $numOfRecipients;
    private $recipients = "+254711XXXYYY,+254733YYYZZZ";

    // Set your message
    private $message = "I'm a lumberjack and its ok, I sleep all night and I work all day";

    // Set your shortCode or senderId
    private $from = "myShortCode or mySenderId";

    public function __construct()
    {
        $this->smsService = new SmsService();
    }


    public function sendSms(Request $request)
    {
        //receiving recipients as a String and the message curated.
//        $recipients = $request->input('recipients');
//        $message = $request->input('message');
        $message = "message from Kenya Referral System";

        $recipients = "+254708392326";


        $result = $this->smsService->sendSms(1, $recipients, $message);

        return response()->json($result);

    }

}
