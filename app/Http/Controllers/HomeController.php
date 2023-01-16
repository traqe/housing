<?php

namespace App\Http\Controllers;

use App\Application;
use App\Batch;
use App\Client;
use App\Loan;
use App\Parents;
use App\Person;
use App\Product;
use App\Repayment;
use App\Staff;
use App\Stand;
use App\Student;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stands = Stand::count();
        $available = Stand::where('status','Available')->count();
        $applicants = Person::whereHas('application')->count();
        $applications = Application::where('application_stage_id','4')->count();
        $batches = Batch::count();

        return view('panel.blank', compact('stands','applicants', 'batches','applications','available'));
    }
}
