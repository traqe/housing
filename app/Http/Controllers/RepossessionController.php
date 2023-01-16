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
use App\Repossession;

class RepossessionController extends Controller
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
        // return $request->all();
        // return Stand::find($request->stand_id);

        Repossession::create($request->all());


        // $receipt = Receipt::where('receipt', $request->receipt)->first();
        // if ($receipt != null){
        //     Application::create($request->all());
        //     return redirect()->back()->with('info', 'Application Successfully Captured');
        // }

        // $stand = Stand::find();


        return redirect()->back()->with('info', 'Repossession successfully captured');
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
        //return $request->all();
        $repossession = Repossession::find($request->repossession_id);
        $repossession->decision = $request->decision;
        $repossession->approved_by = $request->approved_by;
        $repossession->approved_at = $request->approved_at;
        $repossession->processed = 1;
        $repossession->save();
        $stand = Stand::find($request->stand_id);
        if ($request->decision == 'APPROVED') {
            $stand->status = 'AVAILABLE';
            // to show that a certain stand is currently repossessed.
            $stand->repossessed = 1;
            $stand->save();

            $allocation = $stand->allocations->where('current_status', 'CURRENT')->first(); //->application;//->applicant;
            $allocation->current_status = 'OLD';
            $allocation->save();
        }
        return redirect()->back();
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
