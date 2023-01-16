@extends('master')
@section('content')


    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">
                        <a href="{{route('refunds')}}" id="btn_show_data" class="btn btn-sm btn-primary"
                           title="Show Data">
                            <i class="fa fa-table"></i> Show Products
                        </a>
                    </div>
                </div>
            </div>

            @include('layouts.partials.alerts')

            <div class="card card-accent-primary">
                <div class="card-header">
                    <i class="fa fa-align-justify">
                        <strong>Refunds</strong>
                        <small>Table</small>
                    </i>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover" id="example">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>ClientID</th>
                            <th>Account</th>
                            <th>Product</th>
                            <th>Counter</th>
                            <th>Balance</th>
                            <th>DueDate</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($loans as $gender)
                            <tr>
                                <td>{{$gender->client->person->first_name.' '.$gender->client->person->last_name}}</td>
                                <td>{{$gender->client->clientNo}}</td>
                                <td>{{$gender->account_no}}</td>
                                <td>{{$gender->product->product_name}}</td>
                                <td>{{$gender->counter}}</td>
                                <td>{{$gender->loan_balance}}</td>
                                <td>
                                    {{$gender->product->duedate->dueDate}}
                                    <div class="pull-right box-tools">
                                        <a class=" text-primary"
                                           href="#refund" data-toggle="modal" onclick="getRefundDetails('{{$gender->id}}', '{{$gender->loan_balance}}')"
                                           title="Process Refund"><i class="fa fa-money"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        @empty

                        @endforelse

                        </tbody>
                    </table>
                    <ul class="pagination">

                    </ul>
                </div>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="modal fade" id="refund" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="fa fa-money"> Process Refund</i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form class="form-horizontal" action="{{route('processRefund')}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <input type="hidden" id='idrefund' name="id" class="hidden">

                            <div class="form-group">
                                <label for="gender">Payment Type</label>
                                <select name="cmbRefundType" id="cmbRefundType" onchange="hideRefundNumber()"
                                        class="form-control input-group-lg reg_name" required>
                                    <option value="" selected disabled> Payment Method</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Ecocash">Ecocash</option>
                                    <option value="Bank Transfer">Bank Transfer</option>

                                </select>
                                {{--                                    <input type="text" id="paymentTyper" name="paymentType" value="" class="form-control" required>--}}
                            </div>
                            <div class="form-group">
                                <label for="gender">Amount</label>
                                <input type="number" id="amountRefund" name="amount" onfocusout="calcualeRepaymentBalance()" class="form-control" readonly required>
                            </div>

                            <div class="form-group">
                                <label for="gender">Mobile</label>
                                <input type="text" id="mobileRefund" name="mobile" value="" class="form-control" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Save
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </div>


@endsection
