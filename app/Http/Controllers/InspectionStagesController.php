<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InspectionStages;

class InspectionStagesController extends Controller
{
    public function index()
    {
        $stages = InspectionStages::all();

        return view('inspectionstages.index', compact('stages'));
    }

    public function create()
    {

        return view('inspectionstages.create');
    }

    public function store(Request $request)
    {
        InspectionStages::create($request->all());
        return redirect()->route('inspectionstages')->with('info', 'Data Captured Successfully');
    }
    public function show($id)
    {

        //
    }

    public function edit($id)
    {
        $stages = InspectionStages::findOrFail($id);

        return view('inspectionstages.edit', compact('stages'));
    }

    public function update(Request $request, $id)
    {
        $stages = InspectionStages::findOrFail($id);
        $stages->update($request->all());

        return redirect()->route('inspectionstages')->with('Data Updated Successfully');
    }

    public function destroy()
    {
        //
    }
}
