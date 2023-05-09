<?php

namespace App\Http\Controllers;

use App\Allocation;
use Illuminate\Http\Request;
use App\Application;
use App\Cession;
use App\Spouse;
use App\StageInspection;
use App\Lease;
use App\Stand;
use App\Company;
use App\DevelopmentStage;
use Barryvdh\DomPDF\Facade as PDF;

class FormController extends Controller
{
    public function printApplication(Request $request)
    {
        $application = Application::find($request->id);
        $spouse = Spouse::where('person_id', $application->applicant->id)->first();
        $company = Company::all()->first();
        $summaryData = array(
            'application' => $application,
            'spouse' => $spouse,
            'company' => $company,
        );
        $pdf = PDF::loadView('forms.application', $summaryData);
        $filename = "Application Form";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function printOfferLetter(Request $request)
    {
        $application = Application::find($request->id);
        $spouse = Spouse::where('person_id', $application->applicant->id)->first();
        $company = Company::all()->first();
        $allocation = Allocation::where('application_id', $application->id)->get()->last();
        $dvpmentstages = DevelopmentStage::all();
        $summaryData = array(
            'application' => $application,
            'spouse' => $spouse,
            'company' => $company,
            'allocation' => $allocation,
            'dvpmentstages' => $dvpmentstages,
        );
        $pdf = PDF::loadView('forms.offerletter', $summaryData);
        $filename = "Offer Letter Form";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function printStageInspection(Request $request)
    {
        $stageinspection = StageInspection::where('stand_id', $request->id)->get();
        $stand = Stand::findOrFail($request->id);
        $company = Company::all()->first();
        $summaryData = array(
            'stageinspection' => $stageinspection,
            'stand' => $stand,
            'company' => $company,
        );
        $pdf = PDF::loadView('forms.stageinspection', $summaryData);
        $filename = "Stage Inspection Form";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function printCession(Request $request)
    {
        $cession = Cession::find($request->id);
        $company = Company::all()->first();
        $summaryData = array(
            'cession' => $cession,
            'company' => $company,
        );
        $pdf = PDF::loadView('forms.cession', $summaryData);
        $filename = "Cession Form";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function printLease(Request $request)
    {
        $lease = Lease::find($request->id);
        $stand = Stand::find($lease->stand_id);
        $allocation = Allocation::where('stand_id', $stand->id)->get()->last();
        $application = Application::find($allocation->application_id);
        $company = Company::all()->first();
        $summaryData = array(
            'lease' => $lease,
            'company' => $company,
            'stand' => $stand, // get allocation
            'application' => $application, // get applicant
        );
        $pdf = PDF::loadView('forms.lease', $summaryData);
        $filename = "Lease Form";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    // cert of completion needed
    public function printCertOfCompletion(Request $request)
    {
        $stand = Stand::find($request->id);
        $company = Company::all()->first();
        $summaryData = array(
            'stand' => $stand,
            'company' => $company,
        );
        $pdf = PDF::loadView('forms.completioncertificate', $summaryData);
        $filename = "Certificate Of Completion Form";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    // cert of occupation required as well
    public function printCertOfOccupation(Request $request)
    {
        $stand = Stand::find($request->id);
        $company = Company::all()->first();
        $summaryData = array(
            'stand' => $stand,
            'company' => $company,
        );
        $pdf = PDF::loadView('forms.occupationcertificate', $summaryData);
        $filename = "Certificate Of Occupation Form";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }
}
