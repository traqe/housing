<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Facades\Validator;
use Auth;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\SetYearTerm;
use Flash;


class AssessmentController extends Controller
{

    public function index()
    {
        $currentSession = Term::where('Closed', 0)->first();
        $year = $currentSession->TermYear;
        $term = $currentSession->Term;


        if (Auth::user()->hasRole('Administrator'))
        {
            $sets = SubjectSet::whereHas('yearterm', function (Builder $query) use ($year, $term){
                $query->where(['OGYear'=>$year,'OGTerm'=>$term]);
            })->get();
        }
        else
        {
            $sets = SubjectSet::where('Teacher1ID', Auth::user()->staff_id)->whereHas('yearterm', function (Builder $query) use ($year, $term){
                $query->where(['OGYear'=>$year,'OGTerm'=>$term]);
            })->get();
        }


        $grades = Grade::all();
        $years = YearFinList::orderby('YearEnding','Desc')->get();
        $students = Student::all();

        $year = null;
        $term = null;
        $grade = null;
        return View('assessments.index', compact('sets','years', 'grades','students','currentSession','year','term','grade'));
    }

    public function searchAssessment(Request $request)
    {
        $currentSession = Term::where('Closed', 0)->first();
        $year = $request->Year;
        $term = $request->Term;
        $grade = $request->studForm;

        if (Auth::user()->hasRole('Administrator'))
        {
            $sets = SubjectSet::whereHas('yearterm', function (Builder $query) use ($year, $term, $grade){
                $query->where(['OGYear'=>$year,'OGTerm'=>$term, 'AcYear'=>$grade]);
            })->get();
        }
        else
        {
            $sets = SubjectSet::where('Teacher1ID', Auth::user()->staff_id)->whereHas('yearterm', function (Builder $query) use ($year, $term, $grade){
                $query->where(['OGYear'=>$year,'OGTerm'=>$term, 'AcYear'=>$grade]);
            })->get();

        }


        $grades = Grade::all();
        $years = YearFinList::orderby('YearEnding','Desc')->get();
        $students = Student::all();

        return View('assessments.index', compact('sets','years', 'grades','students','currentSession','year','term','grade'));
    }

    public function show($id)
    {
        $set = SubjectSet::find($id);

        //return $set->yearterm;

        $currentSession = Term::where('Closed', 0)->first();
        $year = $currentSession->TermYear;
        $term = $currentSession->Term;
        $grade = null;

        $students = $set->students;
        $grades = Grade::all();
        $years = YearFinList::orderby('YearEnding','Desc')->get();
        $ARSubject = ARSubject::where(['TermYear'=>$set->yearterm->OGYear, 'Term'=>$set->yearterm->OGTerm, 'AcYear'=>$set->yearterm->AcYear, 'SubjID'=>$set->SubjID, 'Section'=>$set->Section])->first()->ARSID;

        //return $ARSubject;
        $ARAcad1 = ARAcad1::where('ARSID',$ARSubject)->get();

        //return $ARAcad1;

        if (ARAssCol::where(['ColHeading'=>'MT', 'ARSID'=>$ARSubject])->first() != null)
        {
            $ARAssColID = ARAssCol::where(['ColHeading'=>'MT', 'ARSID'=>$ARSubject])->first()->ARAssColID;
        }
        elseif (ARAssCol::where(['ColHeading'=>'TM', 'ARSID'=>$ARSubject])->first() != null)
        {
            $ARAssColID = ARAssCol::where(['ColHeading'=>'TM', 'ARSID'=>$ARSubject])->first()->ARAssColID;
        }
        elseif   (ARAssCol::where(['ColHeading'=>'EX', 'ARSID'=>$ARSubject])->first() != null)
        {
            $ARAssColID = ARAssCol::where(['ColHeading'=>'EX', 'ARSID'=>$ARSubject])->first()->ARAssColID;
        }

        //return $ARAssColID;

        $comments = SubjectComment::orderby('Comments')->get();



        //return $ARAssColID;

        $ARAssColID2 = ARAssCol::where(['ColHeading'=>'EOTM', 'ARSID'=>$ARSubject])->first()->ARAssColID;

        //return $ARAssColID2;
//
//        foreach ($students as $s)
//        {
//            return $s->student->Acad1->where('ARSID', $ARSubject)->first()->colData->where('ARAssColID', $ARAssColID)->first()->Mark;
//        }


        return View('assessments.show', compact('comments','ARAssColID2','ARAssColID','ARAcad1','ARSubject','set','students','grades','years','year','term','grade'));
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

    public function destroy($id)
    {
        $assessment = Assessment::findOrFail($id);
        $assessment->delete();
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
}
