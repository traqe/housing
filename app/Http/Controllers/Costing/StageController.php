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

class StageController extends Controller
{
    public function create($id)
    {
        $standId = $id;
        $stages = CostingStage::all();
        return view('costing.stage.create', compact('standId', 'stages'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $data = new CostForProject();

        $data->costing_project_stand_id = $request->stand_id;
        $data->stage_id = $request->stage_id;
        $data->name = $request->name;
        $data->cost = $request->cost;
        $data->description = $request->description;
        $data->date = $request->date;
        $data->created_by = Auth::user()->id;

        if ($files = $request->file('file')) {
            $documentName = time() . '.' . $files->getClientOriginalExtension();
            $request->file->move(public_path('storage/documents'), $documentName);

            $document = $documentName;

            $data->document = $document;
        }

        if ($data->save()) {
            return redirect()->route('get-costing-project-stand', $request->stand_id);
        } else {
            return redirect()->back();
        }
    }

    public function show($id)
    {
        // dd($id);
        $data = CostForProject::findOrFail($id);
        return view('costing.stage.show', compact('data'));
    }

    public function edit($id)
    {
        // dd($id);
        $standId = $id;
        $stages = CostingStage::findOrFail($id);
        return view('costing.stage.edit', compact('standId', 'stages'));
    }

    public function destroy($id)
    {
        $data = CostForProject::findOrFail($id);

        if ($data->delete()) {
            return new JsonResponse(["status" => true]);
        } else {
            return new JsonResponse(["status" => false]);
        }
    }
}