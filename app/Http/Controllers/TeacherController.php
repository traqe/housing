<?php

namespace App\Http\Controllers;

use App\Assessment;
use App\CurrentSession;
use App\Department;
use App\NextOfKin;
use App\Person;
use App\Staff;
use App\TeacherSubject;
use Illuminate\Http\Request;
use App\Teacher;
use Illuminate\View\View;
use App\Gender;
use App\Marital;
use Illuminate\Support\Facades\DB;
use App\GradeSubject;
use App\Grade;
use Auth;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $genders = Gender::all();
        $maritals = Marital::all();
        $departments = Department::all();
        return View('teachers.create', compact('genders','maritals','departments'));
    }

    public function store(Request $request)
    {
        try{

            DB::beginTransaction();


            $person = Person::create($request->all());

            $teacher = new Teacher();
            $teacher->person_id = $person->id;
            $teacher->ecnumber = $request->ecnumber;
            $teacher->position = $request->position;
            $teacher->department_id = $request->department_id;
            $teacher->activities = $request->activities;
            $teacher->created_by = $request->created_by;
            $teacher->save();

            NextOfKin::create(['person_id'=>$person->id,'fullname'=>$request->fullname,'relationship'=>$request->relationship,
                'telephone'=>$request->ntelephone, 'address'=>$request->naddress,'workphone'=>$request->workphone,
                'workaddress'=>$request->workaddress,'created_by'=>$request->created_by]);

            DB::commit();
            return redirect('teachers');

        } catch(Exception $e){
            DB::rollback();
            echo $e->getMessage();
        }

    }

    public function show($id)
    {
        $person = Person::findOrFail($id);
        $genders = Gender::all();
        $maritals = Marital::all();
        $departments = Department::all();
        $year = CurrentSession::first()->year;
        $term = CurrentSession::first()->term;

        $assessments = Assessment::where(['year'=>$year, 'term'=>$term])->get();

        $subjects = self::getTeacherSubjects($id);

        return view('teachers.show', compact('year','term','person','genders','maritals','departments', 'subjects', 'assessments'));
    }

    public function profile()
    {
        $staff_id = Auth::user()->staff_id;
        //return Auth::user();
        $person = Staff::find($staff_id);

        $rep = Staff::find($person->ReportTo);

//        $genders = Gender::all();
//        $maritals = Marital::all();
        $departments = Department::all();
//        $year = CurrentSession::first()->year;
//        $term = CurrentSession::first()->term;

        //$assessments = Assessment::where(['year'=>$year, 'term'=>$term])->get();

        //return $person;
        //$subjects = self::getTeacherSubjects($person->id);
        //return $subjects;
        return view('teachers.show', compact('person','rep'));

        //return view('teachers.show', compact('year','term','person','genders','maritals','departments', 'subjects', 'assessments'));
    }


    public function edit($id)
    {
        $person = Person::findOrFail($id);
        $genders = Gender::all();
        $maritals = Marital::all();
        $departments = Department::all();
        return view('teachers.edit', compact('person','genders','maritals','departments'));
    }

    public function update(Request $request, $id)
    {
        try{

            DB::beginTransaction();

            $person = Person::findOrFail($id);
            $person->update($request->all());

            //return $person;

            $teacher = Teacher::where('person_id', $person->id)->first();
            $teacher->update(['fullname'=>$request->fullname,'relationship'=>$request->relationship,'activities'=>$request->activities,
                'telephone'=>$request->ntelephone, 'address'=>$request->naddress,'workphone'=>$request->workphone,'position'=>$request->position,
                'workaddress'=>$request->workaddress,'updated_by'=>$request->updated_by, 'updated_at'=>$request->updated_at]);

            $nok = NextOfKin::where('person_id',$person->id )->first();
            $nok->update(['fullname'=>$request->fullname,'relationship'=>$request->relationship,
                'telephone'=>$request->ntelephone, 'address'=>$request->naddress,'workphone'=>$request->workphone,
                'workaddress'=>$request->workaddress,'updated_by'=>$request->updated_by, 'updated_at'=>$request->updated_at]);

            //return $teacher;

            DB::commit();
            return redirect('teachers');

        } catch(Exception $e){
            DB::rollback();
            echo $e->getMessage();
        }
    }

    public function goBack($id)
    {
        $ass = Assessment::findOrFail($id);
        //return $ass;
        $subject_id = $ass->subject_id;
        $grade_id = $ass->grade_id;
        $year = CurrentSession::first()->year;
        $term = CurrentSession::first()->term;


        $subjectgradeid = GradeSubject::where(['subject_id'=>$subject_id, 'grade_id'=>$grade_id, 'year'=>$year, 'term'=>$term])->first()->id;

        //return $subjectgradeid;
        $tid = TeacherSubject::where('grade_subject_id',$subjectgradeid)->first()->teacher_id;

        //return $tid;

        $pid = Teacher::findOrFail($tid)->person_id;

        return redirect('/teachers/'.$pid);
    }

    public function destroy($id)
    {
        //
    }

    public function getTeacherSubjects($id)
    {
        $person = Person::findOrFail($id);
        $year = CurrentSession::first()->year;
        $term = CurrentSession::first()->term;



        $subjects = DB::table('tblteachersubject')
            ->select('tblteachersubject.*', 'tblgradesubject.year','tblgradesubject.term','tblgradesubject.subject_id','tblgradesubject.grade_id','tblgrade.grade','tblsubject.subject','tblteacher.ecnumber')
            ->leftjoin('tblgradesubject', 'tblgradesubject.id','=', 'tblteachersubject.grade_subject_id')
            ->leftjoin('tblgrade', 'tblgrade.id','=', 'tblgradesubject.grade_id')
            ->leftjoin('tblteacher', 'tblteachersubject.teacher_id', '=', 'tblteacher.id')
            ->leftjoin('tblperson', 'tblperson.id', '=', 'tblteacher.person_id')
            ->leftjoin('tblsubject', 'tblsubject.id', '=', 'tblgradesubject.subject_id')
            ->where(['teacher_id'=>$person->teacher->id, 'year'=>$year, 'term'=>$term])
            ->SimplePaginate(4);
        return $subjects;
    }

}
