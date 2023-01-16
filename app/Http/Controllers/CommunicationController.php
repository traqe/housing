<?php

namespace App\Http\Controllers;

use App\EmailGroup;
use App\GradeClass;
use App\GroupPeople;
use App\Staff;
use App\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Input;
use File;
use Toast;

class CommunicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $term = Term::where('Closed', 0)->first();
        $groups = EmailGroup::all();
        $staffs = Staff::where('StatusID', 1)->orderby('LastName')->get();
        $classes = GradeClass::where(['ClYear'=>$term->TermYear, 'ClTerm'=>$term->Term])->get();
        //return  $classes;
        return view('communications.index', compact('groups','staffs','classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addmember(Request $request)
    {
        $group = GroupPeople::updateOrCreate(['groupid'=>$request->groupid, 'staffid'=>$request->staffid]);
        $members = EmailGroup::find($request->groupid)->members;
        $arr = array();
        foreach ($members as $m)
        {
            array_push($arr, ['id'=>$m->staff->StaffID, 'Name'=>$m->staff->Title.' '.$m->staff->FirstName.' '.$m->staff->LastName]);
        }
        return $arr;
    }

    public function deleteMember($id)
    {
        $member = GroupPeople::find($id);
        $member->delete();
    }

    public function addGroup(Request $request)
    {
        $staffs =  $request->staffs;
        $group = EmailGroup::updateOrCreate(['groupname'=>$request->groupname],['type'=>$request->type]);
        foreach ($staffs as $staff)
        {
            GroupPeople::updateOrCreate(['groupid'=>$group->id, 'staffid'=>$staff]);
        }
        Toast::success('Group Created Successfully');
        return redirect()->back();
    }

    public function getMembers($id)
    {
        $members = EmailGroup::find($id)->members;
        $arr = array();
        foreach ($members as $m)
        {
             array_push($arr, ['id'=>$m->id, 'Name'=>$m->staff->Title.' '.$m->staff->FirstName.' '.$m->staff->LastName]);
        }
        return $arr;
    }


    function sendEmail(Request $request)
    {
        $file ='';
        if (Input::hasFile('attachment'))
        {
            $name = Input::file('attachment')->getClientOriginalName();
            $extension = Input::file('attachment')->getClientOriginalExtension();
            $fileName = $name;

            $path = storage_path('Uploads'.'/'.date('YYYY/MM/DD'));

            if(!File::exists($path)) {
                File::makeDirectory($path, $mode = 0755, true, true);

            }
            $file = Input::file('attachment')->move($path, $fileName);
            //$fileName->move($path, $image);

        } 
        // = ‘RECEIVER_NAME’;
        $to_email = $request->email;
        $title = $request->title;
        $msg = $request->message;
        //$file = $request->file('file');

        //return $fileName;

        $data = array(["body"=> $msg]);


        if (Input::hasFile('attachment'))
        {
            Mail::raw($msg, function($message) use ($title, $to_email, $file)
            {
                $message->subject($title);
                //$message->from('mathemkhungeni@gmail.com');
                $message->to($to_email)->attach($file);
            });
        }
        else
        {
            Mail::raw($msg, function($message) use ($title, $to_email)
            {
                $message->subject($title);
                //$message->from('mathemkhungeni@gmail.com');
                $message->to($to_email);//->attach($file);
            });
        }
        
        // Mail::raw($msg, function($message) use ($title, $to_email, $file)
        // {
        //     $message->subject($title);
        //     $message->from('mathemkhungeni@gmail.com');
        //     $message->to($to_email)->attach($file);
        // });
        Toast::success('Email sent successfully.');

        return redirect()->back();


    }
    function sendBulkEmail(Request $request)
    {
       // return $request->message;
        $term = Term::where('Closed', 0)->first();

        if ($request->recipients != null)
        {

            $file ='';
            if (Input::hasFile('attachment'))
            {
                $name = Input::file('attachment')->getClientOriginalName();
                $extension = Input::file('attachment')->getClientOriginalExtension();
                $fileName = $name;

                $path = storage_path('Uploads'.'/'.date('YYYY/MM/DD'));

                if(!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0755, true, true);

                }
                $file = Input::file('attachment')->move($path, $fileName);
                //$fileName->move($path, $image);

            }

            foreach ($request->recipients as $recipient)
            {
                $members = EmailGroup::find($recipient)->members;
                foreach ($members as $member)
                {
                    $staff = Staff::find($member->staffid);
                    //return $staff;
                    $personTitle = $staff->Title;
                    $personFirstName = $staff->FirstName;
                    $personLastName = $staff->LastName;
                    $personEmail = $staff->Email;



                    $to_email = $personEmail;
                    $title = $request->title;
                    $msg = $request->message;
                    //return $msg;
                    $searchVal = array("@TITLE", "@FIRSTNAME", "@LASTNAME");
                    $replaceVal = array($personTitle, $personFirstName, $personLastName);
                    //print_r($replaceVal);
                    $msg = str_replace($searchVal, $replaceVal, $msg);

                    //return $msg;

                    $data = array(["body"=> $msg]);

                    if (Input::hasFile('attachment'))
                    {
                        Mail::raw($msg, function($message) use ($title, $to_email, $file)
                        {
                            $message->subject($title);
                            //$message->from('mathemkhungeni@gmail.com');
                            $message->to($to_email)->attach($file);
                        });
                    }
                    else
                    {
                        Mail::raw($msg, function($message) use ($title, $to_email)
                        {
                            $message->subject($title);
                            //$message->from('mathemkhungeni@gmail.com');
                            $message->to($to_email);//->attach($file);
                        });
                    }

                }

            }

        }
        if ($request->parents != null)
        {
            $file ='';
            if (Input::hasFile('attachment'))
            {
                $name = Input::file('attachment')->getClientOriginalName();
                $extension = Input::file('attachment')->getClientOriginalExtension();
                $fileName = $name;

                $path = storage_path('Uploads'.'/'.date('YYYY/MM/DD'));

                if(!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0755, true, true);

                }
                $file = Input::file('attachment')->move($path, $fileName);
                //$fileName->move($path, $image);

            }

            foreach ($request->parents as $recipient)
            {
                $selectedClass = GradeClass::where(['ClYear'=>$term->TermYear, 'ClTerm'=>$term->Term, 'Class'=>$recipient])->first();
                $students = $selectedClass->studentClass($term->Term, $term->YearTerm);
                //return $students;
                if ($students != null)
                {
                    foreach ($students as $key=>$student)
                    {
                        $parent =  $student->student->parent;
                        $personTitle = $parent->MTitle;
                        $personFirstName = $parent->MotherFName;
                        $personLastName = $parent->MotherLName;
                        $personEmail = $parent->MEmail;
                        $heading = $request->heading;

                        if (in_array("title", $request->fields))
                        {
                            $heading += $personTitle;
                        }
                        if (in_array("firstname", $request->fields))
                        {
                            $heading += $personFirstName;
                        }
                        if (in_array("lastname", $request->fields))
                        {
                            $heading += $personLastName;
                        }

                        //return $parent;


                        $to_email = $personEmail;
                        $title = $request->title;
                        $msg = $request->message;
                        $searchVal = array("<TITLE>", "<FIRSTNAME>", "<LASTNAME>");
                        $replaceVal = array($personTitle, $personFirstName, $personLastName);
                        $msg = str_replace($searchVal, $replaceVal, $msg);

                        //return $msg;

                        $data = array(["body"=> $msg]);

                        if ($to_email != '')
                        {
                            if (Input::hasFile('attachment'))
                            {
                                Mail::raw($msg, function($message) use ($title, $to_email, $file)
                                {
                                    $message->subject($title);
                                    //$message->from('mathemkhungeni@gmail.com');
                                    $message->to($to_email)->attach($file);
                                });
                            }
                            else
                            {
                                Mail::raw($msg, function($message) use ($title, $to_email)
                                {

                                    $message->subject($title);
                                    //$message->from('mathemkhungeni@gmail.com');
                                    $message->to($to_email);//->attach($file);
                                });
                            }
                        }
                    }
                }
            }
        }
        
        Toast::success('Email sent successfully.');
        return redirect()->back();
    }

    public function sendMail()
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeMember($id)
    {
        //return $id;
        $member = GroupPeople::find($id);
        //return $member;
        $member->delete();
        return  'Removed';
    }

    public function removeGroup($id)
    {
        $group = EmailGroup::find($id);
        $group->delete();
        return  'Removed';
    }

}
