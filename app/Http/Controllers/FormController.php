<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Cession;
use App\Spouse;
use App\StageInspection;
use App\Lease;
use App\Stand;
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

    public function printStageInspection(Request $request)
    {
        $stageinspection = StageInspection::find($request->id);
        $summaryData = array(
            'stageinspection' => $stageinspection,
        );
        $pdf = PDF::loadView('forms.stageinspection', $summaryData);
        $filename = "Stage Inspection Form";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function printCession(Request $request)
    {
        $cession = Cession::find($request->id);
        $summaryData = array(
            'cession' => $cession,
        );
        $pdf = PDF::loadView('forms.cessions', $summaryData);
        $filename = "Cession Form";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function printLease(Request $request)
    {
        $lease = Lease::find($request->id);
        $summaryData = array(
            'lease' => $lease,
        );
        $pdf = PDF::loadView('forms.leases', $summaryData);
        $filename = "Cession Form";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    // cert of completion needed
    public function printCertOfCompletion(Request $request)
    {
        $stand = Stand::find($request->id);
        $summaryData = array(
            'stand' => $stand,
        );
        $pdf = PDF::loadView('forms.completioncertificate', $summaryData);
        $filename = "Certificate Of Completion Form";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    // cert of occupation required as well
    public function printCertOfOccupation(Request $request)
    {
        $stand = Stand::find($request->id);
        $summaryData = array(
            'stand' => $stand,
        );
        $pdf = PDF::loadView('forms.occupationcertificate', $summaryData);
        $filename = "Certificate Of Completion Form";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }
}
