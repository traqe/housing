<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Lease;
use App\LeaseRenewal;
use App\Stand;
use Illuminate\Http\JsonResponse;
use App\Document;
use App\LeaseDecision;

class LeasesController extends Controller
{
    public function index()
    {
        $leases = Lease::all();

        return view('leases.index', compact('leases'));
    }

    public function renewLease($id)
    {
        $leaseId = $id;
        dd($leaseId);
        return view('leases.renewal', compact('leaseId'));
    }

    public function store(Request $request)
    {
        $standId = Stand::where('stand_no', $request->search)->pluck('id');
        // dd($standId[0]);
        $data = new Lease();

        $data->stand_id = $standId[0];
        $data->lease_no = $request->lease_number;
        $data->date_applied = $request->date_applied;
        $data->expiry_date = $request->expiry_date;
        $data->entered_by = Auth::user()->id;
        $data->lease_status = 'PENDING';

        if ($data->save()) {

            if ($files = $request->file('file')) {
                $dataD = new Document();

                $documentName = time() . '.' . $files->getClientOriginalExtension();
                $request->file->move(public_path('storage/documents/leases'), $documentName);

                $document = $documentName;

                $dataD->model = 'App\Lease';
                $dataD->model_id = $data->id;
                $dataD->document_name = $document;

                $dataD->save();
            }
            return redirect()->route('lease')->with('message', 'Lease created successfully!');
        } else {
            return redirect()->back()->with('error', 'Problem creating lease!');
        }
    }

    public function create()
    {
        return view('leases.create');
    }

    public function searchStands(Request $request)
    {
        $search = $request->get('term');

        $result = Stand::select('stand_no')
            ->where('stand_no', 'like', "%{$search}%")
            ->pluck('stand_no');
        return new JsonResponse($result);
    }

    public function destroy($id)
    {

        $data = Lease::findOrFail($id);

        $dataD = Document::where([
            ['model_id', '=', $id],
            ['model', '=', 'App\Lease']
        ])->first();

        if ($dataD != null) {

            $path = public_path() . '/storage/documents/leases/';
            $file_old = $path . $dataD->document_name;
            unlink($file_old);

            $dataD->delete();
        }

        if ($data->delete()) {
            return new JsonResponse(["status" => true]);
        } else {
            return new JsonResponse(["status" => false]);
        }
    }

    public function edit($id)
    {
        $data = Lease::findOrFail($id);
        $stand = Stand::where('id', '=', $data->stand_id)->first();
        return view('leases.edit', compact('data', 'stand'));
    }

    public function update(Request $request, $id)
    {
        $data = Lease::findOrFail($id);
        $stand = Stand::where('id', '=', $data->stand_id)->first();

        $data->lease_no = $request->lease_number;
        $data->stand_id = $stand->id;
        $data->date_applied = $request->date_applied;
        $data->expiry_date = $request->expiry_date;


        if ($request->file != null) {

            $dataD = Document::where([
                ['model_id', '=', $data->id],
                ['model', '=', 'App\Lease']
            ])->first();

            if ($dataD) {
                $path = public_path() . '/storage/documents/leases/';
                $file_old = $path . $dataD->document_name;
                unlink($file_old);

                $files = $request->file('file');

                $documentName = time() . '.' . $files->getClientOriginalExtension();
                $request->file->move(public_path('storage/documents/leases'), $documentName);

                $document = $documentName;

                $dataD->document_name = $document;

                $dataD->save();
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

        if ($data->save()) {
            return redirect()->route('lease')->with('message', 'Lease updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Problem updating Lease!');
        }
    }

    public function show($id)
    {
        $data = Lease::findOrFail($id);
        $stand = Stand::where('id', '=', $data->stand_id)->first();
        $document = Document::where([
            ['model', 'App\Lease'],
            ['model_id', '=', $data->id]
        ])->first();

        return view('leases.show', compact('data', 'stand', 'document'));
    }

    public function statusDecision(Request $request)
    {

        /*
        *    1 - approval, 2 - rejection, 3 - renewal, 4 - termination
        */

        $data = Lease::where('id', '=', $request->lease_id)->first();

        if ($request->decision == "1") {

            $data->lease_status = "ACTIVE";
            $data->approval_status = "APPROVED";

            if ($data->save()) {
                $dataL = new LeaseDecision();

                $dataL->lease_id = $request->lease_id;
                $dataL->receipt_number = $request->receipt_number;
                $dataL->amount = $request->amount;
                $dataL->operation_type = "APPROVAL";
                $dataL->reason = $request->reason;
                $dataL->created_by = Auth::user()->id;

                $dataL->save();
                return redirect()->back()->with('message', 'Lease updated successfully!');
            } else {
                return redirect()->back()->with('error', 'Problem updating Lease!');
            }
        }

        if ($request->decision == "2") {
            $data->lease_status = "PENDING";
            $data->approval_status = "REJECTED";

            if ($data->save()) {
                $dataL = new LeaseDecision();

                $dataL->lease_id = $request->lease_id;
                $dataL->operation_type = "REJECTION";
                $dataL->reason = $request->reason;
                $dataL->created_by = Auth::user()->id;

                $dataL->save();
                return redirect()->back()->with('message', 'Lease updated successfully!');
            } else {
                return redirect()->back()->with('error', 'Problem updating Lease!');
            }
        }

        if ($request->decision == "3") {
            $data->lease_status = "ACTIVE";
            $data->approval_status = "RENEWED";

            if ($data->save()) {
                $dataL = new LeaseDecision();

                $dataL->lease_id = $request->lease_id;
                $dataL->receipt_number = $request->receipt_number;
                $dataL->amount = $request->amount;
                $dataL->operation_type = "RENEWAL";
                $dataL->reason = $request->reason;
                $dataL->created_by = Auth::user()->id;

                $dataL->save();
                return redirect()->back()->with('message', 'Lease updated successfully!');
            } else {
                return redirect()->back()->with('error', 'Problem updating Lease!');
            }
        }

        if ($request->decision == "4") {
            $data->lease_status = "EXPIRED";
            $data->approval_status = "TERMINATED";

            if ($data->save()) {
                $dataL = new LeaseDecision();

                $dataL->lease_id = $request->lease_id;
                $dataL->operation_type = "TERMINATION";
                $dataL->reason = $request->reason;
                $dataL->created_by = Auth::user()->id;

                $dataL->save();
                return redirect()->back()->with('message', 'Lease updated successfully!');
            } else {
                return redirect()->back()->with('error', 'Problem updating Lease!');
            }
        }
    }
}
