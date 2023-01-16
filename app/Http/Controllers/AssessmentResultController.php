<?php

namespace App\Http\Controllers;

use App\CurrentSession;
use App\Examination;
use App\Student;
use App\Subject;
use App\TeacherSubject;
use Illuminate\Http\Request;
use Auth;
use App\AssessmentResult;
use App\Assessment;
use Illuminate\Support\Facades\DB;
use App\Person;
use App\NextOfKin;
use App\GradeSubject;
use App\Grade;
use App\StudentGrade;
use Illuminate\Support\Facades\Session;


class AssessmentResultController extends Controller
{
    public function index($id)
    {
        $year = CurrentSession::first()->year;
        $term = CurrentSession::first()->term;
        $assessment = Assessment::findOrFail($id);
        $gradeid = $assessment->grade_id;

        $total = $assessment->totalmark;

        $title = $assessment->title;

        $subject = $assessment->subject->subject;

        //$results = $assessment->assessmentresult->where('studentid', 'L0180001')->first()->mark;

        $students = array();

        $studentgrade = Studentgrade::where(['year'=>$year, 'term'=>$term, 'grade_id'=>$gradeid, 'status'=>'Current'])->get();

        foreach ($studentgrade as $sg)
        {
            array_push($students, array($sg->student->candidatenumber));
        }

        return view('marks.index', compact('assessment','studentgrade', 'total', 'title', 'id', 'students', 'subject'));

    }

    public function allmarks($gradeid, $subjectid)
    {
        $year = CurrentSession::first()->year;
        $term = CurrentSession::first()->term;
        $subject = Subject::findOrFail($subjectid)->subject;
        $grade = Grade::findOrFail($gradeid)->grade;

       // return $grade;

        $assessments = Assessment::where(['year'=>$year,'term'=>$term, 'grade_id'=>$gradeid, 'subject_id'=>$subjectid])->get();
        $students = array();

        $studentgrade = Studentgrade::where(['year'=>$year, 'term'=>$term, 'grade_id'=>$gradeid, 'status'=>'Current'])->get();

        foreach ($studentgrade as $sg)
        {
            array_push($students, array($sg->student->candidatenumber));
        }

        $exams = Examination::where(['year'=>$year, 'term'=>$term,'grade_id'=>$gradeid, 'subject_id'=>$subjectid])->get();
        //return $exam;

        return view('marks.all', compact('exams','gradeid','subjectid','year','term','grade','subject','assessments','id', 'students','studentgrade'));

    }

    public function insertmark(Request $request)
    {

        if (AssessmentResult::updateOrCreate(['assessmentid'=>$request->assessmentid,  'studentid'=>$request->studentid],['mark'=>$request->mark,'created_by'=>$request->created_by]))
        {
            return "saved";
        }
    }

    public function getWeight($id)
    {
        if (Assessment::findOrFail($id) != null)
        {
            return Assessment::findOrFail($id)->weight;
        }
        return 0;
    }

    public function getTotal($id)
    {
        if (Assessment::findOrFail($id) != null)
        {
            return Assessment::findOrFail($id)->totalmark;
        }
        return 0;
    }

    public function getStudentMark($id, $studentid)
    {
        $result = AssessmentResult::where(['studentid'=>$studentid, 'assessmentid'=>$id ])->first();
        if ($result != null)
        {
            return $result->mark;
        }
        return 0;
    }

    public function calculateStudentCW($student_id, $gradeid,$subjectid, $year, $term )
    {
        $assessments = Assessment::where(['grade_id'=>$gradeid, 'subject_id'=>$subjectid, 'year'=>$year, 'term'=>$term])->get();
        $cw = 0;
        foreach ($assessments as $as)
        {
            $weight = Self::getWeight($as->id);
            $total = Self::getTotal($as->id);
            $studentmark = Self::getStudentMark($as->id, $student_id);
            $cw = $cw + ($studentmark/$total)* ($weight);
        }
        return $cw;
    }

    public function getBack($gradeid, $subjectid)
    {
        $year = CurrentSession::first()->year;
        $term = CurrentSession::first()->term;

        $id = GradeSubject::where(['grade_id'=>$gradeid, 'subject_id'=>$subjectid,'year'=>$year,'term'=>$term])->first()->id;

        $ts = TeacherSubject::where('grade_subject_id',$id)->first()->teacher->person->id;

        //return $ts;

        return redirect()->route('staffprofile', $ts);


    }


    public function insertExam(Request $request)
    {
        $cw = self::calculateStudentCW($request->studentid, $request->gradeid,$request->subjectid, $request->year, $request->term );
        $om = $request->mark;
        $grade = '';
        if ($om > 74)
        {
            $grade = 'A';
        }
        elseif ($om > 69 && $om < 75)
        {
            $grade = 'B';
        }
        elseif ($om > 49 && $om < 60)
        {
            $grade = 'C';
        }
        elseif ($om > 39 && $om < 50)
        {
            $grade = 'D';
        }
        else
        {
            $grade = 'F';
        }

        if (Examination::updateOrCreate(['student_id'=>$request->studentid,'subject_id'=>$request->subjectid,  'grade_id'=>$request->gradeid, 'year'=>$request->year, 'term'=>$request->term],['cw'=>$cw,'exam'=>$request->mark,'overallmark'=>$request->mark,'grade'=>$grade]))
        {
            return "saved";
        }
    }

    public function getmarks($id, $studentid)
    {
        return  AssessmentResult::where(['assessmentid'=>$id, 'studentid'=>$studentid])->first()->mark;

    }



}
