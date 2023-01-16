<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Lease;
use App\LeaseRenewal;

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

    public function store(Request $request, $id)
    {
        // $lease = Lease::findOrFail($id);

        $data = new LeaseRenewal();
        $data->lease_id = $request->lease_id;
        $data->narration = $request->narration;

        if ($files = $request->file('file')) {
            $documentName = time() . '.' . $files->getClientOriginalExtension();
            $request->file->move(public_path('storage/documents'), $documentName);

            $document = $documentName;

            $data->document = $document;
        }

        if ($data->save()) {
            return redirect()->route('lease');
        } else {
            return redirect()->back();
        }
    }
}
