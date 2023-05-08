<?php

namespace App\Http\Controllers;

use App\Allocation;
use App\Application;
use App\Stand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use App\Cession;
use App\Lease;

class AllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $application = Application::find($request->application_id);
        if ($application->allocations->count() > 0) {
            return redirect()->back()->with('info', 'This application already has been allocated a stand');
        }

        Allocation::create($request->all());
        $stand = Stand::find($request->stand_id);
        $stand->status = 'ALLOCATED';
        $stand->save();

        /* commented out because tsholotsho does'nt need it.
        if ($stand->status == "ALLOCATED") {
            // creating a new lease when stand has been "allocated"
            $lease = new Lease();
            $lease->lease_no = "LM/2023";
            $lease->date_applied = Carbon::today();
            $lease->expiry_date = Carbon::today()->addDays(546);
            $lease->entered_by = Auth::user()->id;
            $lease->lease_status = "PENDING";
            $lease->stand_id = $stand->id;
            $lease->save();
        }
        */


        $application->application_stage_id = 4;
        $application->save();

        return redirect()->back()->with('info', 'Allocation Successful');
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
    public function update(Request $request)
    {
        if ($request->id == null) {
            return redirect()->back()->with('info', 'Please Select at least one Application');
        }
        Allocation::whereIn('id', $request->id)->update(['status' => $request->status, 'authorised_by' => Auth::user()->id, 'updated_at' => Carbon::now()]);

        $allocations = Allocation::whereIn('id', $request->id)->get();
        //return $allocations;

        $status = ($request->status == 'APPROVED' ? '3' : '2');

        //make stand available if declined
        //return $status;

        foreach ($allocations as $allocation) {
            //return $allocation;
            $allocation->application->update(['application_stage_id' => $status]);
        }
        return redirect()->back()->with('info', 'Approval Decision Captured');
    }

    public function updateCession(Request $request)
    {
        if ($request->id == null) {
            return redirect()->back()->with('info', 'Please Select at least one Application');
        }
        $cessions = Cession::whereIn('id', $request->id)->get();

        // $allocations = Allocation::whereIn('stand_id', $request->id)->get();
        //return $allocations;

        $status = ($request->status == 'APPROVED' ? '3' : '2');

        //make stand available if declined
        //return $status;

        foreach ($cessions as $cession) {
            if ($status == 3) {
                $cession->update(['status' => 'APPROVED']);
                //return $cession->stand->allocations;
                //return $cession;
                Allocation::where('stand_id', $cession->stand_id)->update(['current_status' => 'OLD', 'updated_at' => Carbon::now(), 'status' => 'CESSIONED']);
                //Application::where('stand_id', $cession->stand_id)->update(['application_stage_id'=>5]);
                //return 'here';
                //$cession->stand->allocations->update(['current_status'=>'OLD',  'updated_at'=>Carbon::now()]);
                //$allocation->application->update(['current_status'=>'OLD',  'updated_at'=>Carbon::now()]);
                Allocation::updateOrCreate(['stand_id' => $cession->stand_id,   'application_id' => $cession->id, 'application_type' => "App\Cession"], ['status' => 'APPROVED', 'current_status' => 'CURRENT', 'created_by' => Auth::user()->id, 'authorised_by' => Auth::user()->id]);
            } else {
                $cession->update(['status' => 'DECLINED']);
            }
        }
        return redirect()->back()->with('info', 'Approval Decision Captured');
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
