<?php

namespace App\Http\Controllers;

use App\ActivityStudent;
use App\ARAcad1;
use App\ARAssCol;
use App\ARAssColData;
use App\ARAttend;
use App\ARCommSetup;
use App\ARCommStudent;
use App\ARSubject;
use App\Country;
use App\DataTables\StudentDataTable;
use App\GradeClass;
use App\Http\Requests;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Parents;
use App\Repositories\StudentRepository;
use App\Student;
use App\StudentClass;
use App\StudentSet;
use App\Subject;
use App\SubjectSet;
use App\Term;
use App\Variable;
use App\vARSubjAcad;
use App\vMidTermMark;
use Faker\Provider\DateTime;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Toast;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Illuminate\Database\Eloquent\Builder;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use File;


class StudentController extends AppBaseController
{
    /** @var  StudentRepository */
    private $studentRepository;

    public function __construct(StudentRepository $studentRepo)
    {
        $this->studentRepository = $studentRepo;
    }

    /**
     * Display a listing of the Student.
     *
     * @param StudentDataTable $studentDataTable
     * @return Response
     */
    public function index()
    {
        $students = Student::where('StatusID', 1)->orderby('LastName')->get();
        $parents = Parents::orderby('MotherLName')->get();
        $countries = Country::all();
        $status = Variable::where('VarName', 'Student Status')->get();
        $religion =  Variable::where('VarName', 'Religion')->get();
        $st = 1;
        return View('students.index', compact('religion','st','status','parents','countries','students'));
    }

    function key_value_pair_exists(array $haystack, $key, $value) {
        return array_key_exists($key, $haystack) &&
            $haystack[$key] == $value;
    }

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

    public function printStudentReport($studentid, $term, $year)
    {
        $student = Student::find($studentid);

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

        //return $subjects;

        // return ARAcad1::whereIn('AcadID', $subjectids)->get();

        $exams = array();

        $results = ARAssColData::whereIn('AcadID', $subjectids)->get();

        //return $results;

        foreach ($results as $app)
        {
            if ($app->Col->ColHeading == 'MT' || $app->Col->ColHeading == 'TM' || $app->Col->ColHeading == 'EX' )
            {
                if (self::find_key_value($exams, 'course',  $app->acad1->subject->subject->Subject ))
                {

                }
                else
                {
                    array_push($exams, ['course'=>$app->acad1->subject->subject->Subject, 'mark'=>$app->Mark, 'teacher'=>$app->acad1->subject->teacher->Title.' '.$app->acad1->subject->teacher->LastName.' '.$app->acad1->subject->teacher->FirstName, 'remark'=>$app->Acad1->MidA]);
                }

            }

        }

        //return $exams;


        $c = $student->getClass($year, $term);

        $academicYear = Term::where(['TermYear'=>$year, 'Term'=>$term])->first();
        $symbols = Variable::where('VarName', 'AREffort')->orderby('VarValueN')->get();

        $ARAcad1 =ARAcad1::where(['StudID'=>$studentid])->get();


        $summaryData = Array(
            'student' => $student,
            'year'=>$year,
            'term'=>$term,
            'academicYear'=>$academicYear,
            'symbols'=>$symbols,
            'c'=>$c,
            'subjects'=>$subjects,
            'ARAcad1'=>$ARAcad1,
            'results'=>$results,
            'exams'=>$exams
        );

        $pdf = PDF::loadView('reports.student', $summaryData);
        $filename = "Student Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function download($id, $term, $year)
    {
        $class = GradeClass::find($id);
        $cl = $class->Class;
        $studentClasses = StudentClass::where(['TermYear'=>$year, 'Term'=>$term, 'Class'=>$cl])->get();

        foreach ($studentClasses as $key=>$st)
        {
            $studentid = $st->StudID;
            $student = Student::find($studentid);
            $next_term = '';
            $next_year = '';
            $openingDate='';
            $path= '';
            $current = Term::where('Term', $term)->where('TermYear', $year)->first();
            $ct = $current->Term;
            $cy = $current->TermYear;

            if ($ct == 1)
            {
                $next_term = 2;
                $next_year = $cy;
            }
            elseif ($ct == 2 )
            {
                $next_term = 3;
                $next_year = $cy;
            }
            else
            {
                $next_term = 1;
                $next_year = $cy+1;
            }

            $openingDate = Term::where(['TermYear'=>$next_year, 'Term'=>$next_term])->first()->StartDate;

            $openingDate = strtotime($openingDate);
            $openingDate = date('l, jS M, Y', $openingDate);



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

            $exams = array();

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
                        array_push($exams, ['course'=>$app->acad1->subject->subject->Subject, 'mark'=>$app->Mark, 'teacher'=>$app->acad1->subject->teacher->Title.' '.$f.' '.$app->acad1->subject->teacher->LastName, 'remark'=>$app->Acad1->Remarks]);
                    }

                }

            }


