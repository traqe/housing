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

class MainStagesController extends Controller
{
    public function index()
    {
        $data = CostingStage::all();
        return view('costing.main-stages.index', compact('data'));
    }

    public function create()
    {
        return view('costing.main-stages.create');
    }

    public function store(Request $request)
    {
        $data = new CostingStage();

        $data->name = $request->name;

        if ($data->save()) {
            return redirect()->route('costing-main-stage');
        } else {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data = CostingStage::findOrFail($id);
        return view('costing.main-stages.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = CostingStage::findOrFail($id);

        $data->name = $request->name;

        if ($data->save()) {
            return redirect()->route('costing-main-stage');
        } else {
            return redirect()->back();
        }
    }
}