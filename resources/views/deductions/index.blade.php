@extends('master')
@section('content')


    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">

                        <a href="#ssbModal" data-toggle="modal" id="btn_show_data" class="btn btn-sm btn-primary"
                           title="Import SSB Loans">
                            <i class="fa fa-upload"></i> Import SSB / PENSIONS
                        </a>

                        {{--<a href="{{route('product')}}" id="btn_show_data" class="btn btn-sm btn-primary"--}}
                        {{--title="Show Data">--}}
                        {{--<i class="fa fa-table"></i> Show Products--}}
                        {{--</a>--}}

                        {{--<a href="{{route('createProduct')}}" id="btn_add_new_data" class="btn btn-sm btn-success"--}}
                        {{--title="Add Data">--}}
                        {{--<i class="fa fa-plus-circle"></i> Add Product--}}
                        {{--</a>--}}

                        {{--<a href="#dueDateModal" data-toggle="modal" id="btn_add_new_data" class="btn btn-sm btn-info"--}}
                        {{--title="Add Data">--}}
                        {{--<i class="fa fa-plus-circle"></i> Add DueDate--}}
                        {{--</a>--}}

                    </div>
                </div>
            </div>

            @include('layouts.partials.alerts')

            <div class="row">
                <div class="col-md-4">
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i class="fa fa-align-justify">
                                <strong>Deductions</strong>
                                <small>Table</small>
                            </i>

                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Amount</th>
                                    {{--<th>Date</th>--}}
                                    <th>EmployeeId</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($ssbs as $key=>$gender)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$gender->Amount}}</td>
                                        {{--<td>{{$gender->Date}}</td>--}}
                                        <td>{{$gender->EmployeeId}}</td>
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
                <div class="col-md-8">
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i class="fa fa-align-justify">
                                <strong>Bulawayo</strong>
                                <small>Deductions</small>
                            </i>
                            <div class="pull-right">
                                <a href="{{route('export')}}" id="btn_show_data"  target="_blank" class="btn btn-sm btn-success"
                                   title="Export Deductions">
                                    <i class="fa fa-file-excel-o"></i> Export Excel
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-sm table-striped table-bordered  table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Amount</th>
                                    {{--<th>Date</th>--}}
                                    <th>EmployeeId</th>
                                    <th>FirstName</th>
                                    <th>LastName</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($filtered as $key=>$gender)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$gender->Amount}}</td>
                                        {{--<td>{{$gender->Date}}</td>--}}
                                        <td>{{$gender->EmployeeId}}</td>
                                        <td>{{$gender->client->person->first_name}}</td>
                                        <td>{{$gender->client->person->last_name}}</td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                            <hr/>
                            <div class="pull-right">
                                <a onclick="return confirm('Are you sure you want to process ssb?')"  href="{{route('processSSB', 1)}}" type="button"  class="btn btn-sm btn-success"><i class="fa fa-angle-double-right"> PROCESS SSB</i> </a>
                                <a onclick="return confirm('Are you sure you want to process Pensions?')"  href="{{route('processSSB', 2)}}" type="button"  class="btn btn-sm btn-success"><i class="fa fa-angle-double-right"> PROCESS PENSION </i> </a>
                                <a onclick="return confirm('Are you sure you want to reset the data?')"  href="{{route('resetSSB')}}" type="button"  class="btn btn-sm btn-danger"><i class="fa fa-trash"> Reset </i> </a>

                            </div>

                        </div>

                    </div>
                </div>
            </div>


        </div>

    </div>

    {{--<div class="row">--}}
    {{--<div class="modal fade" id="deleteP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">--}}
    {{--<div class="modal-dialog modal-md" role="document">--}}
    {{--<div class="modal-content">--}}
    {{--<div class="modal-header">--}}
    {{--<h4 class="modal-title" id="myModalLabel">Delete Product</h4>--}}
    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span--}}
    {{--aria-hidden="true">&times;</span></button>--}}

    {{--</div>--}}
    {{--<form class="form-horizontal" action="{{route('deleteProduct')}}" method="post">--}}
    {{--<div class="modal-body">--}}
    {{--{{csrf_field()}}--}}
    {{--                            {{method_field('DELETE')}}--}}
    {{--<input type="hidden" name="id" id="id" class="hiddenid">--}}
    {{--                            <input type="hidden" name="gender" id="gender" class="hiddenid">--}}
    {{--<div class="form-group">--}}
    {{--<div class="col-sm-12" id="classro">--}}
    {{--Are you sure you want to delete the Product ?--}}
    {{--</div>--}}
    {{--</div><!--/form-group-->--}}
    {{--</div>--}}
    {{--<div class="modal-footer">--}}
    {{--<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>--}}
    {{--Yes--}}
    {{--</button>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="row">--}}

    {{--<div class="modal fade" id="transfer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">--}}
    {{--<div class="modal-dialog modal-md" role="document">--}}
    {{--<div class="modal-content">--}}
    {{--<div class="modal-header">--}}
    {{--<h4 class="modal-title" id="myModalLabel">Transfer Loans</h4>--}}
    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span--}}
    {{--aria-hidden="true">&times;</span></button>--}}

    {{--</div>--}}
    {{--<form class="form-horizontal" action="{{route('transferLoans')}}" method="post">--}}
    {{--<div class="modal-body">--}}
    {{--{{csrf_field()}}--}}
    {{--<div class="form-group">--}}
    {{--<label for="gender">From Product</label>--}}
    {{--<select name="tempId" id="tempId" class="form-control input-group-lg reg_name" required>--}}
    {{--<option value="" selected>Select Source Product</option>--}}
    {{--@forelse($products as $product)--}}
    {{--<option value="{{$product->id}}">{{$product->product_name}}</option>--}}
    {{--@empty--}}
    {{--@endforelse--}}
    {{--</select>--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--<label for="gender">To Product</label>--}}
    {{--<select name="productId" id="productId" class="form-control input-group-lg reg_name"--}}
    {{--required>--}}
    {{--<option value="" selected>Select Source Product</option>--}}
    {{--@forelse($products as $product)--}}
    {{--<option value="{{$product->id}}">{{$product->product_name}}</option>--}}
    {{--@empty--}}
    {{--@endforelse--}}
    {{--</select>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="modal-footer">--}}
    {{--<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>--}}
    {{--Transfer--}}
    {{--</button>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    <div class="modal fade" id="ssbModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Import SSB</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form class="form-horizontal" action="{{route('import')}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="gender">File</label>
                            <input type="file" name="file" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"><span class="fa fa-upload"></span>
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--</div>--}}
@endsection
