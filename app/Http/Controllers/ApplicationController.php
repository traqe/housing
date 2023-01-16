<?php

namespace App\Http\Controllers;

use App\Application;
use App\ApplicationStatus;
use App\Batch;
use App\Country;
use App\Grade;
use App\GradeClass;
use App\Parents;
use App\Person;
use App\Receipt;
use App\Stand;
use App\Student;
use App\Term;
use App\TimeTable;
use App\YearFinList;
use Illuminate\Http\Request;
use Toast;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $year = Term::where('Closed', 0)->first()->TermYear;
        $applications = Application::all();
        // $parents = Parents::all();
        // $countries = Country::all();
        // $appStatus = ApplicationStatus::all();
        // $grades = Grade::all();
        // $classes = GradeClass::all();
        // $years = YearFinList::all();
        //return Application::find(6)->unApprovedAllocations->first();

        return view('applications.index', compact('applications'));
    }


    public function searchApplications(Request $request)
    {
        $year = $request->Year;
        $level = $request->studForm;
        $status = $request->Status;


        $applications = Application::where(['StudYear' => $level, 'StatusID' => $status])->where(DB::raw('year(EntryDate)'), $year)->get();
        $parents = Parents::all();
        $countries = Country::all();
        $appStatus = ApplicationStatus::all();
        $grades = Grade::all();
        $classes = GradeClass::all();
        $years = YearFinList::all();

        //return $year;

        return view('applications.index', compact('year', 'years', 'classes', 'grades', 'applications', 'parents', 'countries', 'appStatus'));
    }


    public function findApplications(Request $request)
    {

        //        if ($field == 'appnum'){
        //            $people = Person::whereHas('applications', function (Builder $query) use ($field, $value) {
        //                $query->where($field, 'regexp', $value);
        //            })->orderby('surname')->orderby('firstname')->get();
        //        } else {
        //            $people = Person::where($field, 'regexp', $value)->orderby('surname')->orderby('firstname')->get();
        //        }

        $field = $request->field;
        $value = $request->search;
        $applications = [];

        if ($field == 'standNo') {
            $stand = Stand::where('stand_no', $value)->first();
            if ($stand != null) {
                $applications = Application::whereHas('allocation', function (Builder $query) use ($stand) {
                    $query->where('stand_id', 'regexp', $stand->id);
                })->get();
            }
        } elseif ($field == 'batch_id') {
            $batch = Batch::where('batch', $value)->first();
            if ($batch != null) {
                $applications = Application::where($field, 'regexp', $batch->id)->get();
            }
        } elseif ($field == 'surname' || $field == 'firstname') {
            $person = Person::where($field, $value)->first();
            if ($person != null) {
                $applications = Application::where('applicant_id', 'regexp', $person->id)->get();
            }
        } else {
            $applications = Application::where($field, 'regexp', $value)->get();
        }
        //$people = People::where($field, 'regexp', $value)->paginate(10);

        //$people->setPath(''); //in case the page generate '/?' link.
        // $pagination = $people->appends(array('field' => $request->field,
        //     'search' => $request->search));

        return View('applications.index', compact('applications'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $receipt = Receipt::where('receipt', $request->receipt)->first();
        if ($receipt != null) {
            Application::create($request->all());
            return redirect()->back()->with('info', 'Application Successfully Captured');
        }
        return redirect()->back()->with('info', 'Error receipt number does not exist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $application = Application::where(['ParentID' => $request->ParentID, 'FirstName' => $request->FirstName, 'LastName' => $request->LastName, 'BirthDate' => $request->BirthDate])->first();

        $apps = Application::find($request->WaitListID);


        if ($application != null) {
            $application->update($request->all());
            Toast::success('Application Successfully Updated');
            return redirect(route('applications.index'));
        }

        if ($apps != null) {
            $apps->update($request->all());
            Toast::success('Application Successfully Updated');
            return redirect(route('applications.index'));
        }

        $waitlistnumber = Application::orderby('WaitListID', 'Desc')->first()->WaitListNo + 1;
        $admno = Application::orderby('WaitListID', 'Desc')->first()->AdmNo + 1;

        $arr = $request->all();
        $u = Arr::add($arr, 'AdmNo', $admno);
        $updated = Arr::add($u, 'WaitListNo', $waitlistnumber);

        Application::create($updated);
        Toast::success('Application Successfully Updated');
        return redirect(route('applications.index'));
    }

    public function getApplicant($id)
    {
        $app = Application::find($id);
        return $app;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}