            $c = $student->getClass($year, $term);
            $g = $student->getGrade($year, $term);

            $commsetup = ARCommSetup::where(['TermYear'=>$year, 'Term'=>$term, 'StudYear'=>$g])->first();
            $studComment = null;
            $comment = '';

            if ($commsetup != null)
            {
                $studComment = ARCommStudent::where(['CommSetupID'=>$commsetup->CommSetupID, 'StudentID'=>$studentid])->first();
                if ($studComment != null)
                {
                    $comment = $studComment->Comment;
                }
            }

            $academicYear = Term::where(['TermYear'=>$year, 'Term'=>$term])->first();
            $symbols = Variable::where('VarName', 'AREffort')->orderby('VarValueN')->get();

            $ARAcad1 =ARAcad1::where(['StudID'=>$studentid])->get();

            $ARAttend = ARAttend::where(['StudID'=>$studentid, 'TermYear'=>$year, 'Term'=>$term])->first();

            $studActivity = ActivityStudent::whereHas('activity', function (Builder $query) use ($year, $term){
                $query->where(['TermYear'=>$year, 'Term'=>$term]);
            })->where('StudentID',$studentid )->get();

            $summaryData = Array(
                'student' => $student,
                'year'=>$year,
                'term'=>$term,
                'academicYear'=>$academicYear,
                'symbols'=>$symbols,
                'c'=>$c,
                'subjects'=>$subjects,
                'ARAcad1'=>$ARAcad1,
                'results'=>$results,
                'exams'=>$exams,
                'openingDate'=>$openingDate,
                'comment'=>$comment,
                'studActivity'=>$studActivity,
                'ARAttend'=>$ARAttend
            );



            $filename = $student->LastName.' '.$student->FirstName.' '.$studentid;
            $path = storage_path($year.'/'.$term.'/'.$c);

            if(!File::exists($path)) {
                File::makeDirectory($path, $mode = 0755, true, true);

            }


            $pdf = PDF::loadView('reports.endofterm', $summaryData)->save(''.$path.'/'.$filename.'.pdf');

