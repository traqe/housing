<?php

namespace App\Http\Controllers;

use App\FloatBalance;
use App\Loan;
use App\Receipt;
use App\Repayment;
use App\Report;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class RepaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $repayments = Transaction::where('created_at','regexp', date('Y-m-d'))->whereIn('transaction_type_id',[2,15])->get();

        $currentMonth = date('m');
//        $repayments = DB::table("tblreceipts")
//            ->whereRaw('MONTH(Date) = ?',[$currentMonth])
//            ->get();

        if (Auth::user()->hasAnyRole(['Administrator', 'Manager'])) {
            $repayments = Receipt::whereRaw('MONTH(Date) = ?',[$currentMonth])->get();
        } else {
            $repayments = Receipt::where('Date', 'regexp', date('Y-m-d'))->where('user', Auth::user()->id)->get();
        }
        return View('repayments.index', compact('repayments'));
    }

    public function reverseFloatBalance($id)
    {
        $float = FloatBalance::where('transaction_id', $id)->get();
        foreach ($float as $f) {
            $f->delete();
        }
    }

    public function deleteTransaction($transaction)
    {
        $transaction->delete();
    }

    public function reverseLoanBalance($id)
    {
        $loan = Loan::find($id);
        $loan->delete();
    }

    public function reverseLoanBalances($id, $amount)
    {
        $loan = Loan::find($id);
        $loan->loan_balance = $loan->loan_balance + $amount;
        $loan->save();
    }

    public function addExpense($amount, $desc, $floatBalance, $user)
    {
        Report::create(['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'Amount' => $amount, 'userid' => $user, 'transactionType' => $desc, 'balance' => $floatBalance, 'description' => $desc]);
    }

    public function updateFloat($id, $amount)
    {
        $float = FloatBalance::find($id);
        $float->float_balance = $amount;
        $float->save();
    }

    public function reverseTransaction(Request $request)
    {
        $transaction = Transaction::find($request->id);
        $transactionId = $transaction->id;
        $loanId = $transaction->loan_id;
        $userid = $transaction->user_id;
        $user = User::find($userid);
        $amount = $transaction->Amount;
        $description = $transaction->transactiontype->transaction;
        $float = FloatBalance::where('created_by', $userid)->orderby('id', 'desc')->first();
        $loan = Loan::find($loanId);
        $adminfee = $loan->product->entry_fee * $amount / 100;
        $interest = $loan->product->interest_rate * $amount / 100;

        DB::beginTransaction();

        if ($this->checkIfMoneyIsGoingOut($transaction)) {
            if ($this->checkIfFloatBalanceIsLast($transaction)) {
                $this->reverseFloatBalance($transactionId);
                $this->deleteTransaction($transaction);
                $this->reverseLoanBalance($loanId);
                $this->addExpense($amount, "Reversal, " . $description, $user->floatbalance(), $userid);
            } else {
                $this->reverseFloatBalance($transactionId);
                $this->deleteTransaction($transaction);
                $this->reverseLoanBalance($loanId);
                $this->updateFloat($float->id, $float->float_balance + $amount - $loan->adminfee);
                $this->addExpense($amount, "Reversal, " . $description, $user->floatbalance(), $userid);
            }
        } else if ($this->checkIfItsCashPayment($transaction)) {
            if ($this->checkIfFloatBalanceIsLast($transaction)) {
                $this->reverseFloatBalance($transactionId);
                $this->deleteTransaction($transaction);
                $this->reverseLoanBalances($loanId, $amount);
                $this->addExpense($amount, "Reversal, " . $description, $user->floatbalance(), $userid);
                //reverseFloatBalance(trid);
                //deleteTransaction(trid);
                //reverseLoanBalance(loanid, transAmount);
                //addExpense(transAmount, "Reversal, " + description, getFloatBalance(getLastFloatId(loanOfficerId)));
            } else {
                $this->reverseFloatBalance($transactionId);
                $this->deleteTransaction($transaction);
                $this->reverseLoanBalances($loanId, $amount);
                //reverseFloatBalance(trid);
                //deleteTransaction(trid);
                //reverseLoanBalance(loanid, transAmount);

                $this->updateFloat($float->id, $float->float_balance - $amount);
                $this->addExpense($amount, "Reversal, " . $description, $user->floatbalance(), $userid);
                //addExpense(transAmount, "Reversal, " + description, getFloatBalance(getLastFloatId(loanOfficerId)) - transAmount);
                //updateBalanceFloat(getLastFloatId(loanOfficerId), -transAmount);
            }
        } else if ($this->checkIfRefund($transaction)) {
            if ($this->checkIfFloatBalanceIsLast($transaction)) {
                $this->reverseFloatBalance($transactionId);
                $this->deleteTransaction($transaction);
                $this->reverseLoanBalances($loanId, -$amount);
                $this->addExpense($amount, "Reversal, " . $description, $user->floatbalance(), $userid);
                //reverseFloatBalance(trid);
                //deleteTransaction(trid);
                //reverseLoanBalance(loanid, -transAmount);
                //addExpense(transAmount, "Reversal, " + description, getFloatBalance(getLastFloatId(loanOfficerId)));
            } else {
                $this->reverseFloatBalance($transactionId);
                $this->deleteTransaction($transaction);
                $this->reverseLoanBalances($loanId, -$amount);
                $this->updateFloat($float->id, $float->float_balance + $amount);
                $this->addExpense($amount, "Reversal, " . $description, $user->floatbalance(), $userid);
                //reverseFloatBalance(trid);
                // deleteTransaction(trid);
                //reverseLoanBalance(loanid, transAmount);
                //addExpense(transAmount, "Reversal, " + description, getFloatBalance(getLastFloatId(loanOfficerId)) + transAmount);
                //updateBalanceFloat(getLastFloatId(loanOfficerId), transAmount);
            }
        }
        else if ($this->checkIfRollOver($transaction))
        {
            $this->reverseFloatBalance($transactionId);
            $this->deleteTransaction($transaction);
            $this->reverseLoanBalance($loanId);
            $this->addExpense($amount, "Reversal, " . $description, $user->floatbalance(), $userid);
        }
        else if ($this->checkifTopUp($transaction)) {
            if ($this->checkIfFloatBalanceIsLast($transaction)) {
                $this->reverseFloatBalance($transactionId);
                $this->deleteTransaction($transaction);
                $this->reverseLoanBalances($loanId, $amount);
                $this->addExpense($amount, "Reversal, " . $description, $user->floatbalance(), $userid);
                //reverseFloatBalance(trid);
                //deleteTransaction(trid);
                //reverseLoanBalance(loanid, transAmount);
                //addExpense(transAmount, "Reversal, " + description, getFloatBalance(getLastFloatId(loanOfficerId)));
            } else {
                $this->reverseFloatBalance($transactionId);
                $this->deleteTransaction($transaction);
                $this->reverseLoanBalances($loanId, $amount);
                $this->updateFloat($float->id, $float->float_balance + $amount - $loan->adminfee);
                $this->addExpense($amount, "Reversal, " . $description, $user->floatbalance(), $userid);
                //reverseFloatBalance(trid);
                //deleteTransaction(trid);
                //reverseLoanBalance(loanid, transAmount);
                //updateBalanceFloat(getLastFloatId(loanOfficerId), transAmount - adminfee);
                //addExpense(transAmount, "Reversal, " + description, getFloatBalance(getLastFloatId(loanOfficerId)));

            }
        } else if ($this->checkIfItsAnImport($transaction)) {
            $this->reverseFloatBalance($transactionId);
            $this->deleteTransaction($transaction);
            $this->reverseLoanBalance($loanId);
            $this->addExpense($amount, "Reversal, " . $description, $user->floatbalance(), $userid);
            // reverseFloatBalance(trid);
            //deleteTransaction(trid);
            //reverseLoanBalance(loanid);
            //addExpense(transAmount, "Reversal, " + description, getFloatBalance(getLastFloatId(loanOfficerId)));
        } else if ($this->checkIfExpense($transaction)) {
            if ($this->checkIfFloatBalanceIsLast($transaction)) {
                $this->reverseFloatBalance($transactionId);
                $this->deleteTransaction($transaction);
                $this->addExpense($amount, "Reversal, " . $description, $user->floatbalance(), $userid);
//                reverseFloatBalance(trid);
//                deleteTransaction(trid);
//                addExpense(transAmount, "Reversal, " + description, getFloatBalance(getLastFloatId(loanOfficerId)));
            } else {
                $this->reverseFloatBalance($transactionId);
                $this->deleteTransaction($transaction);
                $this->updateFloat($float->id, $float->float_balance + $amount);
                $this->addExpense($amount, "Reversal, " . $description, $user->floatbalance(), $userid);
//                reverseFloatBalance(trid);
//                deleteTransaction(trid);
//                addExpense(transAmount, "Reversal, " + description, getFloatBalance(getLastFloatId(loanOfficerId)) + transAmount);
//                updateBalanceFloat(getLastFloatId(loanOfficerId), transAmount);
            }
        } else if ($this->checkBalanceEffect($transaction)) {
            $this->reverseFloatBalance($transactionId);
            $this->deleteTransaction($transaction);
            $this->reverseLoanBalances($loanId, $amount);
            $this->updateFloat($float->id, $float->float_balance + 0);
            $this->addExpense($amount, "Reversal, " . $description, $user->floatbalance(), $userid);

            //reverseFloatBalance(trid);
            //deleteTransaction(trid);
            //reverseLoanBalance(loanid, transAmount);
            //addExpense(transAmount, "Reversal, " + description, getFloatBalance(getLastFloatId(loanOfficerId)));
            //updateBalanceFloat(getLastFloatId(loanOfficerId), 0);

        } else if ($this->checkifEcocashTopUp($transaction)) {
            $this->reverseFloatBalance($transactionId);
            $this->deleteTransaction($transaction);
            $this->reverseLoanBalances($loanId, -($amount + $interest));
            //$float = FloatBalance::where('created_by', $userid)->orderby('id', 'desc')->first();
            //return $float->id;
            //$this->updateFloat($float->id, $float->float_balance + 0);
            $this->addExpense($amount, "Reversal, " . $description, $user->floatbalance(), $userid);
            //reverseFloatBalance(trid);
            //deleteTransaction(trid);
            //reverseLoanBalance(loanid, -(transAmount + adminfee));
            //addExpense(transAmount, "Reversal, " + description, getFloatBalance(getLastFloatId(loanOfficerId)));
            //updateBalanceFloat(getLastFloatId(loanOfficerId), 0);
        } else if ($this->checkifEcocashRefund($transaction)) {
            $this->reverseFloatBalance($transactionId);
            $this->deleteTransaction($transaction);
            $this->reverseLoanBalances($loanId, -$amount);
            //$this->updateFloat($float->id, $float->float_balance + 0);
            $this->addExpense($amount, "Reversal, " . $description, $user->floatbalance(), $userid);
//            reverseFloatBalance(trid);
//            deleteTransaction(trid);
//            reverseLoanBalance(loanid, -transAmount);
            //addExpense(transAmount, "Reversal, " + description, getFloatBalance(getLastFloatId(loanOfficerId)));
            //updateBalanceFloat(getLastFloatId(loanOfficerId), 0);
        }

        DB::commit();
        return redirect()->back()->with('info', 'Transaction Successfully Reversed');
    }

    public
    function checkIfMoneyIsGoingOut($transaction)
    {
        if ($transaction->transaction_type_id == 1)
            return true;
        return false;
    }

    public
    function checkIfFloatBalanceIsLast($transaction)
    {
        $float = FloatBalance::where('transaction_id', '>', $transaction->id)->where('created_by', $transaction->user_id)->count();
        if ($float > 0)
            return false;
        return true;
    }

    public
    function checkIfItsCashPayment($transaction)
    {
        if ($transaction->transaction_type_id == 2)
            return true;
        return false;
    }

    public
    function checkIfRefund($transaction)
    {
        if ($transaction->transaction_type_id == 8)
            return true;
        return false;
    }

    public
    function checkifSSB($transaction)
    {
        if ($transaction->transaction_type_id == 4)
            return true;
        return false;
    }

    public
    function checkifTopUp($transaction)
    {
        if ($transaction->transaction_type_id == 3)
            return true;
        return false;
    }

    public
    function checkIfItsAnImport($transaction)
    {
        if ($transaction->transaction_type_id == 16 || $transaction->transaction_type_id == 12 || $transaction->transaction_type_id == 9)
            return true;
        return false;
    }

    public
    function checkIfExpense($transaction)
    {
        if ($transaction->transaction_type_id == 10)
            return true;
        return false;
    }

    public
    function checkBalanceEffect($transaction)
    {
        if ($transaction->transaction_type_id == 4 || $transaction->transaction_type_id == 14 || $transaction->transaction_type_id == 13 || $transaction->transaction_type_id == 15 || $transaction->transaction_type_id == 19)
            return true;
        return false;
    }

    public
    function checkIfEcocashTopUp($transaction)
    {
        if ($transaction->transaction_type_id == 17 || $transaction->transaction_type_id == 21)
            return true;
        return false;
    }

    public
    function checkIfEcocashRefund($transaction)
    {
        if ($transaction->transaction_type_id == 18 || $transaction->transaction_type_id == 20)
            return true;
        return false;
    }

    function checkIfRollOver($transaction){
        if ($transaction->transaction_type_id == 5)
            return true;
        return false;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
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
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}
