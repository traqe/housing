<?php

namespace App\Http\Controllers;

use App\FloatBalance;
use App\Loan;
use App\Report;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::where('loan_balance', '<', 0 )->where('rollover_status_id', 1)->get();
        return View('refunds.index', compact('loans'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        DB::beginTransaction();
        $user = Auth::user();
        $amount = - $request->amount;
        if ($request->cmbRefundType == "Cash"){
            $transaction = Transaction::create(['Amount'=>$amount, 'balance'=>0, 'created_at'=>date('Y-m-d H:i:s'), 'loan_id'=>$request->id, 'transaction_type_id'=>8, 'user_id'=>$user->id]);
            FloatBalance::create(['created_by'=>$user->id, 'transaction_id'=>$transaction->id, 'Amount'=>$amount, 'float_balance'=>$user->floatbalance()- $amount, 'created_at'=>date('Y-m-d H:i:s')]);
            $loan = Loan::find($request->id);
            $loan->loan_balance = 0;
            $loan->updated_at = date('Y-m-d H:i:s');
            $loan->save();
            Report::create(['updated_at'=>date('Y-m-d H:i:s'),'created_at'=>date('Y-m-d H:i:s'), 'Amount'=>$amount, 'userid'=>$user->id, 'balance'=>$user->floatbalance() - $amount, 'description'=>'Cash Refund '.$loan->client->clientNo, 'transactionType'=>'Cash Refund '.$loan->client->clientNo]);

        }
        else if ($request->cmbRefundType == "Bank Transfer"){
            $transaction = Transaction::create(['Amount'=>$amount, 'balance'=>0, 'created_at'=>date('Y-m-d H:i:s'), 'loan_id'=>$request->id, 'transaction_type_id'=>20, 'user_id'=>$user->id, 'description'=>'Bank Transfer Refund']);
            FloatBalance::create(['created_by'=>$user->id, 'transaction_id'=>$transaction->id, 'Amount'=>$amount, 'float_balance'=>$user->floatbalance(), 'created_at'=>date('Y-m-d H:i:s')]);
            $loan = Loan::find($request->id);
            $loan->loan_balance = 0;
            $loan->updated_at = date('Y-m-d H:i:s');
            $loan->save();
            Report::create(['updated_at'=>date('Y-m-d H:i:s'),'created_at'=>date('Y-m-d H:i:s'), 'Amount'=>$amount, 'userid'=>$user->id, 'balance'=>$user->floatbalance(), 'description'=>'Bank Transfer Refund '.$loan->client->clientNo, 'transactionType'=>'Bank Transfer Refund '.$loan->client->clientNo]);
        }
        else{
            $transaction = Transaction::create(['Amount'=>$amount, 'balance'=>0, 'created_at'=>date('Y-m-d H:i:s'), 'loan_id'=>$request->id, 'transaction_type_id'=>18, 'user_id'=>$user->id, 'description'=>$request->mobile]);
            FloatBalance::create(['created_by'=>$user->id, 'transaction_id'=>$transaction->id, 'Amount'=>$amount, 'float_balance'=>$user->floatbalance(), 'created_at'=>date('Y-m-d H:i:s')]);
            $loan = Loan::find($request->id);
            $loan->loan_balance = 0;
            $loan->updated_at = date('Y-m-d H:i:s');
            $loan->save();
            Report::create(['updated_at'=>date('Y-m-d H:i:s'),'created_at'=>date('Y-m-d H:i:s'), 'Amount'=>$amount, 'userid'=>$user->id, 'balance'=>$user->floatbalance(), 'description'=>'Ecocash Refund '.$loan->client->clientNo, 'transactionType'=>'Ecocash Refund '.$loan->client->clientNo]);
        }
        \Log::info('Refund Successfully Processed at ' . now() . ' by ' . Auth::user()->name);
        DB::commit();
        return redirect()->back()->with('info', 'Refund Successfully Processed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
