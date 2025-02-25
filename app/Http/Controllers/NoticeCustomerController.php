<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\NoticeCustomer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
class NoticeCustomerController extends Controller
{

    public function index()
    {
        $currentDay = Carbon::now()->toDateString();

        $customer = Customer::where('support_end', '<', $currentDay)->get();

        return view('NoticeCustomer.index',compact('customer'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(NoticeCustomer $noticeCustomer)
    {
        //
    }


    public function edit(NoticeCustomer $noticeCustomer)
    {
        //
    }


    public function update(Request $request, NoticeCustomer $noticeCustomer)
    {
        //
    }


    public function destroy(NoticeCustomer $noticeCustomer)
    {
        //
    }
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
}
