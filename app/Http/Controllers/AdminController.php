<?php

namespace App\Http\Controllers;

use App\CurrentSession;
use App\Role;
use App\Staff;
use App\User;
use App\user_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Toast;

class AdminController extends Controller
{

    public function getSession()
    {
        $session = CurrentSession::all();
        return View('session.index', compact('session'));
    }

    public function editSession($id)
    {
        $session = CurrentSession::findOrFail($id);
        return View('session.edit', compact('session'));
    }

    public function updateSession(Request $request, $id)
    {
        $session = CurrentSession::findOrFail($id);
        $session->update($request->all());
        return redirect()->route('session')->with('info', 'Active Session Successfully Updated');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '>', 0)->get();
        return View('admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderby('role')->get();
       // $staffs = Staff::where('StatusID',1)->get();
        return View('admin.create', compact('roles'));
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
//        Validator::make($request->all(), [
////            'name'     => 'required|string|max:255',
//            'email'    => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:6|confirmed',
//            'staff_id' => 'required|unique:users',
//        ])->validate();

//        $staff = Staff::find($request->staff_id);
//        if ($staff==null)
//        {
//            Toast::success('Please Select an Employee');
//            return redirect()->back();
//        }

        $user = new User();
//        $user->staff_id = $request->staff_id;
        $user->name = $request->name;
        //$user->menuroles = 'user';
        $user->email = $request->email;
        $user->nationalid = $request->nationalid;
        $user->password = bcrypt($request->password);
        $user->save();

        foreach ($request->role_ids as $role_id)
        {
            user_role::UpdateOrCreate(['role_id'=>$role_id,'user_id'=>$user->id]);
        }

        return redirect()->route('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return View('admin.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        //return $user->staff;

        $roles = Role::orderby('role')->get();
        //$staffs = Staff::all();
        //return $staffs;
        return View('admin.edit', compact('user','roles'));
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
        //return $request;
        Validator::make($request->all(), [
            'email'    => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ])->validate();

//        $staff = Staff::find($request->staff_id);
//
//        if ($staff==null)
//        {
//            Toast::success('Please Select an Employee');
//            return redirect()->back();
//        }

        $user = User::findOrFail($id);
        $user->nationalid = $request->nationalid;
        $user->name = $request->name;
        //$user->menuroles = 'user';
        $user->email = $request->email;
        //$user->nationalid = $request->nationalid;
        $user->password = bcrypt($request->password);
        $user->save();

        user_role::where('user_id', $user->id)->delete();

        foreach ($request->role_ids as $role_id)
        {
            user_role::UpdateOrCreate(['role_id'=>$role_id,'user_id'=>$user->id]);
        }

        return redirect()->route('admin');
    }

    public function updateRoles(Request $request)
    {
        $staff = Staff::find($request->staff_id);

        if ($staff == null)
        {
            Toast::success('Please Select an Employee');
            return redirect()->back();
        }

        if ($staff->StatusID != 1)
        {
            Toast::success('Cannot Create an Account For a Non-Active Employee');
            return redirect()->back();
        }

        //return $request;
        //return $staff;
        //return 'here';

        $user = User::where('staff_id', $request->staff_id)->first();

        if ($user != null)
        {
            $user->name = $staff->LastName.' '.$staff->FirstName;
            $user->staff_id = $request->staff_id;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
        }
        else
        {
            $user = new User();
            $user->name = $staff->LastName.' '.$staff->FirstName;
            $user->staff_id = $request->staff_id;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            //$user->menuroles = 'user';
            $user->save();
        }

       // return $user;

        user_role::where('user_id', $user->id)->delete();

        foreach ($request->role_ids as $role_id)
        {
            $user_role = user_role::UpdateOrCreate(['role_id'=>$role_id,'user_id'=>$user->id]);
        }

        //return $user->roles;
        return redirect()->back();
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $user_role = user_role::where('user_id',$id)->delete();
        return redirect()->route('admin');
    }

    public function removeUserRole($id, $role)
    {

    }

    public function updateStatus($user_id,$status_code){
        try{
            $update_user = User::whereId($user_id)->update([
                'status' => $status_code
            ]);
            if($update_user){
                return redirect()->route('admin.index')->with('success','User status Updated Successfully');
            }
            return redirect()->route('admin.index')->with('error','Failed to update user status ');
        } catch(\Throwable $th){
            throw $th;
        }
    }

}
