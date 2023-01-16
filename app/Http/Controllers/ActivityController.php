<?php

namespace App\Http\Controllers;

use App\Activity;
use App\ActivityComment;
use App\ActivityStaff;
use App\ActivityStudent;
use App\ARAcad1;
use App\ARAssCol;
use App\ARAssColData;
use App\ARSubject;
use App\CurrentSession;
use App\Grade;
use App\Student;
use App\SubjectComment;
use App\SubjectSet;
use App\Term;
use App\YearFinList;
use Illuminate\Http\Request;
use App\Assessment;
use App\Staff;
use App\TimeTable;

use Illuminate\Support\Facades\Validator;
use Auth;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\SetYearTerm;
use App\TermActivity;

use Flash;
use Maatwebsite\Excel\Concerns\ToArray;

class ActivityController extends Controller
{

    public function index()
    {

        $user = Auth::user()->staff_id;
        $timetables = TimeTable::where('Status','Current')->orderby('TTID' ,'Desc')->get();
        $currentSession = Term::where('Closed', 0)->first();
        $year = $currentSession->TermYear;
        $term = $currentSession->Term;
        $currentTimeTable = TimeTable::where(['TermYear'=>$year,'Term'=>$term,'Status'=>'Current'])->first();
        $currentSession = Term::where('Closed', 0)->first();
        $year = $currentSession->TermYear;
        $term = $currentSession->Term;



       
        $grades = Grade::all();
        $years = YearFinList::orderby('YearEnding','Desc')->get();
        //$students = Student::all();
        $students = Student::where('StatusID' ,1)->get();
        //$activities = TermActivity::where(['TermYear'=>3 ,'Term'=>2019])->get();

        if (Auth::user()->hasRole('Administrator'))
        {
            $activities = TermActivity::where(['TermYear'=>$year ,'Term'=>$term])->orderby('ActName','Asc')->get();
        }
        else
        {
            $activities = TermActivity::where(['TermYear'=>$year ,'Term'=>$term])->orderby('ActName','Asc')->whereHas('teachers', function (Builder $query) use ($user){
                $query->where(['StaffID'=>$user]);
            })->get();
        }
        $teachers = Staff::where('StatusID',1)->orderby('LastName','Asc')->orderby('FirstName','Asc')->get();

        $grade = null;
        //return View('activities.index', compact('sets','years', 'grades','students','currentSession','year','term','grade'));
        return View('activities.index', compact('currentTimeTable','timetables','currentSession','activities','years', 'grades','students','currentSession','year','term','grade' ,'teachers'));
    }

    public  function search(Request $request)
    {
        //return $request;
        $s = TimeTable::find($request->timetable_id);


        $timetables = TimeTable::where('Status','Current')->orderby('TTID' ,'Desc')->get();
        $currentSession = Term::where('Closed', 0)->first();
        $year = $s->TermYear;
        $term = $s->Term;
        $currentTimeTable = TimeTable::find($request->timetable_id);
        $currentSession = Term::where('Closed', 0)->first();





        $grades = Grade::all();
        $years = YearFinList::orderby('YearEnding','Desc')->get();
         $students = Student::where('StatusID' ,1)->get();
        //$activities = TermActivity::where(['TermYear'=>3 ,'Term'=>2019])->get();
        $activities = TermActivity::where(['TermYear'=>$year ,'Term'=>$term])->orderby('ActName','Asc')->get();
        //return $activities;
        //return $activities;
        $teachers = Staff::where('StatusID',1)->orderby('LastName','Asc')->orderby('FirstName','Asc')->get();


        $grade = null;
        //return View('activities.index', compact('sets','years', 'grades','students','currentSession','year','term','grade'));
        return View('activities.index', compact('currentTimeTable','timetables','currentSession','activities','years', 'grades','students','currentSession','year','term','grade' ,'teachers'));


    }

