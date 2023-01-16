@extends('master')



@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="{{route('product')}}" id="btn_show_data" class="btn btn-sm btn-primary"
                               title="Show Data">
                                <i class="fa fa-table"></i> Show Products
                            </a>

                            <a href="{{route('createProduct')}}" id="btn_add_new_data" class="btn btn-sm btn-success"
                               title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Product
                            </a>

                        </div>
                    </div>
                </div>

                @include('layouts.partials.alerts')

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-info-circle">
                                    Due Products List
                                </i>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm table-bordered table-striped" id="example">
                                    <thead>
                                    <tr>
                                        {{--                            <th>#</th>--}}
                                        <th>Product</th>
                                        <th>MinAmount</th>
                                        <th>MaxAmount</th>
                                        <th>Interest</th>
                                        <th>DueDate</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($products as $gender)
                                        <tr onclick="getProductInfo('{{$gender->id}}', '{{$gender->product_name}}', '{{$gender->duedate->dueDate}}')">
                                            <td>{{$gender->product_name}}</td>
                                            <td>{{$gender->min_principal_amount}}</td>
                                            <td>{{$gender->max_principal_amount}}</td>
                                            <td>{{$gender->interest_rate}}</td>
                                            <td>{{$gender->duedate->dueDate}}</td>
                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-info-circle">
                                    <strong id="prodName"></strong>
                                </i>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('rolloverLoans')}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" id="productId" class="hidden">
                                    <div class="form-group">
                                        <label for="gender">Product Name</label>
                                        <input type="text" id="productName" name="productName" class="form-control"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">DueDate</label>
                                        <input type="text" id="productDueDate" name="duedate" class="form-control"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">New DueDate</label>
                                        <input type="date" name="newDueDate" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Rollover Interest</label>
                                        <input type="number" name="interest" class="form-control" required>
                                    </div>
                                    <input type="submit" value="submit" class="btn  btn-primary">
                                </form>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>


                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection
