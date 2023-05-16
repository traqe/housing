<?php

namespace App\Http\Controllers;

use App\Application;
use App\Client;
use App\Exports\ReportsExport;
use App\Loan;
use App\PaymentMethod;
use App\Person;
use App\Product;
use App\Report;
use App\Ssb;
use App\Stand;
use App\Transaction;
use App\User;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Barryvdh\DomPDF\Facade as PDF;
use Excel;
use App\Ward;

class ReportController extends Controller
{
    public function export()
    {
        $ssbs = Ssb::whereHas('client')->get();
        $studentArray[] = array(['BULAWAYO SSB']);
        $studentArray[] = array(['Amount', 'EcNumber', 'FirstName', 'LastName']);
        foreach ($ssbs as $key => $app) {
            $studentArray[] = array(
                'Amount' => $app->Amount,
                'EcNumber' => $app->EmployeeId,
                'FirstName' => $app->client->person->first_name,
                'LastName' =>  $app->client->person->last_name,
            );
        }
        $export = new ReportsExport($studentArray);
        return Excel::download($export, 'SSB Byo.xlsx');
    }

    public function index()
    {
        $clients = null;
        $products = Product::all();
        $paymentTypes = PaymentMethod::all();
        $users = User::all();
        return view('reports.index', compact('clients', 'products', 'paymentTypes', 'users'));
    }

    public function getActiveLoans(Request $request)
    {
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
        $company = Company::all()->first();
        $loans = Loan::where('loan_balance', '>', 0)->where('created_at', '>=', $fromDate)->where('created_at', '<=', $toDate)->where('counter', 0)->where('rollover_status_id', 1)->where('id', '>', 0)->orderby('loan_balance', 'desc')->get();
        $summaryData = array(
            'loans' => $loans,
            'company' => $company
        );
        $pdf = PDF::loadView('reports.loans', $summaryData);
        $filename = "Loans Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getApplicants()
    {
        $people = Person::orderby('surname')->orderby('surname')->orderby('firstname')->get(); //->sortBy('surname');//->sortBy('firstname');;
        $company = Company::all()->first();
        $summaryData = array(
            'people' => $people,
            'company' => $company
        );
        $pdf = PDF::loadView('reports.applicants', $summaryData);
        $filename = "Applicants Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getApplications()
    {
        $applications = Application::all();
        $company = Company::all()->first();
        $summaryData = array(
            'applications' => $applications,
            'company' => $company
        );
        $pdf = PDF::loadView('reports.applications', $summaryData);
        $filename = "Applicatios Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }
    public function getStands()
    {
        $stands = Stand::all();
        $company = Company::all()->first();
        $summaryData = array(
            'stands' => $stands,
            'company' => $company
        );
        $pdf = PDF::loadView('reports.stands', $summaryData);
        $filename = "All Stands Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getAvailableStands()
    {
        $stands = Stand::where('status', 'Available')->get();
        $company = Company::all()->first();
        $summaryData = array(
            'stands' => $stands,
            'company' => $company
        );
        $pdf = PDF::loadView('reports.available', $summaryData);
        $filename = "Available Stands Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getAllocatedStands()
    {
        $stands = Stand::where('status', 'Allocated')->get();
        $company = Company::all()->first();
        $summaryData = array(
            'stands' => $stands,
            'company' => $company
        );
        $pdf = PDF::loadView('reports.allocated', $summaryData);
        $filename = "Allocated Stands Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getApprovedApplications()
    {
        $applications = Application::whereHas('stage', function (Builder $builder) {
            $builder->where('stage', 'APPROVED');
        })->get();
        $company = Company::all()->first();
        $summaryData = array(
            'applications' => $applications,
            'company' => $company
        );
        $pdf = PDF::loadView('reports.approved', $summaryData);
        $filename = "Approved Applicatios Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getDeclinedApplications()
    {
        $applications = Application::whereHas('stage', function (Builder $builder) {
            $builder->where('stage', 'DECLINED');
        })->get();
        $company = Company::all()->first();
        $summaryData = array(
            'applications' => $applications,
            'company' => $company
        );
        $pdf = PDF::loadView('reports.declined', $summaryData);
        $filename = "Declined Applicatios Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getPendingApplications()
    {
        $applications = Application::whereHas('stage', function (Builder $builder) {
            $builder->whereIn('stage', ['CREATED', 'ALLOCATED']);
        })->get();
        $company = Company::all()->first();
        $summaryData = array(
            'applications' => $applications,
            'company' => $company
        );
        $pdf = PDF::loadView('reports.pending', $summaryData);
        $filename = "Pending Applicatios Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getCompanyProfile()
    {
        $company = Company::all()->first();
        $summaryData = array(
            'company' => $company,
        );
        $pdf = PDF::loadView('reports.company', $summaryData);
        $filename = "Company Profile Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getByLaws()
    {
        $company = Company::all()->first();
        $summaryData = array(
            'company' => $company,
        );
        $pdf = PDF::loadView('reports.bylaws', $summaryData);
        $filename = "By-Laws Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getChecklist()
    {
        $company = Company::all()->first();
        $summaryData = array(
            'company' => $company,
        );
        $pdf = PDF::loadView('reports.checklist', $summaryData);
        $filename = "Checklist Form";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getGenderTotal(){
        $company = Company::all()->first();
        $persons = Person::all();
        $females = Person::where('gender_id',2)->count();
        $males = Person::where('gender_id',1)->count();
        $unassigned = Person::where('gender_id',0)->count();
        $summaryData = array('females' => $females,'males'=> $males,'unassigned' => $unassigned,'company' => $company,'persons' => $persons);
        $pdf = PDF::loadView('reports.gender',$summaryData);
        $filename = "Gender Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getWard(){
        $company = Company::all()->first();
        $wards = Ward::all();
        $summaryData = array('company' => $company,'wards' => $wards);
        $pdf = PDF::loadView('reports.wards',$summaryData);
        $filename = "Wards & BusCentres";
        return $pdf->stream($filename . '.pdf', array('Attachement' => 0));
    }

    public function getProductLoans(Request $request)
    {
        $product = Product::find($request->productId);
        $company = Company::all()->first();
        $loans = $product->loans->where('loan_balance', '>', 0)->where('rollover_status_id', 1)->where('id', '>', 0)->sortByDesc(function ($s) {
            return [$s->loan_balance];
        });
        $summaryData = array(
            'loans' => $loans,
            'product' => $product,
            'company' => $company
        );
        $pdf = PDF::loadView('reports.productloans', $summaryData);
        $filename = "Product Loans Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getByPayment(Request $request)
    {
        $payment = PaymentMethod::find($request->methodId);
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
        $company = Company::all()->first();
        $transactions = Transaction::where('transaction_type_id', $request->methodId)->where('Amount', '>', 0)->where('created_at', '>=', $fromDate)->where('created_at', '<=', $toDate)->orderby('created_at', 'desc')->get();
        $summaryData = array(
            'method' => $payment,
            'transactions' => $transactions,
            'from' => $fromDate,
            'to' => $toDate,
            'company' => $company
        );
        $pdf = PDF::loadView('reports.paymenttype', $summaryData);
        $filename = "Transaction Type Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }
    public function getCashAdminReport(Request $request)
    {
        //Report::create(['userid' => $user->id, 'transactionType' => 'Admin Fee', 'Amount' => $request->admin_fee, 'balance' => $float, 'description' => $loan->client->clientNo, 'created_at' => $request->created_at, 'updated_at' => $request->created_at]);
        $payment = $request->transactionTypeId;
        //return $request->transactionTypeId;
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
        $company = Company::all()->first();
        //$transactions = Transaction::whereIn('transaction_type_id', [1,3])->where('Amount','>', 0)->where('created_at', '>=', $fromDate)->where('created_at', '<=', $toDate)->orderby('created_at', 'desc')->get();
        $transactions = Report::whereIn('transactionType', ['Admin Fee'])->where('Amount', '>', 0)->where('created_at', '>=', $fromDate)->where('created_at', '<=', $toDate)->orderby('created_at', 'desc')->get();


        $summaryData = array(
            'method' => $payment,
            'transactions' => $transactions,
            'from' => $fromDate,
            'to' => $toDate,
            'company' => $company
        );
        $pdf = PDF::loadView('reports.adminfee', $summaryData);
        $filename = "AdminFee Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getTransactionList(Request $request)
    {
        $user = User::find($request->userId);
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
        $transactions = null;
        $company = Company::all()->first();
        if ($request->userId == 'All') {
            $transactions = Transaction::where('Amount', '>', 0)->where('created_at', '>=', $fromDate)->where('created_at', '<=', $toDate)->orderby('created_at', 'desc')->get();
        } else {
            $transactions = Transaction::where('user_id', $request->userId)->where('Amount', '>', 0)->where('created_at', '>=', $fromDate)->where('created_at', '<=', $toDate)->orderby('created_at', 'desc')->get();
        }
        $summaryData = array(
            'user' => $user,
            'transactions' => $transactions,
            'from' => $fromDate,
            'to' => $toDate,
            'company' => $company
        );
        $pdf = PDF::loadView('reports.transactionlist', $summaryData);
        $filename = "Transaction List Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getRefunds()
    {
        //$loans = Loan::where('loan_balance', '<', 0 )->where('rollover_status_id', 1)->orderby('loan_balance','desc')->get();
        $loans = Loan::where('loan_balance', '<', 0)->where('rollover_status_id', 1)->where('id', '>', 0)->orderby('loan_balance', 'desc')->get();
        $company = Company::all()->first();
        $summaryData = array(
            'loans' => $loans,
            'company' => $company
        );
        $pdf = PDF::loadView('reports.refunds', $summaryData);
        $filename = "Refunds Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getDefaulters(Request $request)
    {
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
        $company = Company::all()->first();
        //$loans = Loan::where('loan_balance', '<', 0 )->where('rollover_status_id', 1)->orderby('loan_balance','desc')->get();
        $loans = Loan::where('loan_balance', '>', 0)->where('created_at', '>=', $fromDate)->where('created_at', '<=', $toDate)->where('rollover_status_id', 1)->whereIn('counter', [1, 2, 3])->where('id', '>', 0)->orderby('loan_balance', 'desc')->get();
        $summaryData = array(
            'loans' => $loans,
            'company' => $company
        );
        $pdf = PDF::loadView('reports.defaulters', $summaryData);
        $filename = "Defaulters Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getBadDebtors()
    {
        //$loans = Loan::where('loan_balance', '<', 0 )->where('rollover_status_id', 1)->orderby('loan_balance','desc')->get();
        $loans = Loan::where('loan_balance', '>', 0)->where('rollover_status_id', 1)->where('counter', '>', 3)->where('id', '>', 0)->orderby('loan_balance', 'desc')->get();
        $company = Company::all()->first();
        $summaryData = array(
            'loans' => $loans,
            'company' => $company
        );
        $pdf = PDF::loadView('reports.baddebtors', $summaryData);
        $filename = "Bad Debtors Report";
        return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
    }

    public function getStatement(Request $request)
    {
        $client = Client::where('ClientNo', $request->clientNo)->first();
        $company = Company::all()->first();
        if ($client != null) {
            $summaryData = array(
                'client' => $client,
                'company' => $company
            );
            $pdf = PDF::loadView('reports.statement', $summaryData);
            $filename = "Client Statement Report";
            return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
        }
        return 'Client Does Not Exist';
    }

    public function getNewClientReport(Request $request)
    {
        $fromDate = $request->fromDate;
        $toDate = $request->toDate;
        $company = Company::all()->first();
        $clients = Client::where('created_at', '>=', $fromDate)->where('created_at', '<=', $toDate)->get();
        $male = Client::where('created_at', '>=', $fromDate)->where('created_at', '<=', $toDate)->whereHas('person.gender', function (Builder $builder) {
            $builder->where('id', 2);
        })->count();
        $female = $clients->count() - $male;

        if ($clients != null) {
            $summaryData = array(
                'clients' => $clients,
                'male' => $male,
                'female' => $female,
                'from' => $fromDate,
                'to' => $toDate,
                'company' => $company
            );
            $pdf = PDF::loadView('reports.newClients', $summaryData);
            $filename = "New Clients Report";
            return $pdf->stream($filename . '.pdf', array('Attachment' => 0));
        }
        return 'Client Does Not Exist';
    }
}
