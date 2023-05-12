<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Debtors;
use App\SageTransaction;

class DebtorsController extends Controller
{
    public function index(){

        $debtors = Debtors::where('DCBalance','!=',285)->get();

        return view('sagetransactions.debtors',compact('debtors'));
    }

    public function show($id){
        $debtor = Debtors::findorFail($id);
        $transactions = SageTransaction::where('AccountLink',$id)->orderBy('TxDate','desc')->get();

        return view('sagetransactions.show',compact('debtor','transactions'));
    }
}