<?php

namespace App\Http\Controllers;

use App\Application;
use App\ApplicationRenewal;
use Illuminate\Http\Request;

class WaitingListController extends Controller
{
    public function index()
    {
        $applications = Application::where('application_stage_id', '1')->get();
        //dd($applications);
        return view('waitinglist.index', compact('applications'));
    }

    public function update(Request $request)
    {
        $id = $request->get('app_id');
        $application = Application::findOrFail($id);
        $application->update([
            'expiry_date' => $request->get('expiry_date'),
            'receipt_no' => $request->get('receipt'),
            'updated_by' => $request->get('updated_by')
        ]);
        $applicationrenewal = new ApplicationRenewal();
        $applicationrenewal->application_id = $request->get('app_id');
        $applicationrenewal->receipt_no = $request->get('receipt_no');
        $applicationrenewal->expires_on = $request->get('expiry_date');
        $applicationrenewal->created_by = $request->get('updated_by');
        $applicationrenewal->save();
        return redirect()->route('waitinglist')->with('info', 'Application Successfully Renewed');
    }

    public function show(Request $request, $id)
    {
        $id = $request->id;
        $app_renewals = ApplicationRenewal::where('application_id', $id)->get();
        return view('waitinglist.show', compact('app_renewals'));
    }
}
