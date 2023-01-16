@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="{{route('product')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Products
                            </a>

                            <a href="{{route('createProduct')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Product
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card box-primary">
                    <div class="card-header">
                        <i class="fa fa-file">
                        <strong>Create Product</strong>
                        <small>Form</small>
                        </i>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('createProduct')}}">
                            <input class="hidden" type="hidden" name="created_by" value="{{Auth::user()->id}}">
                            <input class="hidden" type="hidden" name="is_deleted" value="0">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="gender">Product Name</label>
                                <input type="text"  name="product_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Principal Amount</label>
                                <input type="number"  name="principal_amount" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Minimum Principal Amount</label>
                                <input type="number"  name="min_principal_amount" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Maximum Principal Amount</label>
                                <input type="number"  name="max_principal_amount" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Interest Rate</label>
                                <input type="number"  name="interest_rate" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Entry Fee Rate</label>
                                <input type="number"  name="entry_fee_rate" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Entry Fee</label>
                                <input type="number"  name="entry_fee" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Late Fee</label>
                                <input type="number"  name="late_fee" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Due Date</label>
                                <select name="installment_due_day_id" id="installment_due_day_id" class="form-control input-group-lg reg_name" required>
                                    <option value="" selected>Select Due Date</option>
                                    @forelse($duedates as $staff)
                                        <option value="{{$staff->id}}">{{$staff->dueDate.' => '.$staff->Month.'/'.$staff->Year}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="switch switch-icon switch-success">
                                            <input type="checkbox" class="switch-input"  name="grace_period_on_late_repayment" required>
                                            <span class="switch-label" data-on="" data-off=""></span>
                                            <span class="switch-handle"></span>
                                        </label>  Grace Period on Late Repayments
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="switch switch-icon switch-success">
                                            <input type="checkbox" class="switch-input"  name="charge_interest_on_grace_period" required>
                                            <span class="switch-label" data-on="" data-off=""></span>
                                            <span class="switch-handle"></span>
                                        </label>  Charge Interest on Grace Period
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success pull-right">
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection
