<?php

namespace App\Http\Controllers;

use App\CurrentSession;
use App\FeeGrade;
use App\FeeStructure;
use App\Grade;
use App\Payment;
use App\PaymentMethod;
use App\Student;
use App\StudentBalance;
use App\StudentGrade;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Auth;

class FeeStructureController extends Controller
{
    public function index()
    {
        $year = CurrentSession::first()->year;
        $term = CurrentSession::first()->term;

        $fees = FeeStructure::where(['year'=>$year, 'term'=>$term])->get();
        return View('feestructure.index', compact('fees'));
    }

    public function create()
    {
        $year = CurrentSession::first()->year;
        $term = CurrentSession::first()->term;
        return View('feestructure.create', compact('year','term'));
    }

    public function getStudents()
    {
        $students = Student::all();
        $paymentmethods = PaymentMethod::all();
        $fees = FeeStructure::all();
        return View('feestructure.students', compact('students','paymentmethods','fees'));
    }

    public function makePayment(Request $request)
    {
        //return $request;
        try{
            DB::beginTransaction();
                Payment::UpdateOrCreate(['payment_date'=>date('y-m-d'), 'amount'=>$request->amount, 'paymentmethod_id'=>$request->paymentmethod_id,'student_id'=>$request->student_id]);
                $balance = self::getStudentBalance($request->student_id);
                $newbalance = $balance - $request->amount;

                StudentBalance::updateOrCreate(['student_id'=>$request->student_id],['balance'=>$newbalance]);
                Transaction::UpdateOrCreate(['student_id'=>$request->student_id,'amount'=>$request->amount,'transactiontypeid'=>1,'details'=>'Fees Payment on '.date('y-m-d')],['balance'=>$newbalance,'fee_id'=>$request->fee_id,'created_by'=>Auth::user()->id,'updated_by'=>Auth::user()->id]);
                //return redirect()->back();
            DB::commit();
            return redirect()->back()->with('info','Payment Successfully Captured');
        } catch(Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        FeeStructure::create($request->all());
        return redirect()->route('feestructures');
    }

    public function getStudentBalance($studentnumber)
    {
        return (StudentBalance::where('student_id', $studentnumber)->first() != null ? StudentBalance::where('student_id', $studentnumber)->first()->balance : 0);
    }

    public function TransactionExist($studentid, $amount, $details)
    {
        return (Transaction::where(['student_id'=>$studentid,'amount'=>$amount,'details'=>$details])->count() > 0 ? true : false);
    }

    public function charge(Request $request)
    {
        try{

            DB::beginTransaction();
            foreach ($request->role_ids as $gradeid)
            {
                $students = StudentGrade::where(['grade_id'=>$gradeid, 'year'=>$request->year,'term'=>$request->term])->get();

               // return $students;
                foreach ($students as $student)
                {
                    $balance = self::getStudentBalance($student->student->candidatenumber);

                    $feestructure = FeeStructure::findOrFail($request->fee_id);
                    $fee = $feestructure->amount;

                    $newbalance = $balance +  $fee;
                   // return $student->student->candidatenumber;
                    $studentbalance = StudentBalance::UpdateOrCreate(['student_id'=>$student->student->candidatenumber],['balance'=>$newbalance]);

                    $transaction = Transaction::UpdateOrCreate(['student_id'=>$student->student->candidatenumber,'amount'=>$fee,'transactiontypeid'=>2,'details'=>$feestructure->details,'fee_id'=>$feestructure->id],['balance'=>$newbalance,'created_by'=>$request->created_by,'updated_by'=>$request->created_by]);
                    //return $transaction;
                }

                $feegrade = FeeGrade::UpdateOrCreate(['feeid'=>$request->fee_id,'gradeid'=>$gradeid,'created_by'=>$request->created_by],['updated_by'=>$request->created_by]);
                //return $feegrade;
            }
            DB::commit();

            return redirect()->back();
        } catch(Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors($e->getMessage());
        }


    }

    public function edit($id)
    {
        $fee = FeeStructure::findOrFail($id);
        return View('feestructure.edit', compact('fee'));
    }

    public function update(Request $request, $id)
    {
        $fee = FeeStructure::findOrFail($id);
        $fee->update($request->all());
        return redirect()->route('feestructures');
    }

    public function show($id)
    {
        $year = CurrentSession::first()->year;
        $term = CurrentSession::first()->term;
        $fee = FeeStructure::findOrFail($id);
        $grades = Grade::orderby('grade')->get();

        $feegrade = FeeGrade::where('feeid', $id)->orderby('gradeid')->SimplePaginate(5);

        return View('feestructure.show', compact('fee','year','term','grades', 'feegrade'));
    }

}
