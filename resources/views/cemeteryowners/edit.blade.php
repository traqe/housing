@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-file"></i>
                        <strong>Cemetery Owner Info</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('updateCemeteryOwner',$cemeteryowner->id )}}">
                            <input class="hidden" type="hidden" name="updated_by" value="{{Auth::user()->id}}">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <!--
                            <div class="form-group">
                                <label for="gender">Owner ID</label>
                                <input type="text" name="owner_id" value="{{$cemeteryowner->id}}" class="form-control"
                                       required>
                            </div>
                        -->
                            <div class="form-group">
                                <label for="gender">Name</label>
                                <input type="text" name="name" value="{{$cemeteryowner->name}}" class="form-control"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Surname</label>
                                <input type="text" name="surname" value="{{$cemeteryowner->surname}}" class="form-control"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Id No</label>
                                <input type="text" name="surname" value="{{$cemeteryowner->Identity_no}}" class="form-control"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Contact</label>
                                <input type="text" name="contact" value="{{$cemeteryowner->contact}}" class="form-control"
                                       required>
                            </div>
                            <!--
                            <div class="form-group">
                                <label for="gender">Receipt No</label>
                                <input type="text" name="receipt_no" value="{{$cemeteryowner->receipt_no}}" class="form-control"
                                readonly required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Amount</label>
                                <input type="text" name="amount" value="{{$cemeteryowner->amount}}" class="form-control"
                                readonly   required>
                            </div>
                        -->
                            <div class="form-group">
                                <label for="gender">Address</label>
                                <input type="text" name="address" value="{{$cemeteryowner->address}}" class="form-control"
                                       required>
                            </div>
                            <input type="submit" class="btn btn-success pull-right">
</form>
</div>
</div>
</div>
</div>
</div>
@endsection
