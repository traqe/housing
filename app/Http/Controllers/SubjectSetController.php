<?php

namespace App\Http\Controllers;

use App\ARAssCol;
use App\ARSubject;
use App\Grade;
use App\GradeClass;
use App\SetGroup;
use App\SetupSubGroup;
use App\Staff;
use App\Subject;
use App\SubjectGroup;
use App\SubjectSet;
use App\SubjectSetup;
use App\Teacher;
use App\Term;
use App\TimeTable;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\SetYearTerm;
use App\Student;
use App\YearFinList;
use Toast;

class SubjectSetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentSession = Term::where('Closed', 0)->first();
        $year = $currentSession->TermYear;
        $term = $currentSession->Term;

        $sets = SubjectSet::whereHas('yearterm', function (Builder $query) use ($year, $term){
            $query->where(['OGYear'=>$year,'OGTerm'=>$term]);
        })->get();

        $grades = Grade::all();
        $years = YearFinList::orderby('YearEnding','Desc')->get();
        $students = Student::all();

        $year = null;
        $term = null;
        $grade = null;
        return View('sets.index', compact('sets','years', 'grades','students','currentSession','year','term','grade'));
    }

    public function search(Request $request)
    {

        $year = $request->Year;
        $term = $request->Term;
        $grade = $request->studForm;

        $sets = SubjectSet::whereHas('yearterm', function (Builder $query) use ($year, $term, $grade){
            $query->where(['OGYear'=>$year,'OGTerm'=>$term, 'AcYear'=>$grade]);
        })->get();

        $grades = Grade::all();
        $years = YearFinList::orderby('YearEnding','Desc')->get();
        $currentSession = Term::where(['TermYear'=>$request->Year, 'Term'=>$request->Term])->first();
        $classes = GradeClass::where(['ClYear'=>$currentSession->TermYear, 'ClTerm'=>$currentSession->Term,'AcYear'=>$request->studForm])->get();
        $students = Student::all();

        return View('sets.index', compact('sets','years', 'grades','students','currentSession','year','term','grade'));
    }



    public function getSetStudents($id)
    {

        $set = SubjectSet::find($id);

        $sess =  $set->yearterm;

        //return $sess;

        $num = $set->students->count();

        $arr = array();

        $students = $set->students;

        //return $students;

        foreach($students as $s)
        {
            array_push($arr, ['StudentID'=>$s->StudID, 'Name'=>$s->student->LastName. ' , '.$s->student->FirstName,'num'=>$num, 'class'=>$s->student->getClass($sess->OGYear, $sess->OGTerm), "Term"=>$sess->OGTerm, "Year"=>$sess->OGYear]);
            //array_add($s, 'student', $s->student->LastName. ' '.$s->student->FirstName);
        }

        return $arr;
        //var_dump($arr);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timetables = TimeTable::where('Status','Current')->get();
        $currentSession = Term::where('Closed', 0)->first();
        $year = $currentSession->TermYear;
        $term = $currentSession->Term;
        $currentTimeTable = TimeTable::where(['TermYear'=>$year,'Term'=>$term,'Status'=>'Current'])->first();

       // $sg = $currentTimeTable->subjectgroup;

        $sg = SetYearTerm::where(['OGYear'=>$year, 'OGTerm'=>$term])->get();

        //return $sg;

        $teachers = Staff::where('StatusID', 1)->orderby('LastName')->get();
        $subjects = Subject::orderby('Subject','asc')->get();

        //$subgrps = SubjectGroup::all();

        return View('sets.create', compact('teachers','subjects','sg','timetables', 'currentSession','year','term','currentTimeTable'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $t = TimeTable::where(['TermYear'=>$request->TermYear, 'Term'=>$request->Term, 'Status'=>'Current'])->first();
        if ($t == null)
        {
            TimeTable::create($request->all());
        }
        return redirect()->back();

    }

    public function storeGroup(Request $request)
    {
        SetYearTerm::create($request->all());
        return redirect()->back();
    }

    public function updateGroup(Request $request)
    {
        //return 'here';
        $subgroup = SetYearTerm::find($request->OGID);
        $subgroup->update($request->all());
        //SetYearTerm::create($request->all());
        return redirect()->back();
    }

    public function storeSetUp(Request $request)
    {
        DB::beginTransaction();
        $SubjectID = $request->SubjID;
        $currentSession = Term::where('Closed', 0)->first();
        $year = $currentSession->TermYear;
        $term = $currentSession->Term;
        $ready = null;

        $lastYear = '';
        $lastTerm='';

        if ($term == 1)
        {
            $lastYear = $year -1;
            $lastTerm = 3;
        }
        elseif ($term == 2)
        {
            $lastYear = $year;
            $lastTerm = 1;
        }
        else
        {
            $lastYear = $year;
            $lastTerm = 2;
        }

        $currentTimeTable = TimeTable::where(['TermYear'=>$year,'Term'=>$term,'Status'=>'Current'])->first();

        $setup = SubjectSetup::where(['SSYear'=>$currentTimeTable->TermYear, 'Term'=>$currentTimeTable->Term, 'SubjName'=>$SubjectID, 'AcYear'=>$request->AcYear])->first();


        if ($setup == null)
        {
            $lastSetup = SubjectSetup::where(['AcYear'=>$request->AcYear])->where('SubjName','like','%'.$SubjectID.'%')->orderby('SSYear', 'desc')->orderby('Term','desc')->first();

//            if ($lastSetup == null)
//            {
//                $lastSetup = SubjectSetup::create(['SubjName'=>$SubjectID, 'AcYear'=>$request->AcYear,'SSYear'=>$currentTimeTable->TermYear, 'Term'=>$currentTimeTable->Term,]);
//            }

            $lastSetup->toArray();

            $filtered = Arr::except($lastSetup, ['SSYear', 'Term']);

            $ready = Arr::add($filtered, 'SSYear',$year);

            $ready = Arr::add($ready, 'Term',$term);

            $setup = SubjectSetup::create($ready->toArray()); //add to subject setup

            $subset = Arr::except($request->all(), 'SubjID');
            $subset = Arr::add($subset, 'SubjID', $setup->SubjectID);
            $subset = Arr::add($subset, 'SSID', $setup->id);

            $sg = SubjectSet::create($subset); //adding to sets
        }
        else
        {
            $subset = Arr::except($request->all(), 'SubjID');
            $subset = Arr::add($subset, 'SubjID', $setup->SubjectID);
            $subset = Arr::add($subset, 'SSID', $setup->id);
            $sg = SubjectSet::create($subset); //adding to sets

        }

        $ARSubject = ARSubject::where(['TermYear'=>$sg->yearterm->OGYear, 'Term'=>$sg->yearterm->OGTerm, 'AcYear'=>$sg->yearterm->AcYear, 'SubjID'=>$sg->SubjID, 'Section'=>$sg->Section])->first();

//        ARAssCol::updateOrCreate(['ARSID'=>$ARSubject->ARSID,'ColHeading'=>'TM','Title'=>'Term Mark', 'Weight'=>'100','OutOf'=>'100' ],['NoWeight'=>1, 'Seq'=>1, 'Lvl'=>1, 'CanEdit'=>1,'RepType'=>1, 'Report'=>1, 'Show'=>1, 'YM'=>0,'YMWeight'=>'1.00','TopMarksNo'=>0,'AssType'=>1,'PortalAssessment'=>1, 'TaskWeight'=>'0.00']);
//        ARAssCol::updateOrCreate(['ARSID'=>$ARSubject->ARSID,'ColHeading'=>'EOTM','Title'=>'END OF TERM MARK', 'Weight'=>'100','OutOf'=>'100' ],['NoWeight'=>1, 'Seq'=>1, 'Lvl'=>1, 'CanEdit'=>1,'RepType'=>1, 'Report'=>1, 'Show'=>1, 'YM'=>0,'YMWeight'=>'1.00','TopMarksNo'=>0,'AssType'=>1,'PortalAssessment'=>1, 'TaskWeight'=>'0.00']);


        //$sg = SubjectSet::find($request->setId);
        //$ARSubject = ARSubject::where(['TermYear'=>$sg->yearterm->OGYear, 'Term'=>$sg->yearterm->OGTerm, 'AcYear'=>$sg->yearterm->AcYear, 'SubjID'=>$sg->SubjID, 'Section'=>$sg->Section])->first();
        //return $ARSubject;
        ARAssCol::updateOrCreate(['ARSID'=>$ARSubject->ARSID,'ColHeading'=>'TM','Title'=>'Term Mark', 'Weight'=>'100','OutOf'=>'100' ],['NoWeight'=>1, 'Seq'=>1, 'Lvl'=>1, 'CanEdit'=>1,'RepType'=>1, 'Report'=>1, 'Show'=>1, 'YM'=>0,'YMWeight'=>'1.00','TopMarksNo'=>0,'AssType'=>1,'PortalAssessment'=>1, 'TaskWeight'=>'0.00']);
        ARAssCol::updateOrCreate(['ARSID'=>$ARSubject->ARSID,'ColHeading'=>'EOTM','Title'=>'END OF TERM MARK', 'Weight'=>'100','OutOf'=>'100' ],['NoWeight'=>1, 'Seq'=>1, 'Lvl'=>1, 'CanEdit'=>1,'RepType'=>1, 'Report'=>1, 'Show'=>1, 'YM'=>0,'YMWeight'=>'1.00','TopMarksNo'=>0,'AssType'=>1,'PortalAssessment'=>1, 'TaskWeight'=>'0.00']);




        //SetupSubGroup::updateOrCreate(['OptGroupID'=>$request->OGID, 'SSID'=>$sg->SSID, 'Section'=>$sg->Section, 'Teacher1ID'=>$sg->Teacher1ID]);

        DB::commit();

        return redirect()->back();
    }

    public  function getSubjectGroups(Request $request)
    {
        $s = TimeTable::find($request->timetable_id);//->subjectgroup;

       //$sg = $s->subjectgroup;

        $sg = SetYearTerm::where(['OGYear'=>$s->TermYear, 'OGTerm'=>$s->Term])->get();

        //return $s;
        //return $sg;

        $timetables = TimeTable::where('Status','Current')->get();
        $currentSession = Term::where('Closed', 0)->first();
        $year = $s->TermYear;
        $term = $s->Term;
        $currentTimeTable = TimeTable::where(['TermYear'=>$year,'Term'=>$term,'Status'=>'Current'])->first();
        $teachers = Staff::all();
        $subjects = Subject::all();

        return View('sets.create', compact('teachers','subjects','sg','timetables', 'currentSession','year','term','currentTimeTable'));
    }

    public function getSubjectSet($id)
    {
        $s= array();
        $subsets = SubjectSet::where('OGID', $id)->get();

        foreach ($subsets as $ss)
        {
            array_push($s, ['ID'=>$ss->OGSID,'Code'=>$ss->subject->SubjCode, 'Subject'=>$ss->subject->Subject, 'Teacher'=>$ss->teacher->LastName.' '.$ss->teacher->FirstName.' '.$ss->teacher->Code, 'Students'=>$ss->students->count()]);
        }

        return $s;
    }

    public function removeSet($id)
    {
        $subset = SubjectSet::find($id);
        //return 'here';
        $subset->delete();
        return 'Deleted';
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
    public function deleteGroup(Request $request)
    {
        //return $request;
        $grp = SetYearTerm::find($request->OGID);

        //return $grp;

        $grp->delete();

        Toast::success('Subject Group Deleted');
        return redirect()->back();
    }
}
