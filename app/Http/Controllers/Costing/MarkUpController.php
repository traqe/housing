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
use Illuminate\Support\Facades\Auth as FacadesAuth;

class MarkUpController extends Controller
{
    public function store(Request $request)
    {
        $data = CostingProjectMarkup::where('cost_for_project_id', '=', $request->cost_id)->first();
        if ($data == null) {
            $data = new CostingProjectMarkup();
            $data->cost_for_project_id = $request->cost_id;
        }
        $data->mark_up = $request->mark_up;
        $data->created_by = Auth::user()->id;

        if ($data->save()) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}