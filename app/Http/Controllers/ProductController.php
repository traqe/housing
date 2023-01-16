<?php

namespace App\Http\Controllers;

use App\Client;
use App\Loan;
use App\Product;
use App\ProductDueDate;
use App\Transaction;
use Grimthorr\LaravelToast\Toast;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderby('product_name')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $duedates = ProductDueDate::orderby('dueDate','desc')->get();
        return view('products.create', compact('duedates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->grace_period_on_late_repayment == 'on') {
            $request["grace_period_on_late_repayment"] = 1;
        } else {
            $request["grace_period_on_late_repayment"] = 0;
        }
        if ($request->charge_interest_on_grace_period == 'on') {
            $request["charge_interest_on_grace_period"] = 1;
        } else {
            $request["charge_interest_on_grace_period"] = 0;
        }
        //return $request;
        Product::create($request->all());
        //Toast::success('Product Added successfully');
        return redirect()->route('product');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        //return  $product->loans;
        return View('products.show', compact('product'));
    }

    public function getRollover()
    {
        $date = date('Y-m-d');
        //return $date;
        $products = Product::whereHas('duedate', function (Builder $builder){
            $builder->where('duedate', '<', date('Y-m-d'));
        })->whereHas('loans', function (Builder $builder){
            $builder->where('counter','<', 4)->where('id','>', 0)->where('loan_balance','>', 0)->where('rollover_status_id', 1);
        })->get();
        //return  $products;
        return View('products.rollover', compact('products'));
    }

    public function rollover(Request $request){
        //return $request;
        DB::beginTransaction();
        $product = Product::find($request->id);
        $loans = $product->loans->where('loan_balance','>',0)->where('counter','<',3)->where('rollover_status_id',1);
        $duedate = ProductDueDate::where('dueDate', $request->newDueDate)->first();
        if ($duedate == null){
            $date = date($request->newDueDate);
            $dateArr=  explode('-', $date);
            $duedate = ProductDueDate::create(['dueDate'=>$date, 'month'=>$dateArr[1], 'year'=>$dateArr[0], 'created_at'=>date('Y-m-d H:i:s')]);
        }

        $product->installment_due_day_id = $duedate->id;
        $product->save();

        foreach ($loans as $loan){
            $loan->rollover_status_id = 2;
            $loan->updated_at = date('Y-m-d H:i:s');
            $loan->save();
            //return $loan->loan_balance;
            $balance = round((($request->interest/100) * $loan->loan_balance) + $loan->loan_balance);
           // return $balance;

            $ln = new Loan();
            $ln->account_no = $loan->account_no;
            $ln->clientid = $loan->clientid;
            $ln->counter = $loan->counter + 1;
            $ln->created_at = date('Y-m-d H:i:s');
            $ln->loan_balance =$balance;
            $ln->loan_product_id = $loan->loan_product_id;
            $ln->total_Amount = $balance;
            $ln->loan_status_id = 1;
            $ln->loan_type_id = 2;
            $ln->rollover_status_id = 1;
            $ln->adminfee = 0;
            $ln->principal = $loan->loan_balance;
            $ln->save();

            Transaction::create(['created_at'=>date('Y-m-d H:i:s'), 'transaction_type_id'=>5, 'balance'=>$balance, 'Amount'=>$ln->principal, 'loan_id'=>$ln->id, 'description'=>'Loan rollover', 'user_id'=>Auth::user()->id ]);

//
//                    loan.tbltransactions.Add(new tbltransaction() { created_at = DateTime.Now, transaction_type_id = 5, balance = loan.loan_balance, Amount = loan.principal, loan_id = loan.id, user_id = Userid, description = "loan rollover" });
//                    con.tblloanevents.Add(loan);

        }
        \Log::info('Loans Successfully Rolled Over at ' . now() . ' by ' . Auth::user()->name);
        DB::commit();
        return redirect()->back()->with('info', 'Loans Successfully Rolled Over');
    }

    public function transferLoans(Request $request)
    {
        $tempProduct = Product::find($request->tempId);
        $product = Product::find($request->productId);
        if ($product->duedate->dueDate == $tempProduct->duedate->dueDate) {
            if ($tempProduct->loans->count() > 0) {
                //return  $tempProduct->loans;
                Loan::where('loan_product_id', $tempProduct->id)->update(['loan_product_id' => $product->id]);
                return redirect()->back()->with('info', 'Loans Successfully transferred');
            }
            else{
                return redirect()->back()->with('error', 'No Loans where found on the Source Product');
            }
        }else{
            return redirect()->back()->with('error', 'The Selected Products must have the same due date');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $duedates = ProductDueDate::all();
        return  View('products.edit', compact('product','duedates'));
    }

    public function getProduct($id){
        $product= Product::find($id);
        return [
            'duedate'=>$product->duedate->dueDate,
            'interest'=>$product->interest_rate,
            'allowed_max'=>$product->max_principal_amount,
            'allowed_min'=>$product->min_principal_amount
        ];
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
        if ($request->grace_period_on_late_repayment == 'on'){
            $request["grace_period_on_late_repayment"] = 1;
        }
        else{
            $request["grace_period_on_late_repayment"] = 0;
        }
        if ($request->charge_interest_on_grace_period == 'on'){
            $request["charge_interest_on_grace_period"] = 1;
        }
        else{
            $request["charge_interest_on_grace_period"] = 0;
        }
        //return $request;
        $product = Product::find($id); 
        $product->update($request->all());
        //Toast::success('Product Updated successfully');
        return  redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //return $request;
        $product = Product::find($request->id);
        $product->delete();
        //Toast::success('Product Deleted successfully');
        return  redirect()->route('product');
    }
}
