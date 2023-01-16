<?php

namespace App\Http\Controllers;

use App\ARAssColData;
use App\ARCommSetup;
use App\ARCommStudent;
use App\ARSubject;
use App\GradeClass;
use App\Staff;
use App\Student;
use App\StudentClass;
use App\Subject;
use App\Teacher;
use App\Term;
use App\YearFinList;
use Illuminate\Http\Request;
use App\Grade;
use App\GradeSubject;
use App\CurrentSession;
use App\TeacherSubject;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Auth;


class GradeClassController extends Controller
{
    public function index()
    {

        $grades = Grade::all();
        $years = YearFinList::orderby('YearEnding','Desc')->get();
        $currentSession = Term::where('Closed', 0)->first();
        $sendActive = 1;

        if (Auth::user()->hasRole('Administrator'))
        {
            $classes = GradeClass::where(['ClYear'=>$currentSession->TermYear, 'ClTerm'=>$currentSession->Term])->get();
        }

        else
        {
            $classes = GradeClass::where(['ClYear'=>$currentSession->TermYear, 'ClTerm'=>$currentSession->Term,'TeacherID'=>Auth::user()->staff_id])->get();
        }

        $y = $currentSession->TermYear;
        $t = $currentSession->Term;


        $studentss = Student::doesntHave('StudentClass')->get();

        $s = collect($studentss);

        $studs = Student::whereHas('StudentClass', function (Builder $query) use ($y, $t){
            $query->where('TermYear','!=',$y)->where('Term','!=',$t);
        })->get();

        $stt = collect($studs);

        $students = $s->merge($stt)->unique();

        //dd($students->last());


        $year = null;
        $term = null;
        $grade = null;
        return View('classes.index', compact('sendActive','year','term','grade','currentSession','grades','classes','years','students'));
    }

    public function addStudentClass(Request $request)
    {
        $cl = $request->studClass;
        $ar = str_split($cl);
        $f = $ar[0];

        if ($f == 'L')
        {
            $g = 'L6';
        }
        else if ($f == 'U')
        {
            $g = 'U6';
        }
        else
        {
            $g = 'F'.$f;
        }

        $currentSession = Term::where('Closed', 0)->first();

        foreach ($request->StudID as $studid)
        {
            StudentClass::UpdateOrCreate(['StudID'=>$studid,'TermYear'=>$currentSession->TermYear, 'Term'=>$currentSession->Term],[
                'Class'=>$request->studClass, 'AcYear'=>$g]);
        }
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $sendActive = 1;
        $grades = Grade::all();
        $years = YearFinList::orderby('YearEnding','Desc')->get();
        $currentSession = Term::where(['TermYear'=>$request->Year, 'Term'=>$request->Term])->first();
        $classes = GradeClass::where(['ClYear'=>$currentSession->TermYear, 'ClTerm'=>$currentSession->Term,'AcYear'=>$request->studForm])->get();
        $students = Student::all();
        $year = $request->Year;
        $term = $request->Term;
        $grade = $request->studForm;
        return View('classes.index', compact('sendActive','year','term','grade','students','currentSession','grades','classes','years'));
    }