    public function addActComment(Request $request)
    {
        $act = ActivityStudent::find($request->ASID);
        $act->Comment1 = $request->comment;
        $act->save();
        return redirect()->back();


    }
    public function getActivities(Request $request)
    {
        $currentSession = Term::where('Closed', 0)->first();
        $year = $request->Year;
        $term = $request->Term;



        $grades = Grade::all();
        $years = YearFinList::orderby('YearEnding','Desc')->get();
        $students = Student::all();
        //$activities = TermActivity::where(['TermYear'=>3 ,'Term'=>2019])->get();
        $activities = TermActivity::where(['TermYear'=>$year ,'Term'=>$term])->orderby('ActName','Asc')->get();
        //return $activities;
        //return $activities;

        $year = null;
        $term = null;
        $grade = null;
        //return View('activities.index', compact('sets','years', 'grades','students','currentSession','year','term','grade'));
        return View('activities.index', compact('activities','years', 'grades','students','currentSession','year','term','grade'));
    }
    public function storeActGroup(Request $request)
    {
        //Sreturn $request;
        DB::beginTransaction();
        $act = TermActivity::create($request->all());
        //return $act->ActID;
        if($act->ActID != null) {
            ActivityStaff::create(['ActID' => $act->ActID, 'StaffID' => $request->Teacher1ID]);
        }

        DB::commit();
        Flash::success('Activity Created.');


        return redirect()->back();
    }

    public function editActGroup(Request $request)
    {
       // return $request;
       // return $request;
        DB::beginTransaction();
        $act = TermActivity::find($request->ActID);


        $act->ActName = $request->ActName;
        $act->ActAbbr =$request->ActAbbr ;
        $act->ActName = $request->ActName;
        $act->save();
        $as = ActivityStaff::where('ActID',$request->ActID)->first();
        $as->StaffID = $request->Teacher1ID;
        $as->save();
        DB::commit();
        Flash::success('Activity Updated.');


        return redirect()->back();
    }


    public function getActStudents($id)
    {

        //$set = ActivityStudent::where('ActID' ,$id)->first();

         $activity = TermActivity::find($id);
         $year = $activity->TermYear;
         $term = $activity->Term;
        //$sess =  $set->yearterm;

        //return $sess;

        $studs = ActivityStudent::whereHas('student', function (Builder $query) use ($id){
            $query->where('ActID','=',$id);
        })->get();

        //$num = $set->student->count();


        $arr = array();

        //$students = $set->student;

        //return $students;

       // return $studs;
        foreach($studs as $s)
        {
            //array_push($arr, ['StudentID'=>$s->StudID, 'Name'=>$s->student->LastName. ' , '.$s->student->FirstName,'num'=>$num, 'class'=>$s->student->getClass($sess->OGYear, $sess->OGTerm)]);
            array_push($arr, ['StudentID'=>$s->StudentID, 'Name'=>$s->student->LastName. ' , '.$s->student->FirstName,'num'=>"", 'class'=>$s->student->getClass($year,$term)]);
            //array_add($s, 'student', $s->student->LastName. ' '.$s->student->FirstName);
        }

       return $arr;
        //var_dump($arr);



    }
    public function countActStudents($id)
    {

        //$set = ActivityStudent::where('ActID' ,$id)->first();

        $activity = TermActivity::find($id);
        $year = $activity->TermYear;
        $term = $activity->Term;


        $studs = ActivityStudent::withCount('student', function (Builder $query) use ($id){
            $query->where('ActID','=',$id);
        })->get();

        return $studs[0]->student_count;


    }
    public function searchAssessment(Request $request)
    {
        $currentSession = Term::where('Closed', 0)->first();
        $year = $request->Year;
        $term = $request->Term;
        $grade = $request->studForm;

        $sets = SubjectSet::whereHas('yearterm', function (Builder $query) use ($year, $term, $grade){
            $query->where(['OGYear'=>$year,'OGTerm'=>$term, 'AcYear'=>$grade]);
        })->get();

        $grades = Grade::all();
        $years = YearFinList::orderby('YearEnding','Desc')->get();
        $students = Student::all();

        return View('assessments.index', compact('sets','years', 'grades','students','currentSession','year','term','grade'));
    }

