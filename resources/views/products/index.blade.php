@extends('master')
@section('content')


    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">

                        <a href="{{route('getrollover')}}" id="btn_show_data" class="btn btn-sm btn-primary"
                           title="Rollover Loans">
                            <i class="fa fa-copy"></i> Rollover Loans
                        </a>
                        <a href="#transfer" id="btn_show_data" data-toggle="modal" class="btn btn-sm btn-info"
                           title="Show Data">
                            <i class="fa fa-exchange"></i> Transfer Loans
                        </a>
                        <a href="{{route('product')}}" id="btn_show_data" class="btn btn-sm btn-primary"
                           title="Show Data">
                            <i class="fa fa-table"></i> Show Products
                        </a>

                        <a href="{{route('createProduct')}}" id="btn_add_new_data" class="btn btn-sm btn-success"
                           title="Add Data">
                            <i class="fa fa-plus-circle"></i> Add Product
                        </a>

                        <a href="#dueDateModal" data-toggle="modal" id="btn_add_new_data" class="btn btn-sm btn-info"
                           title="Add Data">
                            <i class="fa fa-plus-circle"></i> Add DueDate
                        </a>

                    </div>
                </div>
            </div>

            @include('layouts.partials.alerts')


            <div class="card card-accent-primary">
                <div class="card-header">
                    <i class="fa fa-align-justify">
                        <strong>Products</strong>
                        <small>Table</small>
                    </i>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover" id="example">
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
                            <tr>
                                <td>{{$gender->product_name}}</td>
                                <td>{{$gender->min_principal_amount}}</td>
                                <td>{{$gender->max_principal_amount}}</td>
                                <td>{{$gender->interest_rate}}</td>
                                {{--                                <td>{{$gender->installment_due_day_id }}</td>--}}
                                <td>
                                    {{$gender->duedate->dueDate}}
                                    <div class="pull-right box-tools">
                                        <a class=" text-warning"
                                           href="{{route('showProduct',$gender->id )}}"
                                           title="View Details"><i class="fa fa-eye"></i>
                                        </a>
                                        <a class="text-primary"
                                           href="{{route('editProduct',$gender->id )}}"
                                           title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <a class="text-danger"
                                           href="#deleteP" data-toggle="modal"
                                           onclick="deleteProduct('{{$gender->id}}')"
                                           title="Delete Record"><i class="fa fa-trash"></i>
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
        <div class="modal fade" id="deleteP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Delete Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>

                    </div>
                    <form class="form-horizontal" action="{{route('deleteProduct')}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            {{--                            {{method_field('DELETE')}}--}}
                            <input type="hidden" name="id" id="id" class="hiddenid">
                            {{--                            <input type="hidden" name="gender" id="gender" class="hiddenid">--}}
                            <div class="form-group">
                                <div class="col-sm-12" id="classro">
                                    Are you sure you want to delete the Product ?
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
    </div>

    <div class="row">

        <div class="modal fade" id="transfer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Transfer Loans</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>

                    </div>
                    <form class="form-horizontal" action="{{route('transferLoans')}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="gender">From Product</label>
                                <select name="tempId" id="tempId" class="form-control input-group-lg reg_name" required>
                                    <option value="" selected>Select Source Product</option>
                                    @forelse($products as $product)
                                        <option value="{{$product->id}}">{{$product->product_name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gender">To Product</label>
                                <select name="productId" id="productId" class="form-control input-group-lg reg_name"
                                        required>
                                    <option value="" selected>Select Source Product</option>
                                    @forelse($products as $product)
                                        <option value="{{$product->id}}">{{$product->product_name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>
                                Transfer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="dueDateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add Product DueDate</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>

                    </div>
                    <form class="form-horizontal" action="{{route('addDueDate')}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="gender">Due Date</label>
                                <input type="date" name="dueDate" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>
                                Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
