@extends('master')
@section('content')


    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{--<div class="pull-right">--}}

                    <a href="#activeloansreport"  data-toggle="modal" id="btn_show_data"
                       class="btn btn-sm btn-primary"
                       title="Print Active Loans Report ">
                        <i class="fa fa-money"></i> Active Loans
                    </a>

                    <a href="#newClients" data-toggle="modal" id="btn_add_new_data" class="btn btn-sm btn-success"
                       title="Print New Clients Report">
                        <i class="fa fa-users"></i> New Clients
                    </a>

                    <a href="#statement" data-toggle="modal" id="btn_add_new_data" class="btn btn-sm btn-warning"
                       title="Print Client Statement">
                        <i class="fa fa-street-view"></i> Statements
                    </a>

                    <a href="#productLoans" data-toggle="modal" id="btn_add_new_data" class="btn btn-sm btn-info"
                       title="Print Product Loans">
                        <i class="fa fa-shopping-basket"></i> Product Loans
                    </a>

                    <a href="#getDefaultersReport" data-toggle="modal" id="btn_add_new_data"
                       class="btn btn-sm btn-danger"
                       title="Print Defaulters List">
                        <i class="fa fa-ban"></i> Defaulters
                    </a>

                    <a href="#transactionList" data-toggle="modal" id="btn_add_new_data" class="btn btn-sm btn-primary"
                       title="Print Transactions List">
                        <i class="fa fa-bar-chart"></i> Transactions List
                    </a>

                    <a href="{{route('getBadDebtorsReport')}}" target="_blank" id="btn_add_new_data" class="btn btn-sm btn-success"
                       title="Print Loans Officer Transactions">
                        <i class="fa fa-user-secret"></i> Bad Debtors
                    </a>

                    <a href="#paymentType" data-toggle="modal" id="btn_add_new_data" class="btn btn-sm btn-info"
                       title="Print Payments Report">
                        <i class="fa fa-credit-card"></i> Payments
                    </a>

                    <a href="#getCashAdminReport" data-toggle="modal" id="btn_add_new_data" class="btn btn-sm btn-light"
                       title="Print Admin Report">
                        <i class="fa fa-credit-card"></i> Admin
                    </a>

                    <a href="{{route('getRefundsReport')}}" id="btn_add_new_data" target="_blank"
                       class="btn btn-sm btn-warning"
                       title="Print Refunds Report">
                        <i class="fa fa-print"></i> Refunds
                    </a>

                    {{--</div>--}}
                </div>
            </div>

            {{--<div class="box-group" id="accordion">--}}
            {{--<div class="card card-accent-primary">--}}
            {{--<div class="card-header">--}}
            {{--<div class="pull-left">--}}
            {{--<i>--}}
            {{--<strong>--}}
            {{--<a data-toggle="collapse" data-parent="#accordion" href="#searchperson" aria-expanded="false" class="collapsed">--}}
            {{--<h5><strong><i class="fa fa-search"> Search Clients </i></strong></h5>--}}
            {{--</a>--}}
            {{--</strong>--}}
            {{--</i>--}}
            {{--</div>--}}

            {{--</div>--}}
            {{--<div id="searchperson" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">--}}
            {{--<div class="card-body">--}}
            {{--<form class="form-horizontal" method="get" action="{{route('findClients')}}">--}}
            {{--<div class="box-tools">--}}
            {{--<div class="input-group input-group-sm" style="width: 400px;">--}}
            {{--<select name="field" id="field" class="form-control input-group-lg reg_name" required>--}}
            {{--<option value="last_name" selected >Surname</option>--}}
            {{--<option value="first_name">FirstName</option>--}}
            {{--<option value="surname">Surname</option>--}}
            {{--<option value="email">Email</option>--}}
            {{--<option value="address">Home Address</option>--}}
            {{--<option value="mobile_no">Mobile</option>--}}
            {{--<option value="nationalId">National ID</option>--}}
            {{--<option value="clientNo">Ec Number</option>--}}
            {{--<option value="choice1">Programme</option>--}}
            {{--</select>&nbsp;&nbsp;--}}
            {{--<input type="text" name="search" class="form-control pull-right" placeholder="Value" required>--}}

            {{--<div class="input-group-btn">--}}
            {{--<button type="submit" title="search" class="btn btn-default"><i class="fa fa-search"></i></button>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--</form>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}


            {{--<div class="card card-accent-primary">--}}
            {{--<div class="card-header">--}}
            {{--<i class="fa fa-align-justify"></i>--}}
            {{--<strong>Client</strong>--}}
            {{--<small>Table</small>--}}
            {{--</div>--}}
            {{--<div class="card-body">--}}
            {{--<table class="table table-striped table-bordered table-hover ">--}}
            {{--<thead>--}}
            {{--<tr>--}}
            {{--<th>FirstName</th>--}}
            {{--<th>LastName</th>--}}
            {{--<th>NationalID</th>--}}
            {{--<th>ClientID</th>--}}
            {{--<th>Address</th>--}}
            {{--<th>Mobile</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
            {{--@if ($clients != null)--}}
            {{--@forelse($clients as $gender)--}}
            {{--<tr>--}}
            {{--<td>{{$gender->person->first_name}}</td>--}}
            {{--<td>{{$gender->person->last_name}}</td>--}}
            {{--<td>{{$gender->person->nationalId}}</td>--}}
            {{--<td>{{$gender->clientNo}}</td>--}}
            {{--<td>{{$gender->person->address}}</td>--}}
            {{--<td>--}}
            {{--{{$gender->person->mobile_no}}--}}
            {{--<div class="pull-right box-tools">--}}
            {{--<a class=" text-warning"--}}
            {{--href="{{route('showClient',$gender->id )}}"--}}
            {{--title="View Details"><i class="fa fa-eye"></i>--}}
            {{--</a>--}}
            {{--                                            <a class="text-primary"--}}
            {{--                                               href="{{route('editProduct',$gender->id )}}"--}}
            {{--                                               title="Edit Details"><i class="fa fa-pencil-square-o"></i>--}}
            {{--                                            </a>--}}
            {{--                                            <a class="text-danger"--}}
            {{--                                               href="{{route('editGender',$gender->id )}}"--}}
            {{--                                               title="Delete Record"><i class="fa fa-trash"></i>--}}
            {{--                                            </a>--}}


            {{--</div>--}}
            {{--</td>--}}
            {{--</tr>--}}

            {{--@empty--}}

            {{--@endforelse--}}
            {{--@endif--}}
            {{--</tbody>--}}
            {{--</table>--}}
            {{--<ul class="pagination">--}}

            {{--</ul>--}}
            {{--</div>--}}
            {{--</div>--}}

        </div>

    </div>

    <div class="row">
        <div class="modal fade" id="statement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Client Statement</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>

                    </div>
                    <form class="form-horizontal" action="{{route('statement')}}" target="_blank" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>EC NUMBER</label>
                                    <input type="text" name="clientNo" id="clientNo" class="form-control">
                                </div>
                            </div><!--/form-group-->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>
                                SUBMIT
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="newClients" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Client Statement</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>

                    </div>
                    <form class="form-horizontal" action="{{route('newClientReport')}}" target="_blank" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>FROM DATE</label>
                                    <input type="date" name="fromDate" id="fromDate" class="form-control">
                                </div>
                                <div class="col-sm-12">
                                    <label>TO DATE</label>
                                    <input type="date" name="toDate" id="toDate" class="form-control">
                                </div>
                            </div><!--/form-group-->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>
                                SUBMIT
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="productLoans" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Product Loans</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>

                    </div>
                    <form class="form-horizontal" action="{{route('productLoanReport')}}" target="_blank" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="gender">Loan Products</label>
                                <select name="productId"
                                        class="form-control input-group-lg reg_name" required>
                                    <option value="" selected disabled> Product</option>
                                    @forelse($products as $product)
                                        <option value="{{$product->id}}">{{$product->product_name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div><!--/form-group-->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>
                                SUBMIT
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="paymentType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Payment Type Transactions</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>

                    </div>
                    <form class="form-horizontal" action="{{route('paymentTypeReport')}}" target="_blank" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="gender">Loan Products</label>
                                <select name="methodId"
                                        class="form-control input-group-lg reg_name" required>
                                    <option value="" selected disabled> Payment Method</option>
                                    @forelse($paymentTypes as $product)
                                        <option value="{{$product->id}}">{{$product->repayment_method}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div><!--/form-group-->
                            <div class="form-group">
                                <label>FROM DATE</label>
                                <input type="date" name="fromDate" id="fromDate" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>TO DATE</label>
                                <input type="date" name="toDate" id="toDate" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>
                                SUBMIT
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="transactionList" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Transactions List</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>

                    </div>
                    <form class="form-horizontal" action="{{route('transactionlist')}}" target="_blank" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="gender">Users</label>
                                <select name="userId"
                                        class="form-control input-group-lg reg_name" required>
                                    <option value="" selected disabled> Loan Officer</option>
                                    <option value="All">All</option>
                                    @forelse($users as $product)
                                        <option value="{{$product->id}}">{{$product->username}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div><!--/form-group-->
                            <div class="form-group">
                                <label>FROM DATE</label>
                                <input type="date" name="fromDate" id="fromDate" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>TO DATE</label>
                                <input type="date" name="toDate" id="toDate" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>
                                SUBMIT
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="activeloansreport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Active Loans</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>

                    </div>
                    <form class="form-horizontal" action="{{route('activeloansreport')}}" target="_blank" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            {{--<div class="form-group">--}}
                                {{--<label for="gender">Users</label>--}}
                                {{--<select name="userId"--}}
                                        {{--class="form-control input-group-lg reg_name" required>--}}
                                    {{--<option value="" selected disabled> Loan Officer</option>--}}
                                    {{--<option value="All">All</option>--}}
                                    {{--@forelse($users as $product)--}}
                                        {{--<option value="{{$product->id}}">{{$product->username}}</option>--}}
                                    {{--@empty--}}
                                    {{--@endforelse--}}
                                {{--</select>--}}
                            {{--</div><!--/form-group-->--}}
                            <div class="form-group">
                                <label>FROM DATE</label>
                                <input type="date" name="fromDate" id="fromDate" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>TO DATE</label>
                                <input type="date" name="toDate" id="toDate" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>
                                SUBMIT
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="getDefaultersReport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Defaulters Report</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>

                    </div>
                    <form class="form-horizontal" action="{{route('getDefaultersReport')}}" target="_blank" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            {{--<div class="form-group">--}}
                                {{--<label for="gender">Users</label>--}}
                                {{--<select name="userId"--}}
                                        {{--class="form-control input-group-lg reg_name" required>--}}
                                    {{--<option value="" selected disabled> Loan Officer</option>--}}
                                    {{--<option value="All">All</option>--}}
                                    {{--@forelse($users as $product)--}}
                                        {{--<option value="{{$product->id}}">{{$product->username}}</option>--}}
                                    {{--@empty--}}
                                    {{--@endforelse--}}
                                {{--</select>--}}
                            {{--</div><!--/form-group-->--}}
                            <div class="form-group">
                                <label>FROM DATE</label>
                                <input type="date" name="fromDate" id="fromDate" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>TO DATE</label>
                                <input type="date" name="toDate" id="toDate" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>
                                SUBMIT
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="getCashAdminReport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">AdminFee Report</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>

                    </div>
                    <form class="form-horizontal" action="{{route('getCashAdminReport')}}" target="_blank" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="gender">Users</label>
                                <select name="transactionTypeId" class="form-control input-group-lg reg_name" required>
                                    <option value="" selected disabled> Admin Fee Type</option>
                                    <option value="Cash Admin fee">Cash Adminfee</option>
                                    <option value="Bank Admin fee">Bank Adminfee</option>
                                    <option value="Ecocash Admin fee">Ecocash Adminfee</option>
                                </select>
                            </div><!--/form-group-->
                            <div class="form-group">
                                <label>FROM DATE</label>
                                <input type="date" name="fromDate" id="fromDate" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>TO DATE</label>
                                <input type="date" name="toDate" id="toDate" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>
                                SUBMIT
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
