<?php

namespace App\Http\Controllers\Costing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CostingProject;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Auth;
use Illuminate\Http\JsonResponse;
use App\CostingProjectStand;

class ProjectController extends Controller
{
    public function index()
    {
        $data = CostingProject::all();
        return view('costing.project.index', compact('data'));
    }

    public function create()
    {
        return view('costing.project.create');
    }

    public function store(Request $request)
    {
        $data = new CostingProject();

        $data->project_name = $request->project_name;
        $data->project_number = $request->project_number;
        $data->site_number = $request->site_number;
        $data->site_location = $request->site_location;
        $data->project_description = $request->project_description;
        $data->start_date = $request->start_date;
        $data->project_manager = $request->project_manager;
        $data->created_by = Auth::user()->id;

        if ($data->save()) {
            return redirect()->route('costing-project');
        } else {
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $data = CostingProject::findOrFail($id);
        $stands = CostingProjectStand::where('project_id', $id)->get();
        return view('costing.project.show', compact('data', 'stands'));
    }

    public function edit($id)
    {
        $data = CostingProject::findOrFail($id);
        return view('costing.project.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->start_date);
        $data = CostingProject::findorFail($id);

        $data->project_name = $request->project_name;
        $data->project_number = $request->project_number;
        $data->site_number = $request->site_number;
        $data->site_location = $request->site_location;
        $data->project_description = $request->project_description;
        $data->start_date = $request->start_date;
        $data->project_manager = $request->project_manager;
        $data->created_by = Auth::user()->id;

        if ($data->save()) {
            return redirect()->route('costing-project');
        } else {
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $data = CostingProject::findOrFail($id);

        if ($data->delete()) {
            return new JsonResponse(["status" => true]);
        } else {
            return new JsonResponse(["status" => false]);
        }
    }
}