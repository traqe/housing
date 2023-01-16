@extends('master')
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="{{route('cemeteryowners')}}" id="btn_show_data" class="btn btn-sm btn-primary"
                               title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>


                            <a href="{{route('createCemeteryOwner')}}" id="btn_add_new_data" class="btn btn-sm btn-success"
                               title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>


                        </div>
                    </div>
                </div>
                <div class="card box-primary">
                    <div class="card-header">
                        <i class="fa fa-file"></i>
                        <strong>New Cemetery Owner</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('createCemeteryOwner')}}">
                            <input class="hidden" type="hidden" name="created_by" value="{{Auth::user()->id}}">
                            {{csrf_field()}}
 
                            <div class="form-group">
                                <label for="gender">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Surname</label>
                                <input type="text" name="surname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">ID No.</label>
                                <input type="text" name="Identity_no" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Contact</label>
                                <input type="text" name="contact" class="form-control" required>
                            </div>
                            <!--
                            <div class="form-group">
                                <label for="gender">Grave ID</label>
                                <select name='owner_id' id='owner_id' class="form-control input-group-lg reg_name required">
                                    <option selected disabled>Select From Available Stands</option>
                                    @forelse($graves as $grave)
                                        @if ($grave->g_status == 'Available')
                                        <option value="{{$grave->id}}">{{$grave->id}}</option>
                                        @endif
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            
                                <label for="gender">Receipt No</label>
                                <select name="receipt_no" id="receipt_no" class="receipt_no form-control input-group-lg reg_name" required>
                                    <option selected disabled>Select Receipt Number</option>
                                    @forelse($payment as $payment)
                                        @if (is_null($payment->invoiced))
                                        <option id="receipt_no" value="{{$payment->receipt_no}}">{{$payment->receipt_no}}</option>
                                        @endif
                                    @empty
                                    @endforelse
                                </select>
                            
                        
                            
                                <label for="gender">Amount</label>
                                <input type="text" id="amount" name="amount" class="amount form-control" required>
                            -->

                            <div class="form-group">
                                <label for="gender">Address</label>
                                <input type="text" name="address" class="form-control" required>
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