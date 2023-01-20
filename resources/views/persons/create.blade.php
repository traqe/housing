@extends('master')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="pull-right">
                    <a href="{{route('persons')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                        <i class="fa fa-table"></i> Show Data
                    </a>
                    <a href="{{route('createPerson')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                        <i class="fa fa-plus-circle"></i> Add Data
                    </a>
                </div>
            </div>
        </div>

        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-file"></i>
                <strong>Create Person</strong>
                <small>Form</small>
            </div>
            <div class="card-body">

                {{--@include('layouts.partials.alerts')--}}
                <form method="post" action="{{route("createPerson")}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="gender">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Firstname</label>
                        <input type="text" name="firstname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Surname</label>
                        <input type="text" name="surname" class="form-control" required>
                    </div>
                    {{--<div class="form-group">--}}
                    {{--<label for="gender">Initials</label>--}}
                    {{--<input type="text"  name="initials"  class="form-control" >--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <label for="gender">National ID</label>
                        <input type="text" name="nationalid" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Date of Birth</label>
                        <input type="date" name="dob" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender_id" id="gender_id" class="form-control input-group-lg reg_name" required>
                            <option value="" selected>Select Gender</option>
                            <option value="1">Female</option>
                            <option value="2">Male</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="marital_status">Marital Status</label>
                        <select name="marital_id" id="marital_id" class="form-control input-group-lg reg_name" required>
                            <option value="1">Single</option>
                            <option value="2">Married</option>
                            <option value="3">Divorced</option>
                            <option value="4">Engaged</option>
                            <option value="5">Widowed</option>
                            <option value="6">Seperated</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="gender">Email Address</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="gender">Mobile</label>
                            <input type="text" name="mobile" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="gender">Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="gender">Birth Place</label>
                            <input type="text" name="birthplace" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="gender">Religion</label>
                            <input type="text" name="religion" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="gender">Nationality</label>
                            <input type="text" name="nationality" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="gender">Next of kin</label>
                            <input type="text" name="fullname" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="gender">Next of Kin Relationship</label>
                            <input type="text" name="relationship" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="gender">Next of Kin Phone</label>
                            <input type="text" name="noktelephone" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="gender">Next of Kin Email</label>
                            <input type="text" name="nokemail" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="gender">Next of Kin Address</label>
                            <input type="text" name="nokaddress" class="form-control" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa  fa-check-circle"></span> Save Person</button>
                    {{--<a href="{{route("secondary")}}" type="button" class="btn btn-warning btn-flat pull-right" style="margin-right: 5px;">--}}
                    {{--<i class="fa fa-angle-double-right"></i> Next--}}
                    {{--<a/>--}}
                </form>


            </div>
            <!-- /.box-body -->
        </div>


    </div>
</div>
@endsection