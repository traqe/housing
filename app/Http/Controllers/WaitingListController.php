<?php

namespace App\Http\Controllers;

use App\Application;
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

        return redirect()->route('waitinglist')->with('info', 'Application Successfully Renewed');
    }
}
