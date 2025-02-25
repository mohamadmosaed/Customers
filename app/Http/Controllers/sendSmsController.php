<?php

namespace App\Http\Controllers;
use Twilio\Rest\Client;

use Illuminate\Http\Request;
use App\Services\JawalySMSService;

class sendSmsController extends Controller
{
    public function whatsapp(){
        $sid    = getenv("TWILIO_SID");
        $token  = getenv("TWILIO_TOKEN");
        $senderNumber=getenv("TWILIO_FROM");
        $twilio = new Client($sid, $token);

        $message = $twilio->messages
          ->create( "+2001025350705",
            array(
                      "body" => "Your Message",
                      "from"=>$senderNumber
            )
          );
          dd('message sent ok');
    }
    public function whatsappJawaly(){
        $sid    = getenv("JAWALY_APP_ID");
        $token  = getenv("JAWALY_APP_SECRET");
        $senderNumber = getenv("JAWALY_SENDER");

        $jawaly = new Client($sid, $token);

        $message = $jawaly->messages
            ->create("+2001025350705", [
                "body" => "Your Message is first message",
                "from" => $senderNumber
            ]);

        dd('message sent ok');
    }
}
