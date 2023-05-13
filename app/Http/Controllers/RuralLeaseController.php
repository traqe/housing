<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\RuralLease;
use App\RuralLeaseDecision;
use Illuminate\Support\Facades\Auth;
use App\RuralDocument;
use App\Ward;
use App\BusinessCentre;

class RuralLeaseController extends Controller
{
    public function index()
    {
        $ruralleases = RuralLease::all();
        $applicants = Person::all()->sortby('surname');
        $wards = Ward::all();
        $buscentre = BusinessCentre::all();
        return view('rurallease.index', compact('ruralleases', 'applicants','wards','buscentre'));
    }

    public function store(Request $request)
    {
        $rurallease = new RuralLease();
        $rurallease->person_id = $request->person_id;
        $rurallease->lease_no = $request->lease_no;
        $rurallease->date_applied = $request->date_applied;
        $rurallease->expiry_date = $request->expiry_date;
        $rurallease->ward = $request->ward;
        $rurallease->centre = $request->centre;
        $rurallease->type = $request->type;
        $rurallease->stand_purpose = $request->stand_purpose;
        $rurallease->created_by =  $request->created_by;
        $rurallease->lease_status = 'PENDING';

        if ($rurallease->save()) {

            if ($files = $request->file('file')) {
                $ruralleaseD = new RuralDocument();

                $documentName = time() . '.' . $files->getClientOriginalExtension();
                $request->file->move(public_path('storage/documents/leases'), $documentName);

                $document = $documentName;

                $ruralleaseD->model = 'App\RuralLease';
                $ruralleaseD->model_id = $rurallease->id;
                $ruralleaseD->document_name = $document;

                $ruralleaseD->save();
            }
            return redirect()->route('rurallease.index')->with('active', 'Lease created successfully!');
        } else {
            return redirect()->back()->with('active', 'Problem creating lease!');
        }
    }

    public function show(Request $request, $id)
    {
        $rurallease = RuralLease::findOrFail($id);
        $document = RuralDocument::where([
            ['model', 'App\RuralLease'],
            ['model_id', '=', $rurallease->id]
        ])->first();
        return view('rurallease.show', compact('rurallease', 'document'));
    }

    public function edit($id)
    {
        $rurallease = RuralLease::findOrFail($id);
        $applicants = Person::all();
        return view('rurallease.edit', compact('rurallease', 'applicants'));
    }

    public function update(Request $request, $id)
    {
        $rurallease = RuralLease::findOrFail($id);
        $rurallease->person_id = $request->person_id;
        $rurallease->lease_no = $request->lease_no;
        $rurallease->area = $request->area;
        $rurallease->stand_purpose = $request->stand_purpose;
        $rurallease->date_applied = $request->date_applied;
        $rurallease->expiry_date = $request->expiry_date;

        if ($request->file != null) {

            $ruralleaseD = RuralDocument::where([
                ['model_id', '=', $rurallease->id],
                ['model', '=', 'App\RuralLease']
            ])->first();

            if ($ruralleaseD) {
                $path = public_path() . '/storage/documents/leases/';
                $file_old = $path . $ruralleaseD->document_name;
                unlink($file_old);

                $files = $request->file('file');

                $documentName = time() . '.' . $files->getClientOriginalExtension();
                $request->file->move(public_path('storage/documents/leases'), $documentName);

                $document = $documentName;

                $ruralleaseD->document_name = $document;

                $ruralleaseD->save();
            }

            /* works for one with auto-lease
            else {
                $dataD = new Document();
                $files = $request->file('file');
                $documentName = time() . '.' . $files->getClientOriginalExtension();
                $request->file->move(public_path('storage/documents/leases'), $documentName);

                $document = $documentName;

                $dataD->model = 'App\Lease';
                $dataD->model_id = $data->id;
                $dataD->document_name = $document;

                $dataD->save();
            }*/
        }

        if ($rurallease->save()) {
            return redirect()->route('rurallease.index')->with('alert', 'Lease updated successfully!');
        } else {
            return redirect()->back()->with('alert', 'Problem updating Lease!');
        }
    }

    public function destroy($id)
    {
        $rurallease = RuralLease::find($id);
        $rurallease->delete();
        return redirect()->route('rurallease.index')->with('alert', 'Lease deleted successfully');
    }

    public function statusDecision(Request $request)
    {

        /*
        *    1 - approval, 2 - rejection, 3 - renewal, 4 - termination
        */

        $rurallease = RuralLease::where('id', '=', $request->lease_id)->first();

        if ($request->decision == "1") {

            $rurallease->lease_status = "ACTIVE";
            $rurallease->approval_status = "APPROVED";

            if ($rurallease->save()) {
                $ruralleaseL = new RuralLeaseDecision();

                $ruralleaseL->lease_id = $request->lease_id;
                $ruralleaseL->receipt_number = $request->receipt_number;
                $ruralleaseL->amount = $request->amount;
                $ruralleaseL->operation_type = "APPROVAL";
                $ruralleaseL->reason = $request->reason;
                $ruralleaseL->created_by = Auth::user()->id;

                $ruralleaseL->save();
                return redirect()->back()->with('alert', 'Rural Lease updated successfully!');
            } else {
                return redirect()->back()->with('alert', 'Problem updating Rural Lease!');
            }
        }

        if ($request->decision == "2") {
            $rurallease->lease_status = "PENDING";
            $rurallease->approval_status = "REJECTED";

            if ($rurallease->save()) {
                $ruralleaseL = new RuralLeaseDecision();

                $ruralleaseL->lease_id = $request->lease_id;
                $ruralleaseL->operation_type = "REJECTION";
                $ruralleaseL->reason = $request->reason;
                $ruralleaseL->created_by = Auth::user()->id;

                $ruralleaseL->save();
                return redirect()->back()->with('alert', 'Rural Lease updated successfully!');
            } else {
                return redirect()->back()->with('alert', 'Problem updating Rural Lease!');
            }
        }

        if ($request->decision == "3") {
            $rurallease->lease_status = "ACTIVE";
            $rurallease->approval_status = "RENEWED";

            if ($rurallease->save()) {
                $ruralleaseL = new RuralLeaseDecision();

                $ruralleaseL->lease_id = $request->lease_id;
                $ruralleaseL->receipt_number = $request->receipt_number;
                $ruralleaseL->amount = $request->amount;
                $ruralleaseL->operation_type = "RENEWAL";
                $ruralleaseL->reason = $request->reason;
                $ruralleaseL->created_by = Auth::user()->id;

                $ruralleaseL->save();
                return redirect()->back()->with('alert', 'Rural Lease updated successfully!');
            } else {
                return redirect()->back()->with('alert', 'Problem updating Rural Lease!');
            }
        }

        if ($request->decision == "4") {
            $rurallease->lease_status = "EXPIRED";
            $rurallease->approval_status = "TERMINATED";

            if ($rurallease->save()) {
                $ruralleaseL = new RuralLeaseDecision();

                $ruralleaseL->lease_id = $request->lease_id;
                $ruralleaseL->operation_type = "TERMINATION";
                $ruralleaseL->reason = $request->reason;
                $ruralleaseL->created_by = Auth::user()->id;

                $ruralleaseL->save();
                return redirect()->back()->with('alert', 'Rural Lease updated successfully!');
            } else {
                return redirect()->back()->with('alert', 'Problem updating Rural Lease!');
            }
        }
    }
}
