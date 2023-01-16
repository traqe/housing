<?php

namespace App\Http\Controllers\Costing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CostingProject;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Auth;
use Illuminate\Http\JsonResponse;
use App\StandType;
use App\CostingProjectStand;
use App\CostingStage;
use App\CostForProject;
use App\CostingProjectMarkup;

class StandsController extends Controller
{
    public function create($id)
    {
        $projectId = $id;
        $standTypes = StandType::all();
        return view('costing.stand.create', compact('projectId', 'standTypes'));
    }

    public function store(Request $request)
    {
        /*
        *
        * (Number_of_Units * Size of Stand) should never exceed the Area available
        *
        */

        if (($request->number_of_units * $request->size) <= $request->area_available) {
            $data = new CostingProjectStand();
            $data->stand_type_id = $request->stand_type;
            $data->project_id = $request->project_id;
            $data->area_available = $request->area_available;
            $data->number_of_units = $request->number_of_units;
            $data->size = $request->size;
            $data->created_by = Auth::user()->id;

            if ($data->save()) {
                return redirect()->route('get-costing-project', $request->project_id);
            } else {
                return redirect()->back();
            }
        }

        return redirect()->back();
    }

    public function show($id)
    {
        $data = CostingProjectStand::findOrFail($id);
        $stages = CostingStage::all();
        $costs = CostForProject::where('costing_project_stand_id', '=', $id)->get();
        $costId = CostForProject::where('costing_project_stand_id', '=', $id)->first();
        if ($costId != null) {
            $costId = $costId->id;
        }

        // dd($costID);
        $totalCosts = 0;

        $markUp = '0';

        $getMarkUp = CostingProjectMarkup::where('cost_for_project_id', '=', $costId)->first();
        if ($getMarkUp != null) {
            $markUp = $getMarkUp->mark_up;
        }

        foreach ($costs as $cost) {
            $totalCosts += $cost->cost;
        }

        $totalCosts += ($totalCosts * ($markUp / 100));

        $costPerM2 = $totalCosts / ($data->number_of_units * $data->size);

        return view('costing.stand.show', compact('data', 'stages', 'costs', 'totalCosts', 'costId', 'markUp', 'costPerM2'));
    }

    public function edit($id)
    {
        $data = CostingProjectStand::findOrFail($id);
        $standTypes = StandType::all();
        return view('costing.stand.edit', compact('data', 'standTypes'));
    }

    public  function update(Request $request, $id)
    {
        // dd($request->project_id);
        $data = CostingProjectStand::findOrFail($id);
        $data->stand_type_id = $request->stand_type;
        $data->area_available = $request->area_available;
        $data->number_of_units = $request->number_of_units;
        $data->size = $request->size;

        if ($data->save()) {
            return redirect()->route('get-costing-project', $request->project_id);
        } else {
            return redirect()->back();
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $data = CostingProjectStand::findOrFail($id);

        if ($data->delete()) {
            return new JsonResponse(["status" => true]);
        } else {
            return new JsonResponse(["status" => false]);
        }
    }
}