            //return $pdf->download(''.$filename.'.pdf');

        }
        foreach ($studentClasses as $key=>$st)
        {
            $studentid = $st->StudID;
            $student = Student::find($studentid);
            $path = storage_path($year.'/'.$term.'/'.$c);
            $filename = $student->LastName.' '.$student->FirstName.' '.$studentid;


            $to_name = $student->parent->MotherLName.' '.$student->parent->MotherFName;
            $to_email = $student->parent->MEmail;


            if ($to_email != "")
            {
                Mail::raw('End of Term Report', function ($message) use  ($to_name, $to_email, $path, $filename) {
                    $message->to('muzikaishmael@gmail.com')->attach($path.'/'.$filename.'.pdf');
                });
            }
        }




        return redirect()->back();

    }

    public function printEndOfTermReport($studentid, $term, $year)
    {
        $student = Student::find($studentid);
        $next_term = '';
        $next_year = '';
        $openingDate='';
        $current = Term::where('Closed', 0)->first();
        $ct = $current->Term;
        $cy = $current->TermYear;
        $ARAttend = ARAttend::where(['StudID'=>$studentid, 'TermYear'=>$year, 'Term'=>$term])->first();
        $avg = 0;

        if ($ct == 1)
        {
            $next_term = 2;
            $next_year = $cy;
        }
        elseif ($ct == 2 )
        {
            $next_term = 3;
            $next_year = $cy;
        }
        else
        {
            $next_term = 1;
            $next_year = $cy+1;
        }

        $openingDate = Term::where(['TermYear'=>$next_year, 'Term'=>$next_term])->first()->StartDate;
        $ARAttend = ARAttend::where(['StudID'=>$studentid, 'TermYear'=>$year, 'Term'=>$term])->first();

        //return $ARAttend;

        $openingDate = strtotime($openingDate);
        $openingDate = date('l, jS M, Y', $openingDate);



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

        $exams = array();

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
                    array_push($exams, ['course'=>$app->acad1->subject->subject->Subject, 'mark'=>$app->Mark, 'teacher'=>$app->acad1->subject->teacher->Title.' '.$f.' '.$app->acad1->subject->teacher->LastName, 'remark'=>$app->Acad1->Remarks]);
                }
            }
        }

        $c = $student->getClass($year, $term);
        $g = $student->getGrade($year, $term);

        $commsetup = ARCommSetup::where(['TermYear'=>$year, 'Term'=>$term, 'StudYear'=>$g])->first();
        $studComment = null;
        $comment = '';

        if ($commsetup != null)
        {
            $studComment = ARCommStudent::where(['CommSetupID'=>$commsetup->CommSetupID, 'StudentID'=>$studentid])->first();
            if ($studComment != null)
            {
                $comment = $studComment->Comment;
            }
        }

        $academicYear = Term::where(['TermYear'=>$year, 'Term'=>$term])->first();
        $symbols = Variable::where('VarName', 'AREffort')->orderby('VarValueN')->get();

        $ARAcad1 =ARAcad1::where(['StudID'=>$studentid])->get();

        $studActivity = ActivityStudent::whereHas('activity', function (Builder $query) use ($year, $term){
            $query->where(['TermYear'=>$year, 'Term'=>$term]);
        })->where('StudentID',$studentid )->get();

        $summaryData = Array(
            'student' => $student,
            'year'=>$year,
            'term'=>$term,
            'academicYear'=>$academicYear,
            'symbols'=>$symbols,
            'c'=>$c,
            'subjects'=>$subjects,
            'ARAcad1'=>$ARAcad1,
            'results'=>$results,
            'exams'=>$exams,
            'openingDate'=>$openingDate,
            'comment'=>$comment,
            'studActivity'=>$studActivity,
            'ARAttend'=>$ARAttend
        );

        $pdf = PDF::loadView('reports.endofterm', $summaryData);
        $filename = "End Of Term Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getSubjectGradeAvg($grade, $subject, $term, $year)
    {
        $students = GradeClass::where(['TermYear'=>$year, 'Term'=>$term, 'AcYear'=>$grade])->get();
        $stNo = $students->count();

        $acad1IDs = array();

        foreach ($students as $s)
        {
            if ($s->acad1->count() > 0)
            {
                if ($s->acad1->where('ARSID', $subject)->first() != null)
                {
                    $AcadID = $s->acad1->where('ARSID', $subject)->first()->AcadID;
                }
            }
            array_push($acad1IDs, $AcadID );
        }

        $exams = array();

        $results = ARAssColData::whereIn('AcadID', $acad1IDs)->get();

        foreach ($results as $app)
        {
            if ($app->Col->ColHeading == 'EOTM')
            {
                if (self::find_key_value($exams, 'course',  $app->acad1->StudID ))
                {

                }
                else
                {
                    $ar = str_split($app->acad1->subject->teacher->FirstName);
                    $f = $ar[0];
                    array_push($exams, ['StudentID'=>StudID,'course'=>$app->acad1->subject->subject->Subject, 'mark'=>$app->Mark, 'teacher'=>$app->acad1->subject->teacher->Title.' '.$f.' '.$app->acad1->subject->teacher->LastName, 'remark'=>$app->Acad1->Remarks]);
                }

            }

        }

        $arrCount = count($exams);
        $total = 0;
        $avg = 0;
        foreach ($exams as $ex)
        {
            $total = $total + $ex['mark'];
        }
        $avg = round($total/$arrCount);
        return $avg;


    }

    public function addComment(Request $request)
    {
        //return 'here';
        $term = Term::where('Closed', 0)->first();

        if ($term->TermYear == $request->year && $term->Term == $request->term)
        {
            $lastSetup = ARCommSetup::where(['StudYear'=>$request->grade, 'Heading'=>'Effort'])->orderby('TermYear', 'desc')->first();

            if ($lastSetup != null)
            {
                $currentSetup = ARCommSetup::UpdateOrCreate(['TermYear'=>$term->TermYear, 'Term'=>$term->Term, 'StudYear'=>$request->grade],[
                    'Heading'=>'Effort'
                    ,'HeadingRep'=>$lastSetup->HeadingRep
                    ,'Type'=>$lastSetup->Type
                    ,'MinSize'=>$lastSetup->MinSize
                    ,'MaxSize'=>$lastSetup->MaxSize
                    ,'Seq'=>$lastSetup->Seq
                    ,'Status'=>$lastSetup->Status
                    ,'IsMandatory'=>$lastSetup->IsMandatory
                    ,'Reference'=>$lastSetup->Reference
                    ,'DataType'=>$lastSetup->DataType
                    ,'SetID'=>$lastSetup->SetID
                    ,'CommBankID'=>$lastSetup->CommBankID
                    ,'SubjCommBank'=>$lastSetup->SubjCommBank
                    ,'CopyPrevComment'=>$lastSetup->CopyPrevComment
                    ,'IsImage'=>$lastSetup->IsImage
                    ,'CalcType'=>$lastSetup->CalcType
                    ,'CommDuplication'=>$lastSetup->CommDuplication
                    ,'CommPerson'=>$lastSetup->CommPerson
                    ,'ShowGrade'=>$lastSetup->ShowGrade
                    ,'OverallResult'=>$lastSetup->OverallResult
                    ,'ResultAnalysis'=>$lastSetup->ResultAnalysis
                    ,'IsSummary'=>$lastSetup->IsSummary
                    ,'PromoRule'=>$lastSetup->PromoRule
                ]);
            }

            ARCommStudent::updateOrCreate(['CommSetupID'=>$currentSetup->CommSetupID, 'StudentID'=>$request->studentid],['Comment'=>$request->comment]);

            return $request->comment;
        }
        return 'Comment not saved';



    }




    public function searchStudent(Request $request)
    {
        $students = Student::where('StatusID', $request->StatusID)->orderby('LastName')->get();
        $parents = Parents::all();
        $countries = Country::all();
        $status = Variable::where('VarName', 'Student Status')->get();
        $religion =  Variable::where('VarName', 'Religion')->get();
        $st = $request->StatusID;
        return View('students.index', compact('religion','st','status','parents','countries','students'));
    }

    public function addStudentSet(Request $request)
    {
        $setform = SubjectSet::find($request->OGSID)->yearterm->AcYear;
        $term = Term::where('Closed', 0)->first();

        foreach ($request->StudID as $studid)
        {
            //return $term;
            $student = Student::find($studid);//->getClass($term->TermYear, $term->Term);
            $studentform = $student->studentClass->where('TermYear','2020')->where('Term','1')->first()->AcYear;
            //return $studentform;

            //return 'here';

            if ($setform == $studentform)
            {
                StudentSet::UpdateOrCreate(['StudID'=>$studid,'OGSID'=>$request->OGSID]);
            }
            else
            {
                Toast::success('The student cannot be in the selected set');
                return redirect()->back();
            }


        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new Student.
     *
     * @return Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created Student in storage.
     *
     * @param CreateStudentRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $arr = $input->toArray();
        Arr::except($arr, 'Age');

        $student = Student::find($request->StudentID);
        if ($student != null)
        {

            Student::create($arr);
            Flash::success('Student Created successfully.');
            return redirect()->route('students');
        }

        $student = Student::update($arr);
        $student->save();
        Flash::success('Student Updated successfully.');
        return redirect()->route('students');
    }

    /**
     * Display the specified Student.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $student = $this->studentRepository->findWithoutFail($id);

        if (empty($student)) {
            Flash::error('Student not found');

            return redirect(route('students.index'));
        }

        return view('students.show')->with('student', $student);
    }

    public function getStudent($id)
    {
        $student = Student::find($id);
        $activeSession = Term::where('Closed', 0)->first();

        $studentClass = StudentClass::where(['StudID'=>$student->StudentID,'TermYear'=>$activeSession->TermYear,'Term'=>$activeSession->Term])->first();

        if ($studentClass != null)
        {
            $arr = $student->toArray();

            $ar = Arr::add($arr, 'Class',$studentClass->Class);

            return $ar;
        }
        return $student;

    }

    /**
     * Show the form for editing the specified Student.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $student = $this->studentRepository->findWithoutFail($id);

        if (empty($student)) {
            Flash::error('Student not found');

            return redirect(route('students.index'));
        }

        return view('students.edit')->with('student', $student);
    }


    public  function removeStudent($id)
    {
        $currentSession = Term::where('Closed', 0)->first();
        $studentClass = StudentClass::where(['StudID'=>$id, 'TermYear'=>$currentSession->TermYear, 'Term'=>$currentSession->Term])->first();

        if ($studentClass != null)
        {
            $studentClass->delete();
            return 'Student Deleted from Class';
        }

        return 'Student was not Removed from Class';

    }




    /**
     * Update the specified Student in storage.
     *
     * @param  int              $id
     * @param UpdateStudentRequest $request
     *
     * @return Response
     */
    public function update(Request $request)
    {
        $student = Student::find($request->StudentID);
        if ($student != null) {
            $student->update(Arr::except($request->all(),'Age'));

            Toast::success('Student updated successfully');
            return redirect()->route('students');
        }

        Student::create(Arr::except($request->all(),'Age'));
        Toast::success('Student created successfully.');
        return redirect()->route('students');
    }

    /**
     * Remove the specified Student from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $student = $this->studentRepository->findWithoutFail($id);

        if (empty($student)) {
            Flash::error('Student not found');

            return redirect(route('students.index'));
        }

        $this->studentRepository->delete($id);

        Flash::success('Student deleted successfully.');

        return redirect(route('students.index'));
    }

}
