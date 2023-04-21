<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Validator;
use App\Person;
use App\RepoNotification;

class BulkSmsController extends Controller
{

    public function sendSms(Request $request)
    {
        // Twillio Credentials
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $client = new Client($sid, $token);

        $validator = Validator::make($request->all(), [
            'numbers' => 'required',
            'message' => 'required'
        ]);

        if ($validator->passes()) {
            $numbers_in_arrays = explode(',', $request->input('numbers'));
            $message = $request->input('message');
            $count = 0;

            foreach ($numbers_in_arrays as $number) {
                $count++;
                $client->messages->create(
                    $number,
                    [
                        'from' => env('TWILIO_FROM'),
                        'body' => $message
                    ]
                );
            }
            return back()->with('success', $count . "message sent!");
        } else {
            return back()->withErrors($validator);
        }
    }

    public function sendForm()
    {
        $applicants = Person::with('allocation')->where('', 'Approved')->get();
        return view('sms.bulksms', compact('applicants'));
    }


    public function sendOffer(Request $request)
    {
        // Twillio Credentials
        $sid = getenv('TWILIO_SID');
        $token = getenv('TWILIO_TOKEN');
        $client = new Client($sid, $token);

        $number = $request->input('contact');
        $message = $request->input('message');

        $client->messages->create(
            $number,
            [
                'from' => getenv('TWILIO_FROM'),
                'body' => $message
            ]
        );
        //$notification = RepoNotification::updateOrCreate(['stand_id' => $request->get('stand_id'), 'application_id' => $request->get('application_id'), 'count' =>  ]);
        return back()->with('success', 'Notification Sent Successfully');
    }

    public function repoNotify(Request $request)
    {
        // Twillio Credentials
        $sid = getenv('TWILIO_SID');
        $token = getenv('TWILIO_TOKEN');
        $client = new Client($sid, $token);

        $number = $request->input('contact');
        $message = $request->input('message');

        $client->messages->create(
            $number,
            [
                'from' => getenv('TWILIO_FROM'),
                'body' => $message
            ]
        );
        //$notification = RepoNotification::updateOrCreate(['stand_id' => $request->get('stand_id'), 'application_id' => $request->get('application_id'), 'count' =>  ]);
        if ((RepoNotification::where('stand_id', $request->stand_id)->get()->first()) == NULL) {
            $notification = new RepoNotification();
            $notification->stand_id = $request->stand_id;
            $notification->application_id = $request->application_id;
            $notification->save();
        } else {
            $notification = RepoNotification::where('stand_id', $request->stand_id)->get()->first();
            $notification->count += 1;
            $notification->save();
        }
        return back()->with('success', 'Notification Sent Successfully');
    }
}
