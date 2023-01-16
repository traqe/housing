@extends('master')
@section('content')
<div class="card card-accent-primary">
    <div class="card-header">
        <i class="fa fa-file"></i>
        <strong>Create Spouse</strong>
        <small>Form</small>
    </div>
    <div class="card-body">

            {{--@include('layouts.partials.alerts')--}}
            <form method="post" action="/housing/PERSONS/{{request('id')}}/addSpouse">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="gender">Title</label>
                    <input type="text"  name="title"  class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="gender">Firstname</label>
                    <input type="text"  name="name"  class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="gender">Surname</label>
                    <input type="text"  name="surname"  class="form-control" required>
                </div>
                {{--<div class="form-group">--}}
                    {{--<label for="gender">Initials</label>--}}
                    {{--<input type="text"  name="initials"  class="form-control" >--}}
                {{--</div>--}}

                <div class="form-group">
                    <label for="gender">National ID</label>
                    <input type="text"  name="nationalid"  class="form-control" required>
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
                    <div class="form-group">
                        <label for="gender">Mobile</label>
                        <input type="text"  name="mobile"  class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="gender">Address</label>
                        <input type="text"  name="address"  class="form-control" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="form-group">
                        <label for="gender">Occupation</label>
                        <input type="text"  name="occupation"  class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="gender">Income</label>
                        <input type="text"  name="income"  class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="gender">Marriage Cert No.</label>
                        <input type="text"  name="marriage_cert"  class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="gender">Date of Marriage</label>
                        <input type="date"  name="date_marriage"  class="form-control" required>
                    </div>
                </div>

                <button type="submit"  class="btn btn-primary btn-flat pull-right" ><span class="fa  fa-check-circle"></span> Save</button>
                {{--<a href="{{route("secondary")}}" type="button" class="btn btn-warning btn-flat pull-right" style="margin-right: 5px;">--}}
                    {{--<i class="fa fa-angle-double-right"></i> Next--}}
                    {{--<a/>--}}
            </form>


    </div>
    <!-- /.box-body -->
</div>

@endsection