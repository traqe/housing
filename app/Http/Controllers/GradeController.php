<?php

namespace App\Http\Controllers;

use App\GradeClass;
use App\Staff;
use App\Subject;
use App\Teacher;
use App\Term;
use Illuminate\Http\Request;
use App\Grade;
use App\GradeSubject;
use App\CurrentSession;
use App\TeacherSubject;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    public function index()
    {
        $activeSession = Term::where('Closed', 0)->first();
        //return $activeSession;
        $grades = Grade::all();

        $classes = GradeClass::where(['ClYear'=>$activeSession->TermYear, 'ClTerm'=>$activeSession->Term])->orderby('ClYear','desc')->get();

        //return $classes;
        $staffs = Staff::all();
        return View('grades.index', compact('classes','grades', 'staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('grades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Grade::create($request->all());
        return redirect('grades');
    }

    public function assignTeacher(Request $request)
    {
        TeacherSubject::updateOrCreate(
            ['grade_subject_id' => $request->grade_subject_id], ['teacher_id'=>$request->teacher_id]
        );
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $year = CurrentSession::first()->year;
        $term = CurrentSession::first()->term;
       // return $term;

        $teachers = Teacher::all();

       // return $year.' '.$term;
        $grade = Grade::findorFail($id);
        $AllSubjects = Subject::all();

        $subjects = DB::table('tblgradesubject')
            ->select('tblgradesubject.*', 'tblteacher.ecnumber','tblperson.firstname','tblperson.surname','tblsubject.subject')
            ->leftjoin('tblteachersubject', 'tblgradesubject.id','=', 'tblteachersubject.grade_subject_id')
            ->leftjoin('tblteacher', 'tblteachersubject.teacher_id', '=', 'tblteacher.id')
            ->leftjoin('tblperson', 'tblperson.id', '=', 'tblteacher.person_id')
            ->leftjoin('tblsubject', 'tblsubject.id', '=', 'tblgradesubject.subject_id')
            ->where(['grade_id'=>$id, 'year'=>$year, 'term'=>$term])
            ->SimplePaginate(5);

        return View('grades.show', compact('grade','subjects','AllSubjects','year','term', 'teachers'));
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
        $grade = Grade::findorFail($id);
        return View('grades.edit', compact('grade'));
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
        $grade = Grade::findorFail($id);
        $grade->update($request->all());
        return redirect('grades');
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
