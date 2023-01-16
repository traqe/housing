<?php

namespace App\Http\Controllers;

use App\FloatBalance;
use App\Report;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class FloatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '>', 0)->get();
        return View('floats.index', compact('users'));
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
        DB::beginTransaction();
        //return now();
        $user = User::find($request->id);
        $balance = $request->newBalance;
        $amount = $request->amount;
        $transaction = Transaction::where('loan_id', -1)->orderby('id', 'desc')->first();//->balance;

        $tr = new Transaction();
        $tr->created_at = date('Y-m-d H:i:s');
        $tr->description='Float';
        $tr->transaction_type_id = 6;
        $tr->loan_id=-1;
        $tr->amount = $amount;
        $tr->balance = $transaction->balance + $amount;
        $tr->user_id = $user->id;
        $tr->save();

        $float = new FloatBalance();
        $float->created_at = date('Y-m-d H:i:s');
        $float->amount = $amount;
        $float->float_balance = $balance;
        $float->transaction_id = $tr->id;
        $float->created_by = $user->id;
        $float->save();

        if ($user->id != -1){
            $floatBalance = FloatBalance::where('created_by', -1)->orderby('id', 'desc')->first();
            $floatBalance->float_balance = $floatBalance->float_balance - $amount;
            $floatBalance->save();
        }

        $report = new Report();
        $report->created_at = date('Y-m-d H:i:s');
        $report->updated_at = date('Y-m-d H:i:s');
        $report->amount = $amount;
        $report->userid = $user->id;
        $report->transactionType = 'Float';
        $report->balance = $balance;
        $report->description = $user->username;
        $report->save();
        \Log::info('Float Successfully Saved at ' . now() . ' by ' . Auth::user()->name);
        DB::commit();
        return redirect()->back()->with('info', 'Float Successfully Saved');

    }

    public function processWithdrawal(Request $request){
        DB::beginTransaction();
        $user = User::find($request->id);
        $balance = $request->newBalance;
        $amount = $request->amount;
        $transaction = Transaction::where('loan_id', -1)->orderby('id', 'desc')->first();//->balance;

        $tr = new Transaction();
        $tr->created_at = date('Y-m-d H:i:s');
        $tr->description='Withdrawal';
        $tr->transaction_type_id = 7;
        $tr->loan_id=-1;
        $tr->amount = $amount;
        $tr->balance = $transaction->balance - $amount;
        $tr->user_id = $user->id;
        $tr->save();

        $float = new FloatBalance();
        $float->created_at = date('Y-m-d H:i:s');
        $float->amount = $amount;
        $float->float_balance = $balance;
        $float->transaction_id = $tr->id;
        $float->created_by = $user->id;
        $float->save();

        if ($user->id == -1){
            $floatBalance = FloatBalance::where('created_by', -1)->orderby('id', 'desc')->first();
            $floatBalance->float_balance = $floatBalance->float_balance + $amount;
            $floatBalance->save();
        }

        $report = new Report();
        $report->created_at = date('Y-m-d H:i:s');
        $report->updated_at = date('Y-m-d H:i:s');
        $report->amount = $amount;
        $report->userid = $user->id;
        $report->transactionType = 'Withdrawal';
        $report->balance = $balance;
        $report->description = $user->username;
        $report->save();
        \Log::info('Withdrawal Successfully Saved at ' . now() . ' by ' . Auth::user()->name);
        DB::commit();
        return redirect()->back()->with('info', 'Withdrawal Successfully Saved');
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
