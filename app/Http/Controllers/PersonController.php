<?php

namespace App\Http\Controllers;

use App\AboutUs;
use App\Application;
use App\AppSession;
use App\Batch;
use App\City;
use App\Course;
use App\ExaminationBoard;
use App\Gender;
use App\IdGenerator;
use App\Marital;
use App\MedicalAid;
use App\NextOfKin;
use App\Person;
use App\Qualification;
use App\SecondaryEducation;
use App\Stand;
use App\StandType;
use App\Student;
use App\StudentAccount;
use App\Subject;
use App\Work;
use App\Beneficiary;
use App\Spouse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\ApplicationController;
use App\StandClass;
use Illuminate\Database\Eloquent\Builder;
use phpDocumentor\Reflection\Types\Null_;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::orderby('surname')->orderby('surname')->orderby('firstname')->get(); //->sortBy('surname');//->sortBy('firstname');;
        return View('persons.index', compact('people'));
    }


    public function findPeople(Request $request)
    {

        $field = $request->field;
        $value = $request->search;

        if ($field == 'appnum') {
            $people = Person::whereHas('applications', function (Builder $query) use ($field, $value) {
                $query->where($field, 'regexp', $value);
            })->orderby('surname')->orderby('firstname')->get();
        } else {
            $people = Person::where($field, 'regexp', $value)->orderby('surname')->orderby('firstname')->get();
        }
        //$people = People::where($field, 'regexp', $value)->paginate(10);

        //$people->setPath(''); //in case the page generate '/?' link.
        // $pagination = $people->appends(array('field' => $request->field,
        //     'search' => $request->search));

        return View('persons.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$genders
        return View('persons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $person = Person::Create($request->all());
        //$person = Person::find(1);

        NextOfKin::UpdateOrCreate(['person_id' => $person->id], ['fullname' => $request->fullname, 'relationship' => $request->relationship, 'telephone' => $request->noktelephone, 'email' => $request->nokemail, 'address' => $request->nokaddress, 'created_by' => Auth::user()->id, 'created_at' => Carbon::now()]);

        if ($request->marital_id == 2) {
            // return spouse details view if person is married
            return redirect()->route('addSpouse', $person->id);
        }
        return redirect()->route('viewPerson', $person->id);
    }

    public function getNok($id)
    {
        $nok = NextOfKin::where('person_id', $id)->first();
        if ($nok != null) {
            return $nok;
        }
        return Null;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return 'here';
        $person = Person::findOrFail($id);
        $genders = Gender::all();
        $maritals = Marital::All();
        $batches = Batch::where('batch_type_id', '2')->get();
        $standTypes = StandType::all();
        $people = Person::all()->sortby('surname');
        $standclass = StandClass::all();

        // beneficiaries of each person captured here and passed into compact
        // $beneficiaries = Beneficiary::where('person_id', $id)->get();
        $spouse = Spouse::where('person_id', $id)->get();
        //$spouse = $person->spouse;

        $applications = Application::where('applicant_id', $id)->get();
        // foreach($applications as $s){
        //     echo $s->allocations->first();//->where(['status'=>'APPROVED', 'current_status'=>'CURRENT']);
        // }
        // return "";
        $stands = Stand::where('status', 'Available')->get(); //orderby('price','desc')->paginate(10);

        return View('persons.show', compact('people', 'person', 'genders', 'maritals', 'batches', 'standTypes', 'applications', 'stands', 'spouse', 'standclass'));
    }

    public function generateStudentID()
    {
        $idgenerator = IdGenerator::first();
        return $idgenerator->prefixletter . $idgenerator->academicyear . $idgenerator->studentid;
    }

    public function updateStudentID()
    {
        $idgenerator = IdGenerator::first();
        $oldid = $idgenerator->studentid;
        $newid = $oldid + 1;

        $idgenerator->studentid =  '00' . $newid;
        $idgenerator->fullstudentid = $idgenerator->prefixletter . $idgenerator->academicyear . '00' . $newid;
        $idgenerator->save();
    }

    public function enrolPerson(Request $request)
    {

        //        $application = Application::find($request->id);
        //
        //        $summary = $application->summary;
        //
        //        if ($summary->faculty_rec != 'PASSED MEDICALS')
        //        {
        //            return redirect()->back()->with('info','Error!; You cannot Enrol someone who did not pass their medicals');
        //        }

        $student = Student::where('person_id', $request->person_id)->first();

        if ($student != null) {
            if ($request->studentnumber != null) {
                $student->studentnumber = $request->studentnumber;
                $student->userbarcode = '*' . $request->studentnumber . '*';
                $student->transdate = date('Y-m-d');
                $student->year = date('Y');
                $student->status = 'Student Number Inserted by ' . Auth::user()->id;
                $student->save();

                //return 'now here';

                if ($request->account != null) {
                    StudentAccount::updateOrCreate(['student_id' => $student->id], ['created_at' => Carbon::now()]);
                }
            } else {
                $studentnumber = $this->generateStudentID();
                //                $student = new Student();
                //                $student->person_id = $application->person_id;
                $student->studentnumber = $studentnumber;
                $student->userbarcode = '*' . $studentnumber . '*';
                $student->transdate = date('Y-m-d');
                $student->year = date('Y');
                $student->status = 'Student Number Generated by the System';
                $student->save();
                $this->updateStudentID();

                if ($request->account != null) {
                    StudentAccount::updateOrCreate(['student_id' => $student->id], ['created_at' => Carbon::now()]);
                }
            }
        } else {
            if ($request->studentnumber != null) {
                $student = new Student();
                $student->person_id = $request->person_id;
                $student->studentnumber = $request->studentnumber;
                $student->userbarcode = '*' . $request->studentnumber . '*';
                $student->transdate = date('Y-m-d');
                $student->year = date('Y');
                $student->status = 'Student Number Inserted by ' . Auth::user()->id;
                $student->save();

                if ($request->account != null) {
                    StudentAccount::updateOrCreate(['student_id' => $student->id], ['created_at' => Carbon::now()]);
                }
            } else {
                $studentnumber = $this->generateStudentID();
                $student = new Student();
                $student->person_id = $request->person_id;
                $student->studentnumber = $studentnumber;
                $student->userbarcode = '*' . $studentnumber . '*';
                $student->transdate = date('Y-m-d');
                $student->year = date('Y');
                $student->status = 'Student Number Generated by the System';
                $student->save();
                $this->updateStudentID();
                if ($request->account != null) {
                    StudentAccount::updateOrCreate(['student_id' => $student->id], ['created_at' => Carbon::now()]);
                }
            }
        }

        //        Registration::UpdateOrCreate(['course_id'=>$application->choice1,'student_id'=>$student->id, 'session'=>$application->session],
        //            ['part'=>1,'format'=> ($application->course->level->level_id == 3 ? 'BLOCK' : 'CONVENTIONAL' ),'syllabus_id'=>$application->course->syllabus->last()->id,
        //                'status'=> 'Enrolled','semester'=>1,'regtype_id'=>1,'remarks'=>'New  Enrolment','year'=>$application->appyear,'recordStatus'=>'Current', 'comment'=>'New Enrolment']);

        return redirect()->back()->with('info', 'Student Successfully Enrolled');
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

    public function addMedical(Request $request)
    {
        MedicalAid::updateOrCreate(['name' => $request->name, 'person_id' => $request->person_id], ['expiry_date' => $request->expiry_date]);
        return redirect()->back()->with('info', 'Medical Aid Saved');
    }

    public function deleteMedical(Request $request)
    {
        $m = MedicalAid::findOrFail($request->id);
        $m->delete();
        return redirect()->back()->with('info', 'Medical Aid Deleted');
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
        //return 'Here';
        $person = Person::find($id);
        $nok = $person->nok;

        //        $p = Person::where('nationalid', $request->nationalid)->first();
        //
        //        if ($p != null)
        //        {
        //            return redirect()->back()->with('info', 'Another Person with the Provided NationalID Already Exists');
        //        }

        $person->update($request->all());
        if ($nok != null) {
            $nok->update($request->all());
        }

        return redirect()->back()->with('info', 'Personal Details Updated');
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
