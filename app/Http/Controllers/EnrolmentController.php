<?php

namespace App\Http\Controllers;

use App\Application;
use App\ApplicationStatus;
use App\Country;
use App\Grade;
use App\GradeClass;
use App\Parents;
use App\Student;
use App\StudentClass;
use App\Term;
use App\YearFinList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Arr;
use Toast;

class EnrolmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::where(['StatusID'=> '9'])->get();
        $parents = Parents::all();
        $countries = Country::all();
        $appStatus = ApplicationStatus::all();
        $grades = Grade::all();
        $activeSession = Term::where('Closed', 0)->first();
        $classes = GradeClass::where(['ClYear'=>$activeSession->TermYear, 'ClTerm'=>$activeSession->Term])->get();

        //return $classes;

        $years = YearFinList::all();

//return $classes;
        return view('enrolments.index', compact('years','activeSession','classes','grades','applications','parents','countries','appStatus'));
    }

    public function Enroll(Request $request)
    {
        try{

            DB::beginTransaction();

            $application = Application::find($request->WaitListID);
            if ($application == null)
            {
                Toast::warning('Please Select an Applicant');
                return redirect()->back();
            }
            $application->StatusID = 2;
            $application->save();

            $myarr = $application->toArray();
            $f = Arr::except($myarr, ['Age','Gender2']);

            $student = Student::create($f);

            // StudentClass::create(['Class'=>$request->Class, 'TermYear'=>$request->TermYear,'Term'=>$request->Term,
            //     'AcYear'=>$application->StudYear,'StudID'=>$student->StudentID]);

            Toast::success('Enrollment Successfully Done');
            DB::commit();
            return redirect()->back();

            echo 'User and Profile Saved';
        } catch(\Exception $e){
            DB::rollback();
            echo $e->getMessage();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
