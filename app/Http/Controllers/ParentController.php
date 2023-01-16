<?php

namespace App\Http\Controllers;

use App\Country;
use App\DataTables\StudentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Language;
use App\Parents;

use App\Repositories\StudentRepository;
use App\Student;
use App\Variable;
use Toast;
use App\StudTerm;
use App\Subject;
use App\Work;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\DB;

class ParentController extends AppBaseController
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
        $countries = Country::all();
        $languages = Language::all();
        $professions = Work::all();
        $parents = Parents::where('StatusID', 1)->orderby('MotherLName','asc')->get();
        $status = Variable::where('VarName', 'Parent Status')->get();

        return View('parents.index', compact('status','parents','countries','languages','professions'));
    }

    public function searchParent(Request $request)
    {
        $countries = Country::all();
        $languages = Language::all();
        $professions = Work::all();
        $parents = Parents::where('StatusID', $request->StatusID)->orderby('MotherLName','asc')->get();
        $status = Variable::where('VarName', 'Parent Status')->get();

        $st = $request->StatusID;
        return View('parents.index', compact('st','status','parents','countries','languages','professions'));
//        return View('parents.index', compact('st','status','parents','countries','students'));
    }

    public function getParent($id)
    {
        $staff = Parents::find($id);

        if (empty($staff)) {

            return null;
        }
        return $staff;
    }

    public function getChildren($id)
    {
       $students = Student::where('ParentID', $id)->get();
        $s = array();
        foreach ($students as $st)
            {
                array_push($s,$st->getLastRegRecord() );
            }
        return $s;
    }

    /**
     * Show the form for creating a new Student.
     *
     * @return Response
     */
    public function create()
    {
        return view('students');
    }

    /**
     * Store a newly created Student in storage.
     *
     * @param CreateStudentRequest $request
     *
     * @return Response
     */
    public function store(CreateStudentRequest $request)
    {
        $input = $request->all();

        $student = $this->studentRepository->create($input);

        Flash::success('Student saved successfully.');

        return redirect(route('students'));
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
        $parent = null;
        if ($request->ParentID != null)
        {
            $parent = Parents::where('ParentID', $request->ParentID)->first();
        }
//        else
//        {
//            $parent = Parents::where('MotherID', $request->MotherID)->first();
//        }

        //return $parent;

        if ($parent != null) {
            $parent->update($request->all());
            Toast::success('Parent updated successfully.');
            //return 'in';

            return redirect(route('parents'));
        }

        Parents::create($request->all());

        Toast::success('Parent Created successfully.');
        //return 'here';

        return redirect(route('parents'));
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

        return redirect(route('students'));
    }
}
