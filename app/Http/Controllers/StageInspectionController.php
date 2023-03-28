<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Allocation;
use App\InspectionStages;
use App\StageInspection;
use App\Receipt;
use Auth;
use Carbon\Carbon;
//use ILLuminate\Support\Facades\Input;

class StageInspectionController extends Controller
{
    public function index()
    {
        //$inspections = StageInspection::all();

        //return view('stageinspections.index',compact('inspections'));
    }


    public function create()
    {
        //$allocation = Allocation::where('status','APPROVED')->get();
        //$stages = InspectionStages::all();
        //return view('stageinspections.create',compact('stages'));
    }

    public function store(Request $request)
    {
        //$stand_id = request('id');
        $receipt = Receipt::where('receipt', $request->receipt)->first();
        $current_date = Carbon::now();
        $ins_date = $request->ins_date;

        
        if ($ins_date > $current_date){
            return redirect()->back()->with('error','Future Date Not Allowed');
            }
        else{
            $insp = new StageInspection();
            $insp->stand_id = $request->stand_id;
            $insp->stage = $request->stage;
            $insp->inspector_name = $request->inspector_name;
            $insp->ins_status = $request->ins_status;
            $insp->receipt_no = $request->receipt;
            $insp->remarks = $request->remarks;
            $insp->contractors = $request->contractors;
            $insp->witness = $request->witness;
            $insp->created_by = Auth::user()->id;

            if ($insp->save()) {
                return redirect()->back()->with('info', 'Stand Inspection saved');
            } else {
                return redirect()->back()->with('error', 'Receipt Invalid');
            }
        }
            
        return redirect()->back();
    }

    public function edit($id)
    {
        $stage_insp = StageInspection::findOrFail($id);
        $stages = InspectionStages::all();

        return view('stageinspections.edit', compact('stage_insp', 'stages'));
    }

    public function update(Request $request, $id)
    {

        $insp = StageInspection::find($id);
        $insp->stage = $request->stage;
        $insp->inspector_name = $request->inspector_name;
        $insp->ins_status = $request->ins_status;
        $insp->remarks = $request->remarks;
        $insp->contractors = $request->contractors;
        $insp->witness = $request->witness;
        //$insp->receipt_no = $request->receipt;
        $insp->ins_date = $request->ins_date;
        $insp->save();
        //$insp->created_by = Auth::user()->id;

        return redirect()->route('showStand', ['id' => $request->stand_id])->with('info', 'Stand Inspection Updated');
    }
}