    public function back($term,$year,$form)
    {
        $sendActive = 1;
        $grades = Grade::all();
        $years = YearFinList::orderby('YearEnding','Desc')->get();
        $currentSession = Term::where(['TermYear'=>$year, 'Term'=>$term])->first();
        $classes = GradeClass::where(['ClYear'=>$year, 'ClTerm'=>$term,'AcYear'=>$form])->get();
        $students = Student::all();
        $year = $year;
        $term = $term;
        $grade = $form;
        return View('classes.index', compact('sendActive','year','term','grade','students','currentSession','grades','classes','years'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staffs = Staff::all();
        $grades = Grade::all();
        $currentSession = Term::where('Closed', 0)->first();//
        $year= $currentSession->TermYear;
        $term =  $currentSession->Term;

        return View('classes.create', compact('grades','staffs','term','year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        GradeClass::create($request->all());
        return redirect()->back();
    }

    public function assignTeacher(Request $request)
    {
        TeacherSubject::updateOrCreate(
            ['grade_subject_id' => $request->grade_subject_id], ['teacher_id'=>$request->teacher_id]
        );
        return redirect()->back();
    }

    public  function getStudents($id)
    {
        $class = GradeClass::find($id);
        $students = StudentClass::where(['TermYear'=>$class->ClYear, 'Term'=>$class->ClTerm, 'Class'=>$class->Class])->get();

        $st = array();

        foreach ($students as $s)
        {

            array_push($st, ["FirstName" => $s->student->FirstName ,"LastName" => $s->student->LastName ,"Grade" => $s->AcYear, "StudentID" => $s->StudID, "ID"=>$s->ClStID , "Size"=>$students->count(),"Class"=>$class->Class, 'RowID'=>$class->RowID,"Term"=>$s->Term, "Year"=>$s->TermYear]);

        }
        return $st;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    function find_key_value($array, $key, $val)
    {
        foreach ($array as $item)
        {
            if (is_array($item))
            {
                self::find_key_value($item, $key, $val);
            }

            if (isset($item[$key]) && $item[$key] == $val) return true;
        }

        return false;
    }

    public function show($id)
    {
        $currentSession = Term::where('Closed', 0)->first();
        $class = GradeClass::find($id);

        $comments = null;

        $y = $class->ClYear;
        $t = $class->ClTerm;
        $cl = $class->Class;

        $studentClasses = StudentClass::where(['TermYear'=>$y, 'Term'=>$t, 'Class'=>$cl])->paginate(1);

        $commentSetup = ARCommSetup::where(['TermYear'=>$y,'Term'=>$t, 'StudYear'=>$class->AcYear, 'Heading'=>'Effort'])->first();

        if ($commentSetup != null)
        {
            $comments = ARCommStudent::where('CommSetupID', $commentSetup->CommSetupID)->get();
        }

        $year = $y;
        $term = $t;
        $grade = $class->AcYear;


        $exams = array();

        foreach ($studentClasses as $key=>$st)
        {
            $studentid = $st->StudID;
            $subjects = ARSubject::whereHas('Acad1', function (Builder $query) use ($studentid){
                $query->where('StudID', $studentid);
            })->where(['TermYear'=>$year, 'Term'=>$term])->where('SubjID', '!=', 0)->get();


            $results = null;

            $subjectids = array();

            foreach ($subjects as $s)
            {
                if ($s->acad1->count() > 0){

                    if ($s->acad1->where('StudID', $studentid)->first() != null)
                    {
                        $AcadID = $s->acad1->where('StudID', $studentid)->first()->AcadID;
                    }
                }
                array_push($subjectids, $AcadID );
            }

            $results = ARAssColData::whereIn('AcadID', $subjectids)->get();

            foreach ($results as $app)
            {
                if ($app->Col->ColHeading == 'EOTM')
                {
                    if (self::find_key_value($exams, 'course',  $app->acad1->subject->subject->Subject ))
                    {

                    }
                    else
                    {
                        $ar = str_split($app->acad1->subject->teacher->FirstName);
                        $f = $ar[0];
                        array_push($exams, ['StudentID'=>$app->acad1->StudID,'course'=>$app->acad1->subject->subject->Subject, 'mark'=>$app->Mark, 'teacher'=>$app->acad1->subject->teacher->Title.' '.$f.' '.$app->acad1->subject->teacher->LastName, 'remark'=>$app->Acad1->Remarks]);
                    }

                }

            }
        }

        //return $exams;
        return View('classes.show', compact('exams','comments','year','term','grade','currentSession','class','studentClasses'));
    }

    public function download($id)
    {
        $currentSession = Term::where('Closed', 0)->first();
        $class = GradeClass::find($id);

        $comments = null;

        $y = $class->ClYear;
        $t = $class->ClTerm;
        $cl = $class->Class;

        $studentClasses = StudentClass::where(['TermYear'=>$y, 'Term'=>$t, 'Class'=>$cl])->paginate(6);

        $commentSetup = ARCommSetup::where(['TermYear'=>$y,'Term'=>$t, 'StudYear'=>$class->AcYear, 'Heading'=>'Effort'])->first();

        if ($commentSetup != null)
        {
            $comments = ARCommStudent::where('CommSetupID', $commentSetup->CommSetupID)->get();
        }

        $year = $y;
        $term = $t;
        $grade = $class->AcYear;


        $exams = array();

        foreach ($studentClasses as $key=>$st)
        {
            $studentid = $st->StudID;
            $subjects = ARSubject::whereHas('Acad1', function (Builder $query) use ($studentid){
                $query->where('StudID', $studentid);
            })->where(['TermYear'=>$year, 'Term'=>$term])->where('SubjID', '!=', 0)->get();


            $results = null;

            $subjectids = array();

            foreach ($subjects as $s)
            {
                if ($s->acad1->count() > 0){

                    if ($s->acad1->where('StudID', $studentid)->first() != null)
                    {
                        $AcadID = $s->acad1->where('StudID', $studentid)->first()->AcadID;
                    }
                }
                array_push($subjectids, $AcadID );
            }

            $results = ARAssColData::whereIn('AcadID', $subjectids)->get();

            foreach ($results as $app)
            {
                if ($app->Col->ColHeading == 'EOTM')
                {
                    if (self::find_key_value($exams, 'course',  $app->acad1->subject->subject->Subject ))
                    {

                    }
                    else
                    {
                        $ar = str_split($app->acad1->subject->teacher->FirstName);
                        $f = $ar[0];
                        array_push($exams, ['StudentID'=>$app->acad1->StudID,'course'=>$app->acad1->subject->subject->Subject, 'mark'=>$app->Mark, 'teacher'=>$app->acad1->subject->teacher->Title.' '.$f.' '.$app->acad1->subject->teacher->LastName, 'remark'=>$app->Acad1->Remarks]);
                    }

                }

            }
        }

        //return $exams;
        return View('classes.show', compact('exams','comments','year','term','grade','currentSession','class','studentClasses'));
    }

    public function checkIfExist($id)
    {
        $s = TeacherSubject::where('grade_subject_id', $id)->count();
        if ($s > 0)
        {
            return true;
        }
        return false;
    }

    public function getGrades()
    {

        $grades = Grade::orderBy('grade', 'asc')->SimplePaginate(8);

        return View('grades.classes', compact('grades'));
    }


    /**y
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staffs = Staff::where('StatusID', 1)->get();
        $grades = Grade::all();
        $currentSession = Term::where('Closed', 0)->first();//
        $year= $currentSession->TermYear;
        $term =  $currentSession->Term;

        $class = GradeClass::findorFail($id);

        //return $class->teacher;

        return View('classes.edit', compact('grades','staffs','year','term','class'));
    }

    public function allocate(Request $request)
    {
        foreach ($request->subject_ids as $subject_id)
        {
            $gs = GradeSubject::firstOrCreate(
                ['year'=>$request->year, 'term'=>$request->term, 'grade_id'=>$request->grade_id, 'subject_id'=>$subject_id],
                ['year'=>$request->year, 'term'=>$request->term, 'grade_id'=>$request->grade_id, 'subject_id'=>$subject_id]
            );
        }
        return redirect()->back();
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
        $grade = GradeClass::findorFail($id);
        $grade->update($request->all());
        return redirect()->route('classes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        Grade::find($req->id)->delete();
        return redirect('grades');
    }
}
