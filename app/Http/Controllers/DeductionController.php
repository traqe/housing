<?php

namespace App\Http\Controllers;

use App\Report;
use App\Ssb;
use App\Transaction;
use Illuminate\Http\Request;
use App\Imports\BulkImport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use Illuminate\Support\Facades\DB;

class DeductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ssbs = Ssb::all();
        $filtered = Ssb::whereHas('client')->get();
        return view('deductions.index', compact('ssbs', 'filtered'));
    }

    public function import()
    {
        Excel::import(new BulkImport, request()->file('file'));
        return back();
    }

    function processSsbs()
    {
        $filtered = Ssb::whereHas('client')->get();
        if ($filtered->count() < 1) {
            return redirect()->back()->with('info', 'There are not records for your branch');
        }
        DB::beginTransaction();
        foreach ($filtered as $payment) {
            $clientId = $payment->EmployeeId;
            $amount = $payment->Amount;

            $loan = $payment->client->loan->where('rollover_status_id', 1)->where('loan_balance', '>', 0)->first();
            if ($loan != null) {
                $loan->loan_balance = $loan->loan_balance - $amount;
                $loan->updated_at = date('Y-m-d H:i:s');
                $loan->save();
                Transaction::create(['user_id', Auth::user()->id, 'created_at' => date('Y-m-d H:i:s'), 'transaction_type_id' => 4, 'Amount' => $amount, 'loan_id' => $loan->id, 'balance' => $loan->loan_balance, 'description' => 'SSB Deductions']);
                Report::create(['updated_at' => date('Y-m-d H:i:s'), 'created_at' => date('Y-m-d H:i:s'), 'Amount' => $amount, 'userid' => Auth::user()->id, 'transactionType' => 'ssb payments', 'balance' => $loan->loan_balance, 'description' => $clientId]);
            }
        }
        Ssb::truncate();
        DB::commit();

    }

    public function processSSB($id)
    {
        if ($id == 1) {
            $this->processSsbs();
            return redirect()->back()->with('info', 'SSB deductions processed');
        } else {
            $this->processPENSIONS();
            return redirect()->back()->with('info', 'Pension deductions processed');
        }

    }

    function processPENSIONS()
    {
        $filtered = Ssb::whereHas('client')->get();
        if ($filtered->count() < 1) {
            return redirect()->back()->with('info', 'There are not records for your branch');
        }
        DB::beginTransaction();
        foreach ($filtered as $payment) {
            $clientId = $payment->EmployeeId;
            $amount = $payment->Amount;

            $loan = $payment->client->loan->where('rollover_status_id', 1)->where('loan_balance', '>', 0)->first();
            if ($loan != null) {
                $loan->loan_balance = $loan->loan_balance - $amount;
                $loan->updated_at = date('Y-m-d H:i:s');
                $loan->save();
                Transaction::create(['user_id', Auth::user()->id, 'created_at' => date('Y-m-d H:i:s'), 'transaction_type_id' => 14, 'Amount' => $amount, 'loan_id' => $loan->id, 'balance' => $loan->loan_balance, 'description' => 'pensions payments']);
                Report::create(['updated_at' => date('Y-m-d H:i:s'), 'created_at' => date('Y-m-d H:i:s'), 'Amount' => $amount, 'userid' => Auth::user()->id, 'transactionType' => 'pensions payments', 'balance' => $loan->loan_balance, 'description' => $clientId]);
            }
        }
        Ssb::truncate();
        DB::commit();
    }


    public function reset()
    {
        Ssb::truncate();
        return redirect()->back()->with('info', 'Data has been reset');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
