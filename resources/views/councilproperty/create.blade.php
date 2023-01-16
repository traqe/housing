@extends('master')
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="{{route('councilproperties')}}" id="btn_show_data" class="btn btn-sm btn-primary"
                               title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>

                            <a href="{{route('createCouncilProperties')}}" id="btn_add_new_data" class="btn btn-sm btn-success"
                               title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>


                        </div>
                    </div>
                </div>
                
                <div class="card box-primary">
                    <div class="card-header">
                        <i class="fa fa-file"></i>
                        <strong>Add Property</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('createCouncilProperties')}}">
                            <input class="hidden" type="hidden" name="created_by" value="{{Auth::user()->id}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="grave">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">Address</label>
                                <input type="text" name="property_address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">Use</label>
                                <input type="text" name="property_use" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">Validity Status</label>
                                <input type="text" name="validity_status" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">Title</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">User Name</label>
                                <input type="text" name="firstname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">Surname</label>
                                <input type="text" name="surname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">National ID</label>
                                <input type="text" name="nationalid" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">DOB</label>
                                <input type="date" name="dob" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">Gender</label>
                                <input type="text" name="gender_id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">Marital_Status</label>
                                <input type="text" name="marital_id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">Mobile</label>
                                <input type="text" name="mobile" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            
                            <input type="submit" class="btn btn-success pull-right">
                        </form>
            </div>
        </div>
        </div>
    </div>
</div>

    
@endsection