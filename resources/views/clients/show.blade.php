@extends('master')



@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-left">
                            <h4>
                                <i class="fa fa-user-secret"></i> {{$client->person->first_name.' '.$client->person->last_name}}
                                Details</h4>
                        </div>
                        <div class="pull-right">
                            <a href="{{route('clients')}}" id="btn_show_data" class="btn btn-sm btn-primary"
                               title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>
                            <a href="{{route('createClient')}}" id="btn_add_new_data" class="btn btn-sm btn-success"
                               title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="card card-accent-primary">
                            <div class="card-header">
                                <i class="fa fa-street-view">
                                    <strong>Personal</strong>
                                    <small>Details</small>
                                </i>
                                <div class="pull-right">
                                    <a href="#editClient" data-toggle="modal" class=""
                                       title="Edit Personal Details">
                                        <i class="fa fa-pencil"> Edit</i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table-detail" class="table table-sm table-hover table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>Firstname</td>
                                            <td>{{$client->person->first_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Surname</td>
                                            <td>{{$client->person->last_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>National ID</td>
                                            <td>{{$client->person->nationalId}}</td>
                                        </tr>
                                        <tr>
                                            <td>Client ID</td>
                                            <td>{{$client->clientNo}}</td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td>{{$client->person->gender->gender}}</td>
                                        </tr>
                                        <tr>
                                            <td>DOB</td>
                                            <td>{{$client->person->date_of_birth}}</td>
                                        </tr>
                                        <tr>
                                            <td>Mobile</td>
                                            <td>{{$client->person->mobile_no}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{$client->person->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{$client->person->address}}</td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td>{{$client->person->country.', '.$client->person->city->city}}</td>
                                        </tr>
                                        <tr>
                                            <td>Marital Status</td>
                                            <td>{{$client->person->marital->marital_status}}</td>
                                        </tr>
                                        <tr>
                                            <td>Next of Kin</td>
                                            <td>@if ($client->person->nok != null){{$client->person->nok->fullname}} @endif</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>@if ($client->person->nok != null ) {{$client->person->nok->address}} @endif</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>@if ($client->person->nok != null) {{$client->person->nok->telephone}} @endif</td>
                                        </tr>
                                        <tr>
                                            <td>Guarantee Name</td>
                                            <td>{{$client->g_name}} </td>
                                        </tr>
                                        <tr>
                                            <td>Guarantee Address</td>
                                            <td>{{$client->g_address}}</td>
                                        </tr>
                                        <tr>
                                            <td>Guarantee ID Number</td>
                                            <td>{{$client->g_id_number}} </td>
                                        </tr>
                                        <tr>
                                            <td>Guarantee EcNumber</td>
                                            <td>{{$client->g_ec_number}}</td>
                                        </tr>
                                        <tr>
                                            <td>Guarantee PhoneNumber</td>
                                            <td>{{$client->g_phone}}</td>
                                        </tr>
                                        <tr>
                                            <td>Guarantee WorkPlace</td>
                                            <td>{{$client->g_work_place}}</td>
                                        </tr>
                                        <tr>
                                            <td>Guarantee Bank</td>
                                            <td> {{$client->g_bank}} </td>
                                        </tr>
                                        <tr>
                                            <td>Guarantee Account Name</td>
                                            <td>{{$client->g_bank_account_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Guarantee Account Number</td>
                                            <td>{{$client->g_account_number}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                    <div class="col-md-7">
                        @include('layouts.partials.alerts')
                        <div class="card card-accent-primary">
                            <div class="card-header">
                                <i>
                                    <strong>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#accordionApps"
                                           aria-expanded="false" class="collapsed">
                                            <strong>Loan</strong>
                                            <small>Details</small>
                                        </a>
                                    </strong>
                                </i>
                            </div>
                            <div id="accordionApps" class="panel-collapse collapse" aria-expanded="false"
                                 style="height: 0px;">
                                <div class="card-body">
                                    <div class="pull-right">
                                        <button href="#addLoan" data-toggle="modal" class="btn btn-sm btn-primary" title="Add New Loan">
                                            <i class="fa fa-money"> Add Loan</i>
                                        </button>
                                        <button href="#importLoan" data-toggle="modal" class="btn btn-sm btn-info" title="Import Old Loan">
                                            <i class="fa fa-money"> Import Loan</i>
                                        </button>
                                    </div>
                                    <br/>
                                    <br/>
                                    <div class="table-responsive">
                                        <table id="table-detail" class="table table-sm table-hover table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Product</th>
                                                <th>Principal</th>
                                                <th>AdminFee</th>
                                                <th>Balance</th>
                                                <th>Total</th>
                                                <th>Counter</th>
                                                <th>Account</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($client->loan as $s)
                                                <tr>
                                                    <td>{{$s->created_at}}</td>
                                                    <td> {{$s->product->product_name}} </td>
                                                    <td>{{$s->principal}}</td>
                                                    <td>{{$s->adminfee}}</td>
                                                    <td>{{$s->loan_balance}}</td>
                                                    <td>{{$s->total_Amount}}</td>
                                                    <td>{{$s->counter}}</td>
                                                    <td>
                                                        {{$s->account_no}}
                                                        <div class="pull-right">
                                                            <a href="" title="Print Transaction" class="text-warning">
                                                                <i class="fa fa-print"></i>
                                                            </a>
                                                            <a href="#loanTransactions" data-toggle="modal"
                                                               onclick="getLoanDetails('{{$s->id}}')" title="Top Up"
                                                               class="text-success">
                                                                <i class="fa fa-plus-circle"></i>
                                                            </a>
                                                            <a href="#addTransaction"
                                                               data-toggle="modal" title="Make Payment" onclick="getLoanDetail('{{$s->id}}', '{{$s->account_no}}','{{$s->principal}}','{{$s->loan_balance}}')"
                                                               class="text-primary">
                                                                <i class="fa fa-money"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="box-group" id="accordion">--}}
{{--                            <div class="card card-accent-primary">--}}
{{--                                <div class="card-header">--}}
{{--                                    <i>--}}
{{--                                        <strong>--}}
{{--                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse18"--}}
{{--                                               aria-expanded="false" class="collapsed">--}}
{{--                                                <strong>Payment</strong>--}}
{{--                                                <small>Details</small>--}}
{{--                                            </a>--}}
{{--                                        </strong>--}}
{{--                                    </i>--}}
{{--                                </div>--}}
{{--                                <div id="collapse18" class="panel-collapse collapse" aria-expanded="false"--}}
{{--                                     style="height: 0px;">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="pull-right">--}}
{{--                                            <a href="" data-target="#Enrol" data-toggle="modal"--}}
{{--                                               class="btn btn-info btn-sm " title="Add Student Record"><i--}}
{{--                                                        class="fa fa-plus-circle"> Enrol </i> </a>--}}
{{--                                        </div>--}}
{{--                                        <br/>--}}
{{--                                        <br/>--}}
{{--                                        <div class="table-responsive">--}}
{{--                                            <table id="table-detail" class="table table-striped table-bordered">--}}
{{--                                                <thead>--}}
{{--                                                <tr>--}}
{{--                                                    <th>Student Number</th>--}}
{{--                                                    <th></th>--}}
{{--                                                </tr>--}}
{{--                                                </thead>--}}
{{--                                                <tbody>--}}

{{--                                                </tbody>--}}
{{--                                            </table>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
                        <div class="box-group" id="accordion">
                            <div class="card card-accent-primary">
                                <div class="card-header">
                                    <i>
                                        <strong>
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"
                                               aria-expanded="false" class="collapsed">
                                                <strong>Transaction</strong>
                                                <small>Details</small>
                                            </a>
                                        </strong>
                                    </i>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse" aria-expanded="false"
                                     style="height: 0px;">
                                    <div class="card-body">
                                        <div class="pull-right">
                                            <a href="" data-target="#ALevel"
                                               onclick="getLevel('Advanced Level','{{$client->person->id}}','2')"
                                               data-toggle="modal" class="btn btn-warning btn-sm " title="Print Statement"><i
                                                        class="fa fa-print"> Print Statement </i> </a>
                                        </div>
                                        <br/>
                                        <br/>
                                        <div class="table-responsive">
                                            <table id="table-detail" class="table table-sm table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Loan Account</th>
                                                    <th>Transaction Type</th>
                                                    <th>Amount</th>
                                                    <th>Balance</th>
                                                    <th>Details</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($client->transactions as $s)
                                                    <tr>
                                                        <td>{{$s->created_at}}</td>
                                                        <td>{{$s->loan->account_no}}</td>
                                                        <td>{{$s->transactiontype->transaction_type}}</td>
                                                        <td>{{$s->Amount}}</td>
                                                        <td>{{$s->balance}}</td>
                                                        <td>{{$s->description}}
                                                            <div class="pull-right box-tools">
                                                                @if (Auth::user()->hasRole('Manager'))
                                                                    <a class="text-danger"
                                                                       href="#reverse" data-toggle="modal" onclick="getTransactionId('{{$s->id}}')"
                                                                       title="Reverse Transaction"><i class="fa fa-trash"></i>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @empty
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- /.box -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="importLoan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-cc-mastercard"> Import Loan</i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="form-horizontal" action="{{route('importLoan')}}" method="post">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" class="hidden">
                        <input type="hidden" name="transaction_type_id" value="12" class="hidden">
                        <input type="hidden"  name="rollover_status_id" value="1" class="hidden">
                        <input type="hidden"  name="loan_status_id" value="1" class="hidden">
                        <input type="hidden"  name="loan_type_id" value="1" class="hidden">
                        <input type="hidden"  name="created_at" value="{{date('Y-m-d H:i:s')}}" class="hidden">
                        <input type="hidden" name="clientid" value="{{$client->id}}" class="hidden">
                        <div class="form-group">
                            <label for="gender">Month</label>
                            <select name="counter" class="form-control input-group-lg reg_name" required>
                                <option value="" selected disabled> Month</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="4">Four</option>

                                {{--                                <option value="12">Loan Import</option>--}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender">Loan Products</label>
                            <select name="loan_product_id"
                                    class="form-control input-group-lg reg_name" required>
                                <option value="" selected disabled> Product</option>
                                @forelse($products as $product)
                                    <option value="{{$product->id}}">{{$product->product_name}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="gender">Interest Rate</label>--}}
{{--                            <input type="text" id="interest_rateO" name="interest_rate" class="form-control" readonly>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="gender">DueDate</label>--}}
{{--                            <input type="text" id="duedateO" name="duedate" class="form-control" readonly>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="gender">Allowed Max</label>--}}
{{--                            <input type="text" id="allowed_maxO" name="allowed_max" class="form-control" readonly>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="gender">Allowed Min</label>--}}
{{--                            <input type="text" id="allowed_minO" name="allowed_min" class="form-control" readonly>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label for="gender">Amount</label>
                            <input type="number"  name="principal" class="form-control"  required>
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="gender">Balance</label>--}}
{{--                            <input type="number" id="balanceN" name="loan_balance" class="form-control" required>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="gender">Admin Fee</label>--}}
{{--                            <input type="number" id="adminFeeN" name="adminfee" class="form-control" required>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="gender">Mobile Number</label>--}}
{{--                            <input type="text" id="mobile" name="mobile" class="form-control" required>--}}
{{--                        </div>--}}

                    </div>
                    <div class="modal-footer">
                        <button type="submit"  onclick="return confirm('Are you sure you want to save?')" class="btn btn-primary"><span class="fa fa-check-circle"></span> Save
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="addLoan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-cc-mastercard"> Add Loan</i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="form-horizontal" action="{{route('createLoan')}}" method="post">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <input type="hidden" id='user_id' name="user_id" value="{{Auth::user()->id}}" class="hidden">
                        <input type="hidden" id='counter' name="counter" value="0" class="hidden">
                        <input type="hidden" id='rollover_status_id' name="rollover_status_id" value="1" class="hidden">
                        <input type="hidden" id='loan_status_id' name="loan_status_id" value="1" class="hidden">
                        <input type="hidden" id='loan_type_id' name="loan_type_id" value="1" class="hidden">
                        <input type="hidden" id='created_at' name="created_at" value="{{date('Y-m-d H:i:s')}}"
                               class="hidden">
                        <input type="hidden" id='clientid' name="clientid" value="{{$client->id}}" class="hidden">
                        <div class="form-group">
                            <label for="gender">Transaction Type</label>
                            <select name="transaction_type_id" id="transaction_type_id" onchange="getTransaction()"
                                    class="form-control input-group-lg reg_name" required>
                                <option value="" selected disabled> Transaction Type</option>
                                <option value="1">Cash Disbursement</option>
                                <option value="16">Ecocash Disbursement</option>
                                <option value="9">Bank Transfer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender">Loan Products</label>
                            <select name="loan_product_id" id="loan_product_id" onchange="getProductData()"
                                    class="form-control input-group-lg reg_name" required>
                                <option value="" selected disabled> Product</option>
                                @forelse($products as $product)
                                    <option value="{{$product->id}}">{{$product->product_name}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender">Interest Rate</label>
                            <input type="text" id="interest_rateN" name="interest_rate" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="gender">DueDate</label>
                            <input type="text" id="duedate" name="duedate" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="gender">Allowed Max</label>
                            <input type="text" id="allowed_max" name="allowed_max" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="gender">Allowed Min</label>
                            <input type="text" id="allowed_min" name="allowed_min" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="gender">Amount</label>
                            <input type="number" id="principalN" name="principal" class="form-control" onfocusout="calculateNewLoanBalance()" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Balance</label>
                            <input type="number" id="balanceN" name="loan_balance" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Admin Fee</label>
                            <input type="number" id="adminFeeN" name="adminfee" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Mobile Number</label>
                            <input type="text" id="mobile" name="mobile" class="form-control" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" onclick="return confirm('Are you sure you want to save?')" class="btn btn-primary"><span class="fa fa-check-circle"></span> Save
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="loanTransactions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="post" action="{{route("topup")}}">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="modal-header">
                        <h5 class="modal-title">Topup Loan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" id='loanId' name="loanId" class="hidden">
                        {{--<input type="hidden" id='topUpadmin_fee' name="admin_fee" class="hidden">--}}
                        <input type="hidden" id='created_at' name="created_at" value="{{date('Y-m-d H:i:s')}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Account Number</label>
                                    <input type="text" id="accountNumber" name="accountNumber" class="form-control"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Loan Amount</label>
                                    <input type="number" id="loanAmount" name="loanAmount" class="form-control"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Balance</label>
                                    <input type="number" id="loanBalance" name="loanBalance" class="form-control"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <label for="gender">DueDate</label>
                                    <input type="date" id="dueDate" name="dueDate" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Interest Rate</label>
                                    <input type="number" id="interestRate" name="interestRate" class="form-control"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Product</label>
                                    <input type="text" id="loanProduct" name="loanProduct" class="form-control"
                                           readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Topup Type</label>
                                    <select name="topUpType" id="topUptransaction_type_id" onchange="hidePhone()"
                                            class="form-control input-group-lg reg_name" required>
                                        <option value="Cash">Cash</option>
                                        <option value="Bank">Bank</option>
                                        <option value="Ecocash" selected>Ecocash</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Topup Amount</label>
                                    <input type="number" id="topUpAmount" onfocusout="calculateNewBalance()"
                                           name="topUpAmount" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Admin Fee Amount</label>
                                    <input type="number" id="topUpadmin_fee" name="admin_fee" class="form-control"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <label for="gender">New Loan Amount</label>
                                    <input type="number" id="newLoanAmount" name="newLoanAmount" class="form-control"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <label for="gender">New Loan Balance</label>
                                    <input type="number" id="newLoanBalance" name="newLoanBalance" class="form-control"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Mobile Number</label>
                                    <input type="text" id="topUpMobile" name="mobile" class="form-control" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit"  onclick="return confirm('Are you sure you want to save?')" class="btn btn-success"><span class="fa fa-save"></span> Save</button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="addTransaction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-money"> Make Payment</i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="form-horizontal" action="{{route('repayment')}}" method="post">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <input type="hidden" id='idr' name="id" class="hidden">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Full Name</label>
                                    <input type="text" name="fullname" value="{{$client->person->first_name ." ".$client->person->last_name}}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="gender">National ID</label>
                                    <input type="text" name="nationalId" value="{{$client->person->nationalId}}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Loan ID</label>
                                    <input type="text" id="loanIdr" name="loanId" value="" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Loan Amount</label>
                                    <input type="text" id="loanAmountr" name="loanAmount" value="" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Balance</label>
                                    <input type="text" id="balancer" name="balance" value="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Payment Type</label>
                                    <select name="paymethodtype" id="paymethodtyper" onchange="hidePhoneNumber()" class="form-control input-group-lg reg_name" required>
                                        <option value="" selected disabled> Payment Method</option>
                                        @forelse($paymentmethods as $paymentmethod)
                                            <option value="{{$paymentmethod->id}}">{{$paymentmethod->repayment_method}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    {{--                                    <input type="text" id="paymentTyper" name="paymentType" value="" class="form-control" required>--}}
                                </div>
                                <div class="form-group">
                                    <label for="gender">Discount</label>
                                    <input type="number" id="discountr" name="discount" value=0  onfocusout="calcualeRepaymentBalance()" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Amount</label>
                                    <input type="number" id="amountr" name="amount" value="" class="form-control" onfocusout="calcualeRepaymentBalance()" required>
                                </div>

                                <div class="form-group">
                                    <label for="gender">New Balance</label>
                                    <input type="number" id="newBalancer" name="newBalance" value="" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Mobile</label>
                                    <input type="text" id="mobiler" name="mobile" value="" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" placeholder="Description....." id="desc" name="desc" ></textarea>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit"  onclick="return confirm('Are you sure you want to save?')" class="btn btn-primary"><span class="fa fa-save"></span> Save
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="modal fade" id="editClient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-street-view"> Edit Person </i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form class="form-horizontal" action="{{route('updateClient', $client->id)}}" method="post">
                    <div class="modal-body">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Firstname</label>
                                    <input type="text" name="first_name" value="{{$client->person->first_name}}"
                                           class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Surname</label>
                                    <input type="text" name="last_name" value="{{$client->person->last_name}}"
                                           class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Middlename</label>
                                    <input type="text" name="middle_name" value="{{$client->person->middle_name}}"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="gender">National ID</label>
                                    <input type="text" name="nationalId" value="{{$client->person->nationalId}}"
                                           class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Date of Birth</label>
                                    <input type="date" name="date_of_birth" value="{{$client->person->date_of_birth}}"
                                           class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select name="gender_id" id="gender_id" class="form-control input-group-lg reg_name"
                                            required>
                                        <option value="{{$client->person->gender_id}}"
                                                selected>{{$client->person->gender->gender}}</option>
                                        @forelse($genders as $m)
                                            <option value="{{$m->id}}">{{$m->gender}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Marital Status</label>
                                    <select name="marital_id" id="marital_id"
                                            class="form-control input-group-lg reg_name" required>
                                        <option value="{{$client->person->marital_status_id}}"
                                                selected>{{$client->person->marital->marital_status}}</option>
                                        @forelse($maritals as $m)
                                            <option value="{{$m->id}}">{{$m->marital_status}}</option>
                                        @empty
                                        @endforelse


                                        {{--<option value="Married">Married</option>--}}
                                        {{--<option value="Divorced">Divorced</option>--}}
                                        {{--<option value="Engaged">Engaged</option>--}}
                                        {{--<option value="Widowed">Widowed</option>--}}
                                        {{--<option value="Seperated">Seperated</option>--}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Email Address</label>
                                    <input type="email" name="email" value="{{$client->person->email}}"
                                           class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="gender">Mobile</label>
                                    <input type="text" name="mobile_no" value="{{$client->person->mobile_no}}"
                                           placeholder="263-772728637" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="gender">Address</label>
                                    <input type="text" name="address" value="{{$client->person->address}}"
                                           class="form-control">
                                </div>


                                <div class="form-group">
                                    <label for="gender">Nationality</label>
                                    <input type="text" name="country" value="{{$client->person->country}}"
                                           class="form-control">
                                </div>


                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="gender">Client No</label>
                                        <input type="text" name="clientNo" value="{{$client->clientNo}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="gender">Bank Name</label>
                                        <input type="text" name="bank_name" value="{{$client->bank_name}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="gender">Account Name</label>
                                        <input type="text" name="account_name" value="{{$client->account_name}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="gender">Account Number</label>
                                        <input type="text" name="account_number" value="{{$client->account_number}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="gender">Net Salary</label>
                                        <input type="number" name="net_salary" value="{{$client->net_salary}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="gender">Branch</label>
                                        <input type="text" name="bank_branch" value="{{$client->bank_branch}}"
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="gender">City</label>
                                    <select name="city_id" class="form-control input-group-lg reg_name">
                                        @if ($client->person->city != null)
                                            <option value="{{$client->person->city->id}}"
                                                    selected>{{$client->person->city->city}}</option>
                                        @else
                                            <option value="" selected></option>
                                        @endif
                                        @forelse($cities as $c)
                                            <option value="{{$c->id}}">{{$c->city}}</option>
                                        @empty
                                        @endforelse


                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="gender">Next of kin</label>
                                        <input type="text" name="fullname"
                                               value="{{$client->person->nok->fullname}}" class="form-control">
                                    </div>
                                </div>
                                {{--                                <div class="form-group">--}}
                                {{--                                    <div class="form-group">--}}
                                {{--                                        <label for="gender">Next of Kin Relationship</label>--}}
                                {{--                                        <input type="text"  name="userKeenRelationship" value="{{$client->person->nok['relationship']}}" class="form-control" >--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="gender">Next of Kin Phone</label>
                                        <input type="text" name="telephone"
                                               value="{{$client->person->nok->telephone}}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="gender">Next of Kin Email</label>
                                        <input type="text" name="nokEmail" value="{{$client->person->nok->email}}"
                                               class="form-control">
                                    </div>
                                </div>
                                {{--<div class="form-group">--}}
                                <div class="form-group">
                                    <label for="gender">Next of Kin Employer</label>
                                    <input type="text" name="employer"
                                           value="{{$client->person->nok->employer}}" class="form-control" required>
                                </div>
                                {{--</div>--}}
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit"  onclick="return confirm('Are you sure you want to save?')" class="btn btn-primary"><span class="fa fa-check-circle-o"></span> Save
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="reverse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Reverse Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <form class="form-horizontal" action="{{route("reverse")}}" method="post">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="transactionId" class="hiddenid">
                        {{--                            <input type="hidden" name="gender" id="gender" class="hiddenid">--}}
                        <div class="form-group">
                            <div class="col-sm-12" id="classro">
                                Are you sure you want to reverse this transaction ?
                            </div>
                        </div><!--/form-group-->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                            Yes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


