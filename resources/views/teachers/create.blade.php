@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="/teachers" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>


                            <a href="/teachers/create" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>



                            <a href="" id="btn_export_data" data-url-parameter="" title="Export Data" class="btn btn-sm btn-primary btn-export-data">
                                <i class="fa fa-upload"></i> Export Data
                            </a>

                            <a href="" id="btn_import_data" data-url-parameter="" title="Import Data" class="btn btn-sm btn-primary btn-import-data">
                                <i class="fa fa-download"></i> Import Data
                            </a>
                        </div>
                    </div>
                </div>

                <form method="post" action="/teachers">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card box-primary">
                                <div class="card-header">
                                    <i class="fa fa-user-secret">
                                        <strong>Personal Details</strong>
                                        <small>Form</small>
                                    </i>
                                </div>
                                <div class="card-body">

                                    <input class="hidden" type="hidden" name="created_by" value="{{Auth::user()->id}}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input type="text"  name="firstname" placeholder="Firstname" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text"  name="surname" placeholder="Surname" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text"  name="nationalid" placeholder="National ID" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="date"  name="dob" placeholder="Date of Birth" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="gender_id" id="gender_id" class="form-control input-group-lg reg_name" required>
                                            <option value="" selected>Select Gender</option>
                                            @forelse($genders as $gender)
                                                <option value="{{$gender->id}}">{{$gender->gender}}</option>
                                            @empty
                                            @endforelse

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select name="marital_id" id="marital_id" class="form-control input-group-lg reg_name" required>
                                            <option value="" selected>Select Marital status</option>
                                            @forelse($maritals as $marital)
                                                <option value="{{$marital->id}}">{{$marital->maritalstatus}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div><!--/form-group-->

                                    <div class="form-group">
                                        <input type="text"  name="mobile" placeholder="Mobile" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text"  name="telephone" placeholder="Telephone" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Postal Address....." id="address" name="address" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Residential Address....." id="residential" name="residentialaddress" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="email"  name="email" placeholder="Email" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <input type="text"  name="religion" placeholder="Religion" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text"  name="birthplace" placeholder="Birthplace" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text"  name="nationality" placeholder="Nationality " class="form-control" required>
                                    </div>
                                    {{--<input type="submit" class="btn btn-success pull-right">--}}

                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card box-primary">
                                <div class="card-header">
                                    <i class="fa fa-street-view">
                                        <strong>Next of Kin Details</strong>
                                        <small>Form</small>
                                    </i>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="text"  name="fullname" placeholder="Fullname" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text"  name="relationship" placeholder="Relationship" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text"  name="ntelephone" placeholder="Telephone" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Postal Address....." id="naddress" name="address" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="text"  name="workphone" placeholder="Work Phone" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Work Address....." id="address" name="workaddress" required></textarea>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <div class="card box-primary">
                                <div class="card-header">
                                    <i class="fa fa-briefcase">
                                        <strong>Employment Details</strong>
                                        <small>Form</small>
                                    </i>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="text"  name="ecnumber" placeholder="Ec Number" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text"  name="position" placeholder="Position" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="department_id" id="department_id" class="form-control input-group-lg reg_name" required>
                                            <option value="" selected>Select Department</option>
                                            @forelse($departments as $department)
                                                <option value="{{$department->id}}">{{$department->department}}</option>
                                            @empty
                                            @endforelse

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text"  name="activities" placeholder="Hobbies" class="form-control" required>
                                    </div>
                                    <input type="submit" class="btn btn-success pull-right">
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </form>







                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection
