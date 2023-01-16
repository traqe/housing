<?php

namespace App\Http\Controllers;

use App\Country;
use App\Department;
use App\Role;
use App\Variable;
use Illuminate\Http\Request;
use App\Staff;
use Flash;
use Toast;
use Illuminate\Support\Arr;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genders = array("Male"=>"1", "Female"=>"0");
        $staffs = Staff::where('StatusID', 1)->orderby('LastName')->get();
        $departments = Department::all();
        $status = Variable::where('VarName', 'Staff Status')->get();
        $countries = Country::all();
        $roles = Role::orderby('RoleName', 'Asc')->get();
        return View('staffs.index', compact('status','genders','countries','departments','staffs','roles'));
    }

    public function searchStaff(Request $request)
    {
        $genders = array("Male"=>"1", "Female"=>"0");
        $staffs = Staff::where('StatusID', $request->StatusID)->orderby('LastName')->get();
        $departments = Department::all();
        $status = Variable::where('VarName', 'Staff Status')->get();
        $countries = Country::all();
        $roles = Role::all();
        return View('staffs.index', compact('roles','status','genders','countries','departments','staffs'));
    }

    /**
     * Show the form for creating a new Staff.
     *
     * @return Response
     */
    public function create()
    {
        return view('staffs.create');
    }

    /**
     * Store a newly created Staff in storage.
     *
     * @param CreateStaffRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $staff = Staff::create($input);

        Flash::success('Staff saved successfully.');

        return redirect(route('staffs.index'));
    }

    /**
     * Display the specified Staff.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $staff = Staff::find($id);

        if (empty($staff)) {
            Flash::error('Staff not found');

            return redirect(route('staffs.index'));
        }

        return view('staffs.show')->with('staffs', $staff);
    }



    public function getStaff($id)
    {
        $staff = Staff::find($id);

        if (empty($staff)) {

            return null;
        }

        $roles = '';
        $user = $staff->user;//->roles;

        if ($user != null)
        {
            $roles = $user->roles;
        }

        $rr = '';
        $r = Staff::find($staff->ReportTo);

        if ($r != null)
        {
            $rr = $r->FirstName.' '.$r->LastName;
        }

        $staff->toArray();

        $filtered = Arr::add($staff, 'rr', $rr);

        $filtered = Arr::add($filtered, 'roles', $roles);


        return $filtered;
    }



    /**
     * Show the form for editing the specified Staff.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $staff = Staff::find($id);

        if (empty($staff)) {
            Flash::error('Staff not found');

            return redirect(route('staffs.index'));
        }

        return view('staffs.edit')->with('staffs', $staff);
    }

    /**
     * Update the specified Staff in storage.
     *
     * @param  int              $id
     * @param UpdateStaffRequest $request
     *
     * @return Response
     */
    public function update( Request $request)
    {
        $staff = Staff::find($request->StaffID);
        $sex = ($request->Sex == "Male" ? true : false);
        $f = Arr::except($request->all(), ['Sex']);
        $filtered = Arr::add($f, 'Sex', $sex);

        if ($staff == null) {

            $statusId = 1;
            Staff::create(Arr::add($filtered, 'StatusID', $statusId));
            Toast::success('Staff created successfully.');

            return redirect()->route('staffs');
        }
        $staff->update($filtered);
        Toast::success('Staff updated successfully.');

        return redirect()->route('staffs');
    }

    /**
     * Remove the specified Staff from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);

        if (empty($staff)) {
            Flash::error('Staff not found');

            return redirect(route('staffs.index'));
        }

        $staff->delete($id);

        Flash::success('Staff deleted successfully.');

        return redirect(route('staffs.index'));
    }
}
