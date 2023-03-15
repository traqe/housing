<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Spouse;
use Barryvdh\DomPDF\Facade as PDF;

class FormController extends Controller
{
    public function printApplication(Request $request)
    {
        $application = Application::find($request->id);
        $spouse = Spouse::where('person_id', $application->applicant->id)->first();
        $summaryData = array(
            'application' => $application,
            'spouse' => $spouse,
        );
        $pdf = PDF::loadView('forms.application', $summaryData);
        $filename = "Application Form";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }
}
