<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Validator;
use App\Person;

class BulkSmsController extends Controller
{
    public function sendSms(Request $request){
        // Twillio Credentials
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $client = new Client($sid,$token);

        $validator = Validator::make($request->all(),[
            'numbers'=>'required',
            'message'=>'required'
        ]);

        if ($validator->passes()){
            $numbers_in_arrays = explode(',',$request->input('numbers'));
            $message = $request->input('message');
            $count = 0;

            foreach($numbers_in_arrays as $number){
                $count++;
                $client->messages->create(
                    $number,
                    [
                        'from' => env('TWILIO_FROM'),
                        'body' => $message
                    ]
                );
            }
            return back()->with('success',$count . "message sent!");
        }else{
            return back()->withErrors($validator);
        }
    }

    public function sendForm(){
        $applicants = Person::with('allocation')->where('','Approved')->get();
        return view('sms.bulksms',compact('applicants'));
    }
}