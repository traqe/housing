<?php

namespace App\Http\Controllers;

use App\ARAcad1;
use App\ARAssCol;
use App\ARAssColData;
use App\ARSubject;
use App\ExamGrade;
use App\Grade;
use App\Subject;
use App\Term;
use Illuminate\Http\Request;
use App\Exam;
use App\CurrentSession;
use Toast;

class ExamController extends Controller
{
    public function index()
    {
        $year = CurrentSession::first()->year;
        $term = CurrentSession::first()->term;
        $exams = Exam::where(['year'=>$year, 'term'=>$term])->get();
        return View('exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        $year = CurrentSession::first()->year;
        $term = CurrentSession::first()->term;
        return View('exams.create', compact('subjects','year', 'term'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Exam::create($request->all());
        return redirect('/exams');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam = Exam::findorFail($id);
        $grades = Grade::orderby('grade','asc')->get();
        $examgrade = ExamGrade::where('examid', $id)->SimplePaginate(5);
        return View('exams.show', compact('exam', 'examgrade', 'grades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::findorFail($id);
        $subjects = Subject::all();
        return View('exams.edit', compact('exam','subjects'));

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
        $exam = Exam::findorFail($id);
        $exam->update($request->all());
        return redirect('/exams');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        Exam::find($req->id)->delete();
        return redirect('/exams');
    }

    public function deleteAssignment($id)
    {
       // return $id;
        ExamGrade::find($id)->delete();
        return redirect()->back();
    }



    public function enterMidMarks(Request $request)
    {
        //return $request->all();
        $currentSession = Term::where('Closed', 0)->first();
        $year = $currentSession->TermYear;
        $term = $currentSession->Term;

        $ArSubject = ARSubject::find($request->ARSID);


        if ($ArSubject->TermYear == $year && $ArSubject->Term == $term )
        {
            $ARAcad1 = ARAcad1::updateOrCreate(['ARSID'=>$request->ARSID,'StudID'=>$request->studentid],[ 'Mark'=>$request->mark, 'Remarks'=>'','MidA'=>'']);

            if (ARAssCol::where(['ARSID'=>$request->ARSID, 'ColHeading'=>'MT'])->first() != null)
            {
                $ARAssCol = ARAssCol::where(['ARSID'=>$request->ARSID, 'ColHeading'=>'MT'])->first();
            }
            else
            {
                $ARAssCol = ARAssCol::where(['ARSID'=>$request->ARSID, 'ColHeading'=>'TM'])->first();
            }

            ARAssColData::updateOrCreate(['ARAssColID'=>$ARAssCol->ARAssColID, 'AcadID'=>$ARAcad1->AcadID],[ 'Mark'=>$request->mark]);
            Exam::updateOrCreate(['year'=>$year,'term'=>$term, 'studentnumber'=>$request->studentid, 'subject'=>$request->subject],['assessment'=>$request->mark, 'created_by'=>$request->created_by, 'setId'=>$request->setId, 'grade'=>$request->grade]);
            return 'Data Inserted';
        }
        else
        {
            Toast::success("You cannot Change Marks that are not Current");

            return "You cannot Change Marks that are not Current";

        }


    }

    public function enterExams(Request $request)
    {
        $currentSession = Term::where('Closed', 0)->first();
        $year = $currentSession->TermYear;
        $term = $currentSession->Term;

        $ArSubject = ARSubject::find($request->ARSID);


        if ($ArSubject->TermYear == $year && $ArSubject->Term == $term )
        {
            $ARAcad1 = ARAcad1::updateOrCreate(['ARSID'=>$request->ARSID,'StudID'=>$request->studentid],['Mark'=>$request->mark, 'Remarks'=>'','MidA'=>'']);
            $ARAssCol = ARAssCol::where(['ARSID'=>$request->ARSID, 'ColHeading'=>'EOTM'])->first();
            ARAssColData::updateOrCreate(['ARAssColID'=>$ARAssCol->ARAssColID, 'AcadID'=>$ARAcad1->AcadID],[ 'Mark'=>$request->mark]);
            Exam::updateOrCreate(['year'=>$year,'term'=>$term, 'studentnumber'=>$request->studentid, 'subject'=>$request->subject],['exam'=>$request->mark, 'overall'=>$request->mark, 'created_by'=>$request->created_by, 'setId'=>$request->setId, 'grade'=>$request->grade]);

            return 'Exam Inserted';
        }
        else
        {
            Toast::success("You cannot Change Marks that are not Current");

            return "You cannot Change Marks that are not Current";

        }

    }

    public function addComment(Request $request)
    {
        //return $request->all();
        $ARAcad1 = ARAcad1::find($request->AcadID);
        $ARAcad1->Remarks = $request->comment;
        $ARAcad1->save();
        Exam::updateOrCreate(['year'=>$request->year,'term'=>$request->term, 'studentnumber'=>$request->studentid, 'subject'=>$request->subject],['comment'=>$request->comment]);

        return redirect()->back();
    }

    public function enterGrade(Request $request)
    {
        //return $request->all();
        $currentSession = Term::where('Closed', 0)->first();
        $year = $currentSession->TermYear;
        $term = $currentSession->Term;

        $ArSubject = ARSubject::find($request->ARSID);


        if ($ArSubject->TermYear == $year && $ArSubject->Term == $term )
        {
            if (strtoupper($request->g) == 'A' || strtoupper($request->g)  == 'B' || strtoupper($request->g)  == 'C' || strtoupper($request->g)  == 'D' || strtoupper($request->g)  == 'E' )
            {
                $ARAcad1 = ARAcad1::updateOrCreate(['ARSID'=>$request->ARSID,'StudID'=>$request->studentid],[ 'MidA'=>strtoupper($request->g) , 'Remarks'=>'']);
                Exam::updateOrCreate(['year'=>$year,'term'=>$term, 'studentnumber'=>$request->studentid, 'subject'=>$request->subject],['symbol'=>$request->g, 'created_by'=>$request->created_by, 'setId'=>$request->setId, 'grade'=>$request->grade]);
                return 'Grade Inserted';
            }
            else
            {
                return 'Incorrent Symbol';
            }

        }
        else
        {
            Toast::success("You cannot Change Marks that are not Current");

            return "You cannot Change Marks that are not Current";

        }
    }


    public function assign(Request $request)
    {
        foreach ($request->grade_id as $gradeid)
        {
            ExamGrade::firstOrCreate(
                ['examid'=>$request->examid, 'gradeid'=>$gradeid],
                ['examid'=>$request->examid, 'gradeid'=>$gradeid, 'created_by'=>$request->created_by]
            );
        }
        return redirect()->back();
    }
}
