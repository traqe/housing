<?php

namespace App\Http\Controllers;

use App\Grade;
use App\GradeClass;
use App\StudentClass;
use App\Term;
use App\YearFinList;
use Illuminate\Http\Request;
use Toast;

class RollOverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        $years = YearFinList::orderby('YearEnding','Desc')->get();
        $currentSession = Term::where('Closed', 0)->first();
        $classes = GradeClass::where(['ClYear'=>$currentSession->TermYear, 'ClTerm'=>$currentSession->Term])->get();
        return View('rollovers.index', compact('currentSession','grades','classes','years'));
    }

    public function rollOverClasses($year,$term,$class)
    {

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

    public function rollover(Request $request)
    {
        $grades = Grade::all();
        $currentSession = Term::where('Closed', 0)->first();
        $previousTerm = Term::where(['TermYear'=>$request->Year,'Term'=>$request->Term])->first();
        foreach ($grades as $grade)
        {
            if ($currentSession->Term == 1)
            {
                $classes =  GradeClass::where(['ClYear'=>$previousTerm->TermYear, 'ClTerm'=>$previousTerm->Term, 'AcYear'=>$grade->StudYear])->get();
                foreach ($classes as $c)
                {
                    GradeClass::updateOrCreate(['ClYear'=>$currentSession->TermYear,'ClTerm'=>$currentSession->Term,'Class'=>$c->Class, 'AcYear'=>$c->AcYear]);
                }
            }
        }

        $this->RollOverStudents($request->Year, $request->Term);
        //Toast::success('Roll Over Successful');
        return redirect()->back();
    }


    public function RollOverStudents($year, $term)
    {
        $currentSession = Term::where('Closed', 0)->first();
    
        $students = StudentClass::where(['TermYear'=> $year, 'Term'=> $term])->get();

        foreach ($students as $s)
        {
            if ($currentSession->Term == 1)
            {
                if (strpos($s->AcYear, 'F') !== false) {

                    if ($s->AcYear != 'F4')
                    {
                        $ar = str_split($s->AcYear);
                        $ar1 = str_split($s->Class);
                        $f = $ar[0];
                        $f1 = $ar[1];
                        $f2 = $f1 + 1;

                        $c1 = $ar1[0];
                        $c2 = $ar1[1];
                        $c3 = $ar1[2];

                        $c4 = $c1+1;

                        StudentClass::updateOrCreate(['TermYear'=>$currentSession->TermYear, 'Term'=>$currentSession->Term, 'StudID'=>$s->StudID, 'AcYear'=>$f.$f2, 'Class'=>$c4.$c2.$c3]);
            
                    } 
                    else 
                    {
                        StudentClass::updateOrCreate(['TermYear' => $currentSession->TermYear, 'Term' => $currentSession->Term, 'StudID' => $s->StudID, 'AcYear' => 'L6', 'Class' => 'L6A' ]);
                    }
                }
                else
                {
                    if ($s->AcYear != 'U6')
                    {
                        $f = str_replace('L', 'U', $s->AcYear);
                        $cl = str_replace('L', 'U', $s->Class);
                        StudentClass::updateOrCreate(['TermYear'=>$currentSession->TermYear, 'Term'=>$currentSession->Term, 'StudID'=>$s->StudID, 'AcYear'=>$f, 'Class'=>$cl]);
                    }
                    else
                    {
                        $stud = $s->student;
                        $stud->StatusID = 4;
                        $stud->save();
                    }
                }
            }
            else
            {

                StudentClass::updateOrCreate(['TermYear' => $currentSession->TermYear, 'Term' => $currentSession->Term, 'StudID' => $s->StudID, 'AcYear' => $s->AcYear, 'Class' => $s->Class]);
            }
        }

        Toast::success('Roll Over Successful');

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