    public function show($id)
    {


        //return $set->yearterm;
        $activity = TermActivity::find($id);
        $year = $activity->TermYear;
        $term = $activity->Term;

        //$studentactivity = ActivityStudent::where('ActID' ,$id)->get();

        //$students = $activity->students;


        $comments = ActivityComment::orderby('Comment')->get();

        //return  $students;




        return View('activities.show', compact('activity','year','term','comments'));
    }






    public function store(Request $request)
    {
        DB::beginTransaction();

        $sg = SubjectSet::find($request->setId);
        $ARSubject = ARSubject::where(['TermYear'=>$sg->yearterm->OGYear, 'Term'=>$sg->yearterm->OGTerm, 'AcYear'=>$sg->yearterm->AcYear, 'SubjID'=>$sg->SubjID, 'Section'=>$sg->Section])->first();
        //return $ARSubject;
        ARAssCol::updateOrCreate(['ARSID'=>$ARSubject->ARSID,'ColHeading'=>'TM','Title'=>'Term Mark', 'Weight'=>'100','OutOf'=>'100' ],['NoWeight'=>1, 'Seq'=>1, 'Lvl'=>1, 'CanEdit'=>1,'RepType'=>1, 'Report'=>1, 'Show'=>1, 'YM'=>0,'YMWeight'=>'1.00','TopMarksNo'=>0,'AssType'=>1,'PortalAssessment'=>1, 'TaskWeight'=>'0.00']);
        ARAssCol::updateOrCreate(['ARSID'=>$ARSubject->ARSID,'ColHeading'=>'EOTM','Title'=>'END OF TERM MARK', 'Weight'=>'100','OutOf'=>'100' ],['NoWeight'=>1, 'Seq'=>1, 'Lvl'=>1, 'CanEdit'=>1,'RepType'=>1, 'Report'=>1, 'Show'=>1, 'YM'=>0,'YMWeight'=>'1.00','TopMarksNo'=>0,'AssType'=>1,'PortalAssessment'=>1, 'TaskWeight'=>'0.00']);

        DB::commit();
        Flash::success('Assessments Created.');
        return redirect()->back();//->with('info', 'Assessments Created');
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        $activitystudent = ActivityStudent::where('ActID',$request->ActID)->delete();
        $activity = TermActivity::findOrFail($request->ActID);
        $activity->delete();

        DB::commit();
        return redirect()->back();

    }

    public function checkWeight($subjectid, $gradeid, $year, $term)
    {
        $totalweight = 0;
        $ass = Assessment::where(['subject_id'=>$subjectid, 'grade_id'=> $gradeid, 'year'=>$year, 'term'=>$term])->get();
        foreach ($ass as $s)
        {
            $totalweight += $s->weight;
        }
        return $totalweight;
    }

    public function getMarks($id)
    {

        $year = CurrentSession::first()->year;
        $term = CurrentSession::first()->term;
        $gradeid = Assessment::findOrFail($id)->grade_id;

        return $gradeid;

        $students = Student()->studentgrade(where(['year'=>$year, 'term'=>$term, 'grade_id'=>$gradeid]))->get();

        dd($students);

        return view('marks.index', compact('students'));

    }
    public function addStudentActivity(Request $request)
    {
        //return $request;
        foreach ($request->StudID as $studid)
        {
            ActivityStudent::firstOrCreate(['StudentID'=>$studid,'ActID'=>$request->ActivityID]);

        }
        return redirect()->back();
    }
    public  function removeStudentActivity($id ,$studentid)
    {

        $as = ActivityStudent::where('ActID' ,$id)->where('StudentID',$studentid)->delete();


//        if ($as != null)
//        {
//            $as->delete();
//            return 'Student Deleted from Activity';
//        }
        return redirect()->back();
//        return 'Student Deleted from Activity';

    }
}
