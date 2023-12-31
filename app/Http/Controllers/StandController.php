<?php

namespace App\Http\Controllers;

use App\Batch;
use App\Developer;
use App\StandStatus;
use App\StandType;
use Illuminate\Http\Request;
use App\Stand;
use App\Allocation;
use App\InspectionStages;
use App\StandClass;
use App\Repossession;
use App\DevelopmentStage;
use App\Application;
use App\RepoNotification;
use Illuminate\Support\Facades\Auth;

class StandController extends Controller
{
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
                $stands = Stand::all();
                return view('stands.index', compact('stands'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
                $standTypes = StandType::all();
                $standClasses = StandClass::all();
                $status = DevelopmentStage::all();
                $developers = Developer::all();
                $batches = Batch::where('batch_type_id', '1')->get();
                return view('stands.create', compact('standTypes', 'status', 'developers', 'batches', 'standClasses'));
        }
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
                Stand::create($request->all());
                return redirect()->route('stands')->with('info', 'Stand Successfully Captured');
        }


        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
                $stand = Stand::findOrFail($id);
                $stage_insp = $stand->stageinspection;
                $repossession = Repossession::where('stand_id', $id)->get()->last();
                // error of empty if no offer is on.
                $notification = RepoNotification::where('stand_id', $stand->id)->get()->first();
                $allocation = Allocation::where('status', 'APPROVED')->get();
                $stages = InspectionStages::all();
                //dd($stages);
                //return response()->json(['data'=>$stand]);
                $applications = [];
                //return $stand->allocation->application->applicant;
                return view('stands.show', compact('stand', 'allocation', 'stages', 'stage_insp', 'applications', 'repossession', 'notification'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
                $stand = Stand::findOrFail($id);
                $status = StandStatus::all();
                $standTypes = StandType::all();
                $developers = Developer::all();
                $standClasses = StandClass::all();
                $batches = Batch::where('batch_type_id', '1')->get();
                return view('stands.edit', compact('stand', 'status', 'standTypes', 'batches', 'standClasses', 'developers'));
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
                $stand = Stand::findOrFail($id);
                $stand->update($request->all());
                return redirect()->route('stands')->with('info', 'Stand Successfully Edited');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
                $stand = Stand::findOrFail($id);
                $stand->delete();
                return redirect()->route('stands');
        }

        public function getNotification(Request $request, $id)
        {
                $stand = Stand::findOrFail($id);
                $allocation = Allocation::where('stand_id', $stand->id)->get()->last();
                $application = Application::where('id', $allocation->application_id)->get()->last();
                return view('stands.sendnotification', compact('stand', 'application'));
        }
}
