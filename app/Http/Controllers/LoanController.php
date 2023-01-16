<?php

namespace App\Http\Controllers;

use App\Client;
use App\FloatBalance;
use App\Loan;
use App\Product;
use App\Repayment;
use App\Report;
use App\Transaction;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::where('loan_balance','>',0)->where('rollover_status_id', 1)->where('id', '>', 0)->orderby('loan_balance','desc')->paginate(10);
        return View('loans.index', compact('loans'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $user = Auth::user();
        $client = Client::find($request->clientid);
        $product = Product::find($request->loan_product_id);
        //return $product->duedate;
        $loan_no = Loan::orderBy('id', 'desc')->first()->id + 1;
        if (Loan::find($loan_no) != null) {
            $loan_no = $loan_no + 1;
        }
        $newLoanNo = $loan_no . date('Y');
        if ($request->principal < 0) {
            return redirect()->back()->with('info', 'Please Provide a Proper Loan amount');
        }
        if ($request->principal > $product->max_principal_amount) {
            return redirect()->back()->with('info', 'Loan cannot be greater than $ '.$product->max_principal_amount);
        }
        if ($client == null) {
            return redirect()->back()->with('info', 'Client does not exist');
        }
        if ($product == null) {
            return redirect()->back()->with('info', 'Product does not exist');
        }
        if ($client->hasActiveLoans()) {
            return redirect()->back()->with('info', 'Client has a running Loan/Loans');
        }
        if ($product->isProductExpired()) {
            return redirect()->back()->with('info', 'This product is expired');
        }

        $request['account_no'] = $newLoanNo;
        $request['total_Amount'] = $request->loan_balance;

        $float = $user->floatbalance() - $request->principal + $request->admin_fee;

        $loan = Loan::create($request->all());
        //return $request->mobile;
        $desc = $request->mobile != null ? 'Disbursed to ' .$request->mobile : '';
        $transaction = Transaction::create(['user_id' => $request->user_id, 'loan_id' => $loan->id, 'transaction_type_id' => $request->transaction_type_id, 'Amount' => $request->principal, 'balance' => $request->loan_balance, 'description' => $desc, 'created_at' => $request->created_at]);
        $floatBalance = FloatBalance::create(['transaction_id' => $transaction->id, 'Amount' => $request->principal, 'created_by' => $request->user_id, 'float_balance' => $float, 'created_at' => $request->created_at]);
        if ($request->transaction_type_id == 1) {
            Report::create(['userid' => $user->id, 'transactionType' => 'New Loan', 'Amount' => $floatBalance->Amount, 'balance' => $float - $request->admin_fee, 'description' => $client->clientNo, 'created_at' => $request->created_at, 'updated_at' => $request->created_at]);
            Report::create(['userid' => $user->id, 'transactionType' => 'Admin Fee', 'Amount' => $request->adminfee, 'balance' => $float, 'description' => $client->clientNo, 'created_at' => $request->created_at, 'updated_at' => $request->created_at]);
        }
        else if ($request->transaction_type_id == 9){
            Report::create(['userid' => $user->id, 'transactionType' => 'New Loan by Bank Transfer', 'Amount' => $floatBalance->Amount, 'balance' => $float, 'description' => $client->clientNo, 'created_at' => $request->created_at, 'updated_at' => $request->created_at]);
        }
        else {
            Report::create(['userid' => $user->id, 'transactionType' => 'New Loan by Ecocash', 'Amount' => $floatBalance->Amount, 'balance' => $float, 'description' => $client->clientNo, 'created_at' => $request->created_at, 'updated_at' => $request->created_at]);
        }
        \Log::info('Loan Successfully Saved at ' . now() . ' by ' . Auth::user()->name);
        DB::commit();
        return redirect()->back()->with('info', 'Loan Successfully Saved');

    }

    public function importLoan(Request $request){
        DB::beginTransaction();
        $user = Auth::user();
        $client = Client::find($request->clientid);
        $product = Product::find($request->loan_product_id);
        $loan_no = Loan::orderBy('id', 'desc')->first()->id + 1;
        if (Loan::find($loan_no) != null) {
            $loan_no = $loan_no + 1;
        }
        $newLoanNo = $loan_no . date('Y');
        if ($request->principal < 0) {
            return redirect()->back()->with('info', 'Please Provide a Proper Loan amount');
        }
        if ($request->principal > $product->max_principal_amount) {
            return redirect()->back()->with('info', 'Loan cannot be greater than $ '.$product->max_principal_amount);
        }
        if ($client == null) {
            return redirect()->back()->with('info', 'Client does not exist');
        }
        if ($product == null) {
            return redirect()->back()->with('info', 'Product does not exist');
        }
        if ($client->hasActiveLoans()) {
            return redirect()->back()->with('info', 'Client has a running Loan/Loans');
        }
        if ($product->isProductExpired()) {
            return redirect()->back()->with('info', 'This product is expired');
        }

        $request['account_no'] = $newLoanNo;
        $request['total_Amount'] = $request->principal;
        $request['loan_balance'] = $request->principal;
        $request['adminfee'] = 0;

        $loan = Loan::create($request->all());
        $transaction = Transaction::create(['user_id'=>$user->id, 'loan_id'=>$loan->id, 'transaction_type_id'=>12, 'Amount'=>$request->principal, 'created_at'=>date('Y-m-d H:i:s'), 'balance'=>$request->principal,'description'=>'Old Loan Import']);
        Report::create(['updated_at'=>date('Y-m-d H:i:s'), 'created_at'=>date('Y-m-d H:i:s'), 'Amount'=>$request->principal, 'userid'=>$user->id, 'transactionType'=>'Old Loan Import','balance'=>$user->floatBalance(),'description'=>$loan->client->clientNo ]);
        \Log::info('Old Loan Successfully Imported at ' . now() . ' by ' . Auth::user()->name);
        DB::commit();
        return redirect()->back()->with('info', 'Old Loan Successfully Imported');

    }

    public function topUp(Request $request)
    {
        DB::beginTransaction();

        //return $request->all();
        $user = Auth::user();
        $loan = Loan::find($request->loanId);
        $loan->update(['principal' => $request->newLoanAmount, 'loan_balance' => $request->newLoanBalance, 'total_Amount' => $request->newLoanBalance, 'mobile' => $request->mobile != null ? $request->mobile : "", 'adminfee' => $request->admin_fee, 'updated_at' => $request->created_at]);
        if ($request->topUpType == 'Cash'){
            $transaction = Transaction::create(['user_id' => Auth::user()->id, 'loan_id' => $loan->id, 'Amount' => $request->topUpAmount, 'transaction_type_id' => 3, 'balance' => $request->newLoanBalance, 'description' => 'Top up', 'created_at' => $request->created_at]);
            $float = $user->floatbalance() - $request->topUpAmount + $request->admin_fee;
            //return $float;
            $floatBalance = FloatBalance::create(['transaction_id' => $transaction->id, 'Amount' => $request->topUpAmount, 'created_by' => $user->id, 'float_balance' => $float, 'created_at' => $request->created_at]);
            //return $floatBalance;
            Report::create(['userid' => $user->id, 'transactionType' => 'Top Up', 'Amount' => $floatBalance->Amount, 'balance' => $float - $request->admin_fee, 'description' => $loan->client->clientNo, 'created_at' => $request->created_at, 'updated_at' => $request->created_at]);
            Report::create(['userid' => $user->id, 'transactionType' => 'Admin Fee', 'Amount' => $request->admin_fee, 'balance' => $float, 'description' => $loan->client->clientNo, 'created_at' => $request->created_at, 'updated_at' => $request->created_at]);
        }
        elseif ($request->topUpType == 'Bank'){
            $transaction = Transaction::create(['user_id' => Auth::user()->id, 'loan_id' => $loan->id, 'Amount' => $request->topUpAmount, 'transaction_type_id' => 21, 'balance' => $request->newLoanBalance, 'description' => 'Top up by Bank Transfer', 'created_at' => $request->created_at]);
            $float = $user->floatbalance();
            $floatBalance = FloatBalance::create(['transaction_id' => $transaction->id, 'Amount' => $request->topUpAmount, 'created_by' => $user->id, 'float_balance' => $float, 'created_at' => $request->created_at]);
            Report::create(['userid' => $user->id, 'transactionType' => 'Top Up by Bank', 'Amount' => $floatBalance->Amount, 'balance' => $float, 'description' => $loan->client->clientNo, 'created_at' => $request->created_at, 'updated_at' => $request->created_at]);
            Report::create(['userid' => $user->id, 'transactionType' => 'Admin Fee by Bank', 'Amount' => $request->admin_fee, 'balance' => $float, 'description' => $loan->client->clientNo, 'created_at' => $request->created_at, 'updated_at' => $request->created_at]);
        }
        else{
            $transaction = Transaction::create(['user_id' => Auth::user()->id, 'loan_id' => $loan->id, 'Amount' => $request->topUpAmount, 'transaction_type_id' => 17, 'balance' => $request->newLoanBalance, 'description' => 'Top up by Ecocash', 'created_at' => $request->created_at]);
            $float = $user->floatbalance();
            $floatBalance = FloatBalance::create(['transaction_id' => $transaction->id, 'Amount' => $request->topUpAmount, 'created_by' => $user->id, 'float_balance' => $float, 'created_at' => $request->created_at]);
            Report::create(['userid' => $user->id, 'transactionType' => 'Top Up by Ecocash', 'Amount' => $floatBalance->Amount, 'balance' => $float, 'description' => $loan->client->clientNo, 'created_at' => $request->created_at, 'updated_at' => $request->created_at]);
            Report::create(['userid' => $user->id, 'transactionType' => 'Admin Fee by Ecocash', 'Amount' => $request->admin_fee, 'balance' => $float, 'description' => $loan->client->clientNo, 'created_at' => $request->created_at, 'updated_at' => $request->created_at]);
        }

        \Log::info('Topup Successfully Saved at ' . now() . ' by ' . Auth::user()->name);
        DB::commit();
        return redirect()->back()->with('info', 'Top Up Successfully Saved');
    }

    public function activeClientLoansExist($clientId)
    {
        $loans = Loan::where(['clientid' => $clientId, 'rollover_status_id' => 1])->where('loan_balance', '>', 0)->get();
        if ($loans->count() > 0) {
            return true;
        }
        return false;
    }

    public function repayment(Request $request){
        DB::beginTransaction();
        //return $request;
        $user = Auth::user();
        $loanId = $request->loanId;
        $amount = $request->amount;
        $balance = $request->newBalance;
        $mobile = $request->mobile;
        $paymethodtype = $request->paymethodtype;
        $discount = $request->discount;
        //$userFloat = FloatBalance::where('created_by', $user->id)->

        //return $user;

        $repayment = new Repayment();
        $repayment->account_no = $request->id;
        $repayment->amount = $amount;
        $repayment->payment_method_id = $paymethodtype;
        $repayment->created_at = date('Y-m-d H:i:s');
        $repayment->save();

        if ($paymethodtype == 2){
            $transaction = new Transaction();
            $transaction->created_at = date('Y-m-d H:i:s');
            $transaction->transaction_type_id = $paymethodtype;
            $transaction->loan_id = $request->id;
            $transaction->Amount = $amount;
            //$transaction->discount = $discount;
            $transaction->description = $request->desc != null ?  $request->desc : '';
            $transaction->user_id = $user->id;
            $transaction->balance = $balance;
            $transaction->save();

            $float = new FloatBalance();
            $float->created_at =  date('Y-m-d H:i:s');
            $float->Amount=$amount;
            $float->float_balance = $user->floatbalance() + $amount;
            $float->transaction_id = $transaction->id;
            $float->created_by = $user->id;
            $float->save();
        }
        else{
            $transaction = new Transaction();
            $transaction->created_at = date('Y-m-d H:i:s');
            $transaction->transaction_type_id = $paymethodtype;
            $transaction->loan_id = $request->id;
            $transaction->Amount = $amount;
            //$transaction->discount = $discount;
            if ($paymethodtype == 19 || $paymethodtype == 4 || $paymethodtype == 14){
                $transaction->description = '';
            }
            else{
                $transaction->description = $mobile;
            }

            $transaction->user_id = $user->id;
            $transaction->balance = $balance;
            $transaction->save();
        }

        if ($discount != 0){
            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->transaction_type_id = 13;
            $transaction->created_at = date('Y-m-d H:i:s');
            $transaction->Amount = $discount;
            $transaction->balance = $balance;
            $transaction->loan_id = $request->id;
            $transaction->description = '';
            $transaction->save();
        }

        $loan = Loan::find($request->id);
        $loan->loan_balance = $balance;
        $loan->updated_at = date('Y-m-d H:i:s');
        $loan->save();

        Report::Create(['updated_at'=>date('Y-m-d H:i:s'), 'created_at'=>date('Y-m-d H:i:s'), 'Amount'=>$amount, 'userid'=>$user->id, 'transactionType'=>$paymethodtype == 2 ? 'CashRepayment' : 'Ecocash', 'balance'=>$user->floatbalance() + $amount, 'description'=>$loan->client->clientNo]);

        if ($discount != 0){
            Report::Create(['updated_at'=>date('Y-m-d H:i:s'), 'created_at'=>date('Y-m-d H:i:s'), 'Amount'=>$discount, 'userid'=>$user->id, 'transactionType'=>'Discount', 'balance'=>$user->floatbalance() + $amount, 'description'=>$loan->client->clientNo]);
        }

        \Log::info('Repayment Successfully Saved at ' . now() . ' by ' . Auth::user()->name);
        DB::commit();
        return redirect()->back()->with('info', 'Repayment Successfully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function getLoan($id)
    {
        $loan = Loan::find($id);
        $dueDate = $loan->product->duedate;

        //'counter','account_no','clientid','principal','loan_product_id','loan_status_id','rollover_status_id','loan_type_id','loan_balance','total_Amount','adminfee','created_at'

        return array('loanId' => $loan->id, 'accountNo' => $loan->account_no, 'loanAmount' => $loan->principal, 'balance' => $loan->loan_balance, 'dueDate' => $dueDate->dueDate, 'interest' => $loan->product->interest_rate, 'product'=>$loan->product->product_name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
