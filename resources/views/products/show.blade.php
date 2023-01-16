@extends('master')



@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="{{route('product')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Products
                            </a>

                            <a href="{{route('createProduct')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Product
                            </a>



{{--                            <a href="javascript:void(0)" id="btn_export_data" data-url-parameter="" title="Export Data" class="btn btn-sm btn-primary btn-export-data">--}}
{{--                                <i class="fa fa-upload"></i> Export Data--}}
{{--                            </a>--}}

{{--                            <a href="http://localhost:8000/admin/suppliers/import-data" id="btn_import_data" data-url-parameter="" title="Import Data" class="btn btn-sm btn-primary btn-import-data">--}}
{{--                                <i class="fa fa-download"></i> Import Data--}}
{{--                            </a>--}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-info-circle">
                            <strong>Product Name : {{$product->product_name}}</strong>
                        </i>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-detail" class="table table-striped">
                                <tbody>
                                <tr>
                                    <td>Principal Amount</td>
                                    <td>{{$product->principal_amount}}</td>
                                </tr>
                                <tr>
                                    <td>Minimum Principal Amount</td>
                                    <td>{{$product->min_principal_amount}}</td>
                                </tr>
                                <tr>
                                    <td>Maximum Principal Amount</td>
                                    <td>{{$product->max_principal_amount}}</td>
                                </tr>
                                <tr>
                                    <td>Interest Rate</td>
                                    <td>{{$product->interest_rate}}</td>
                                </tr>
                                <tr>
                                    <td>Entry Fee Rate</td>
                                    <td>{{$product->entry_fee_rate}}</td>
                                </tr>
                                <tr>
                                    <td>Entry Fee</td>
                                    <td>{{$product->entry_fee}}</td>
                                </tr>
                                <tr>
                                    <td>Late Fee</td>
                                    <td>{{$product->late_fee}}</td>
                                </tr>
                                <tr>
                                    <td>Grace Period on Late Payments</td>
                                    <td>{{$product->grace_period_on_late_repayment}} </td>
                                </tr>
                                <tr>
                                    <td>Due Date</td>
                                    <td>{{$product->duedate->dueDate }}</td>
                                </tr>
                                <tr>
                                    <td>Change Interest on Grace Period</td>
                                    <td>@if ($product->charge_interest_on_grace_period == 1 ) True @else False @endif</td>
                                </tr>
                                <tr>
                                    <td>Is Deleted</td>
                                    <td>@if ($product->is_deleted == 1 ) True @else False @endif</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection
