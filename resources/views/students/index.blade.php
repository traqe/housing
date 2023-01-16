@extends('master')
@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">Students</li>
    </ol>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-left">
                        <form class="form-horizontal" method="get" action="{{route('searchStudent')}}">
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 200px;">
                                    <select name="StatusID"  class="form-control input-group-lg reg_name" required>
                                        <option value="{{$st}}" selected disabled>Select Status</option>
                                        @forelse($status as $country)
                                            <option value="{{$country->VarValueN}}">{{$country->VarValueT}}</option>
                                        @empty
                                        @endforelse
                                    </select>


                                    <div class="input-group-btn">
                                        <button type="submit" title="search" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="pull-right">

                        {{--<a href="/applications" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">--}}
                        {{--<i class="fa fa-table"></i> Show Data--}}
                        {{--</a>--}}

                        {{--<a href="/applications"  id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">--}}
                        {{--<i class="fa fa-plus-circle"></i> Add Applicant--}}
                        {{--</a>--}}

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-5">
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            <strong>Students</strong>
                            <small>Table</small>
                        </div>
                        <div class="card-body">
                            <table class="table  table-bordered table-hover table-sm" id="example">
                                <thead>
                                <tr>
                                    <th>StudentID</th>
                                    <th>Surname</th>
                                    <th>FirstName</th>

                                </tr>
                                </thead>
                                <tbody>
                                @forelse($students as $staff)
                                    <tr onclick="getStudentID('{{$staff->StudentID}}', '{{route('getStudent',$staff->StudentID)}}')">
                                        <td>{{$staff->StudentID}}</td>
                                        <td>{{$staff->LastName}}</td>
                                        <td>{{$staff->FirstName}}</td>

                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                            {{--<ul class="pagination">--}}
                                {{--{{ $staffs->links() }}--}}
                            {{--</ul>--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    {{--@include('flash::message')--}}
                    @include('toast::messages')
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i class="fa fa-street-view"></i>
                            <strong>Students</strong>
                            <small>Details</small>
                            <div class="pull-right">
                                <button onclick="reset()" class="btn btn-sm btn-primary" title="Add New Applicant"><i class="fa fa-plus"></i> </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form  class="form-horizontal" action="{{route('UpdateStudent')}}" method="post" id="StaffEdit">
                                <div >
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <div class="row">
                                        <input name="StudentID" id="StudentID" hidden>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">FirstName</label>
                                                <input type="text"  name="FirstName" id="FirstName"  class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">LastName</label>
                                                <input type="text"  name="LastName"  id="LastName"   class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">MiddleName</label>
                                                <input type="text"  name="MiddleName" id="MiddleName" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Date of Birth</label>
                                                <input type="text"  onclick="changetoDate(this.id)" name="BirthDate" id="BirthDate"  class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Identification Number</label>
                                                <input type="text"  name="PassNo"  id="PassNo"  class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Birth Place</label>
                                                <input type="text"  name="BirthPlace" id="BirthPlace"  class="form-control" required >
                                            </div>
                                            {{--<div class="form-group">--}}
                                                {{--<label for="gender">Gender</label>--}}
                                                {{--<select name="Sex" id="Sex" class="form-control input-group-lg reg_name" required>--}}
                                                    {{--<option value="" selected></option>--}}
                                                    {{--@forelse($genders as $m)--}}
                                                        {{--<option value="{{$m->id}}">{{$m->gender}}</option>--}}
                                                    {{--@empty--}}
                                                    {{--@endforelse--}}

                                                    {{--<option value="1">Female</option>--}}
                                                    {{--<option value="2">Male</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="gender">Initials</label>--}}
                                                {{--<select name="Code" id="Code" class="form-control input-group-lg reg_name" required>--}}
                                                    {{--<option value="" selected></option>--}}
                                                    {{--@forelse($maritals as $m)--}}
                                                        {{--<option value="{{$m->id}}">{{$m->maritalstatus}}</option>--}}
                                                    {{--@empty--}}
                                                    {{--@endforelse--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                            <div class="form-group">
                                                <label for="gender">Parent</label>
                                                <select name="ParentID" id="ParentID" class="form-control input-group-lg reg_name" required>
                                                    <option value="" selected>Select Parent</option>
                                                    @forelse($parents as $m)
                                                        <option value="{{$m->ParentID}}">{{$m->MotherLName.' '.$m->MotherFName}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                            {{--<div class="form-group">--}}
                                                {{--<label for="gender">Relation</label>--}}
                                                {{--<input type="RelationID"  name="RelationID" id="Position"   class="form-control" required>--}}
                                            {{--</div>--}}
                                            <div class="form-group">
                                                <label for="gender">Nationality</label>
                                                <select name="NationalityID" id="NationalityID" class="form-control input-group-lg reg_name" required>
                                                    <option value="" selected>Select Country</option>
                                                    @forelse($countries as $country)
                                                        <option value="{{$country->NatID}}">{{$country->CountryName}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                {{--<input type="number"  name="NationalityID"  id="NationalityID" class="form-control" >--}}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Address</label>
                                                <input type="text"  name="Address" id="Address"  class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Religion</label>
                                                <select name="ReligionID" id="ReligionID" class="form-control input-group-lg reg_name" required>
                                                    <option value="" selected disabled>Select Status</option>
                                                    @forelse($religion as $country)
                                                        <option value="{{$country->VarValueN}}">{{$country->VarValueT}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>

                                                {{--<input type="number"  name="ReligionID" id="ReligionID"  class="form-control" >--}}
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Age</label>
                                                <input type="text"  name="Age" id="Age"  class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Disabled</label>
                                                <select name="Disabled" id="Disabled" class="form-control input-group-lg reg_name" required>

                                                        <option value="0" selected>No</option>
                                                        <option value="1">Yes</option>

                                                </select>
                                                {{--<input type="text"  name="Disabled" id="Disabled" class="form-control" >--}}
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Cell</label>
                                                <input type="text"  name="Cell" id="Cell"  class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Email</label>
                                                <input type="email"  name="Email" id="Email"  class="form-control" >
                                            </div>
                                            {{--<div class="form-group">--}}
                                                {{--<label for="gender">AdmNo</label>--}}
                                                {{--<input type="text"  name="AdmNo" id="AdmNo"  class="form-control" >--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--<label for="gender">WaitListID</label>--}}
                                                {{--<input type="number"  name="WaitListID" id="WaitListID"  class="form-control" >--}}
                                            {{--</div>--}}
                                            <div class="form-group">
                                                <label for="gender">Class</label>
                                                <input type="text"  name="Class" id="Class"  class="form-control" readonly >
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Status</label>
                                                <select name="StatusID" id="StatusID" class="form-control input-group-lg reg_name" required>
                                                    <option value="" selected disabled>Select Status</option>
                                                    @forelse($status as $country)
                                                        <option value="{{$country->VarValueN}}">{{$country->VarValueT}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    @if (Auth::user()->hasAnyRole(['Administrator','Student Records - Edit','Student Records - Admin']))
                                     <button type="submit" class="btn btn-primary"> <span class="fa fa-check-circle-o"></span> Save  </button>
                                    @endif
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

    <div class="row">
        <script>
            $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
        </script>

        {{--<div class="modal fade" id="deleteD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">--}}
        {{--<div class="modal-dialog modal-md" role="document">--}}
        {{--<div class="modal-content">--}}
        {{--<div class="modal-header">--}}

        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
        {{--<h4 class="modal-title" id="myModalLabel">Delete Data</h4>--}}
        {{--</div>--}}
        {{--<form  class="form-horizontal" action="/grades/{{0}}" method="post">--}}
        {{--<div class="modal-body">--}}
        {{--{{csrf_field()}}--}}
        {{--{{method_field('DELETE')}}--}}
        {{--<input type="hidden" name="id" id="idDepartment" class="hiddenid">--}}
        {{--<div class="form-group">--}}
        {{--<div class="col-sm-12" id="classro">--}}
        {{--Are you sure you want to delete data?--}}
        {{--</div>--}}
        {{--</div><!--/form-group-->--}}
        {{--</div>--}}
        {{--<div class="modal-footer">--}}
        {{--<button type="submit" class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> Yes</button>--}}
        {{--</div>--}}
        {{--</form>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection
