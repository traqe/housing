@extends('master')
@section('content')


<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <div class="pull-left">
                    <h3><i class="fa fa-file-pdf-o"> Cessions</i></h3>
                </div>
                <div class="pull-right">
                    <a href="{{route('cessions')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                        <i class="fa fa-table"></i> Show Data
                    </a>

                </div>
            </div>
        </div>
        <div class="box-group" id="accordion">
            <div class="card card-accent-primary">
                <div class="card-header">
                    <div class="pull-left">
                        <i>
                            <strong>
                                <a data-toggle="collapse" data-parent="#accordion" href="#searchperson" aria-expanded="false" class="collapsed">
                                    <h5><strong><i class="fa fa-search"> Search for Cessions </i></strong></h5>
                                </a>
                            </strong>
                        </i>
                    </div>
                    {{--<div class="pull-right">--}}
                    {{--<a href="{{route('applications')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">--}}
                    {{--<i class="fa fa-table"></i> Show Data--}}
                    {{--</a>--}}
                    {{--<a href="{{route('createApplication')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">--}}
                    {{--<i class="fa fa-plus-circle"></i> Add Data--}}
                    {{--</a>--}}

                    {{--</div>--}}

                </div>
                <div id="searchperson" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="card-body">
                        <form class="form-horizontal" method="get" action="{{route('findApplications')}}">
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 400px;">
                                    <select name="field" id="field" class="form-control input-group-lg reg_name" required>
                                        <option value="batch_id" selected>Batch Number</option>
                                        <option value="standNo">Stand Number</option>
                                        <option value="receipt">Receipt Number</option>
                                        <option value="firstname">FirstName</option>
                                        <option value="surname">SurName</option>

                                    </select>&nbsp;&nbsp;
                                    <input type="text" name="search" class="form-control pull-right" placeholder="Search" required>

                                    <div class="input-group-btn">
                                        <button type="submit" title="search" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card card-accent-primary">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        <strong>Cessions</strong>
                        <small>Table</small>
                    </div>
                    <div class="card-body">
                        @include('layouts.partials.alerts')
                        <form class="form-horizontal" action="{{route('updateCession')}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 400px;">

                                    <select name="status" id="status" class="form-control input-group-lg reg_name" required>
                                        <option value="APPROVED" selected>APPROVE</option>
                                        {{--<option value="APPROVE">APPROVE </option>--}}
                                        <option value="DECLINED">DECLINE</option>
                                    </select>&nbsp;&nbsp;
                                    {{--<input type="text" name="search" class="form-control pull-right" placeholder="Search" required>--}}

                                    <div class="input-group-btn">

                                        <button type="submit" title="search" class="btn btn-primary"><i class="fa fa-save"> Save Changes</i></button>
                                    </div>
                                </div>
                            </div>
                            <br>


                            <table class="table  table-bordered table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Stand</th>
                                        <th>StandType</th>
                                        <th>Reason</th>
                                        <th>Witness</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($cessions as $staff)
                                    <tr onclick="getApplicantID('{{$staff->WaitListID}}', '{{route('getApplicant',$staff->WaitListID)}}')">
                                        <td>{{$staff->owner->firstname.' '.$staff->owner->surname}}</td>
                                        <td>{{$staff->beneficiary->firstname.' '.$staff->beneficiary->surname}}</td>
                                        <td>{{$staff->stand->stand_no}}</td>
                                        <td>{{$staff->stand->type}}</td>
                                        <td>{{$staff->reason}}</td>
                                        <td>{{$staff->witness}}</td>
                                        <td>
                                            {{$staff->status}}
                                            <div class="pull-right box-tools">
                                                <a class="text-warning" href="{{route('showCession', $staff->id)}}" title="View Details"><i class="fa fa-eye"></i>
                                                </a>&nbsp;&nbsp;


                                                <label class="switch switch-icon switch-primary">
                                                    <input type="checkbox" class="switch-input" name="id[]" value="{{$staff->id}}">
                                                    <span class="switch-label" data-on="" data-off=""></span>
                                                    <span class="switch-handle"></span>
                                                </label>

                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>

                        </form>

                    </div>
                </div>
            </div>
            {{--<div class="col-md-7">--}}
            {{--@include('flash::message')--}}
            {{--@include('toast::messages')--}}
            {{--<div class="card card-accent-primary">--}}
            {{--<div class="card-header">--}}
            {{--<i class="fa fa-street-view"></i>--}}
            {{--<strong>Applicant</strong>--}}
            {{--<small>Details</small>--}}
            {{--<div class="pull-right">--}}
            {{--<button onclick="reset()" class="btn btn-sm btn-primary" title="Add New Applicant"><i class="fa fa-plus"></i> </button>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="card-body">--}}
            {{--<form class="form-horizontal" action="{{route('UpdateApplicant')}}" method="post" id="StaffEdit">--}}
            {{--<div >--}}
            {{--{{csrf_field()}}--}}
            {{--{{method_field('PUT')}}--}}
            {{--<div class="row">--}}
            {{--<input name="WaitListID" id="WaitListID" hidden>--}}
            {{--<input name="IncCensus" id="IncCensus" value="1" hidden>--}}
            {{--<input name="StudType" id="StudType" value="1" hidden>--}}
            {{--<input name="DebitOrder" id="DebitOrder" value="0" hidden>--}}
            {{--<input name="RelationID" id="RelationID" value="1" hidden>--}}
            {{--<input name="LivingWithID" id="LivingWithID" value="7" hidden>--}}
            {{--<input name="Gender2" id="Gender2" value="M" hidden>--}}
            {{--<input name="Gender" id="Gender" value="1" hidden>--}}
            {{--<input name="UpdatedOn" id="UpdatedOn" value="{{\Carbon\Carbon::now()}}" hidden>--}}
            {{--<input name="StatusDate" id="StatusDate" value="{{\Carbon\Carbon::now()}}" hidden>--}}
            {{--<input name="EntryDate" id="EntryDate" value="{{\Carbon\Carbon::now()}}" hidden>--}}
            {{--<input name="UpdatedBy" id="UpdatedBy" value="{{Auth::user()->name}}" hidden>--}}
            {{--<div class="col-md-6">--}}
            {{--<div class="form-group">--}}
            {{--<label for="gender">FirstName</label>--}}
            {{--<input type="text"  name="FirstName" id="FirstName"  class="form-control" required>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<label for="gender">LastName</label>--}}
            {{--<input type="text"  name="LastName"  id="LastName"   class="form-control" required>--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
            {{--<label for="gender">MiddleName</label>--}}
            {{--<input type="text"  name="MiddleName" id="MiddleName" class="form-control" >--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<label for="gender">Application Date</label>--}}
            {{--<input type="text"  name="ApplDate" id="ApplDate"  placeholder="YYYY-MM-DD" class="form-control" required>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<label for="gender">Parent</label>--}}
            {{--<select name="ParentID" id="ParentID" class="form-control input-group-lg reg_name" required>--}}
            {{--<option value="" selected>Select Parent</option>--}}
            {{--@forelse($parents as $m)--}}
            {{--<option value="{{$m->ParentID}}">{{$m->MotherLName.' '.$m->MotherFName}}</option>--}}
            {{--@empty--}}
            {{--@endforelse--}}
            {{--</select>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<label for="gender">Date of Birth</label>--}}
            {{--<input type="text"  name="BirthDate" id="BirthDate" placeholder="YYYY-MM-DD" class="form-control" required>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<label for="gender">Birth/ID Number</label>--}}
            {{--<input type="text"  name="PassNo"  id="PassNo"  class="form-control" >--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<label for="gender">Birth Place</label>--}}
            {{--<input type="text"  name="BirthPlace" id="BirthPlace"  class="form-control" required >--}}
            {{--</div>--}}
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

            {{--<div class="form-group">--}}
            {{--<label for="gender">Relation</label>--}}
            {{--<input type="RelationID"  name="RelationID" id="Position"   class="form-control" required>--}}
            {{--</div>--}}

            {{--</div>--}}
            {{--<div class="col-md-6">--}}
            {{--<div class="form-group">--}}
            {{--<label for="gender">Address</label>--}}
            {{--<input type="text"  name="Address" id="Address"  class="form-control" required>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<label for="gender">ReligionID</label>--}}
            {{--<input type="number"  name="ReligionID" id="ReligionID"  class="form-control" >--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<label for="gender">Previous School</label>--}}
            {{--<input type="text"  name="PrevSchools" id="PrevSchools"  class="form-control" >--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<label for="gender">Grade</label>--}}
            {{--<select name="StudYear" id="StudYear" class="form-control input-group-lg reg_name" required>--}}
            {{--<option value="" selected>Select Grade</option>--}}
            {{--@forelse($grades as $country)--}}
            {{--<option value="{{$country->StudYear}}">{{$country->StudYear}}</option>--}}
            {{--@empty--}}
            {{--@endforelse--}}
            {{--</select>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<label for="gender">Status</label>--}}
            {{--<select name="StatusID" id="StatusID" class="form-control input-group-lg reg_name" required>--}}
            {{--<option value="" selected>Select Status</option>--}}
            {{--@forelse($appStatus as $country)--}}
            {{--<option value="{{$country->StatusID}}">{{$country->StatusName}}</option>--}}
            {{--@empty--}}
            {{--@endforelse--}}
            {{--</select>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<label for="gender">Cell</label>--}}
            {{--<input type="text"  name="Cell" id="Cell"  class="form-control" >--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<label for="gender">Email</label>--}}
            {{--<input type="email"  name="Email" id="Email"  class="form-control" >--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<label for="gender">Admission #</label>--}}
            {{--<input type="text"  name="AdmNo" id="AdmNo"  class="form-control" >--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<label for="gender">Nationality</label>--}}
            {{--<select name="NationalityID" id="NationalityID" class="form-control input-group-lg reg_name" required>--}}
            {{--<option value="" selected>Select Country</option>--}}
            {{--@forelse($countries as $country)--}}
            {{--<option value="{{$country->NatID}}">{{$country->CountryName}}</option>--}}
            {{--@empty--}}
            {{--@endforelse--}}
            {{--</select>--}}
            {{--<input type="number"  name="NationalityID"  id="NationalityID" class="form-control" >--}}
            {{--</div>--}}

            {{-- <div class="form-group">--}}
            {{--<label for="gender">Previous School</label>--}}
            {{--<input type="text"  name="PrevSchools" id="PrevSchools"  class="form-control" >--}}
            {{--</div> --}}

            {{--</div>--}}

            {{--</div>--}}

            {{--</div>--}}
            {{--<div class="modal-footer">--}}
            {{--<button type="submit" class="btn btn-primary"> <span class="fa fa-check-circle-o"></span> Save  </button>--}}
            {{--</div>--}}
            {{--</form>--}}

            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
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
    {{--<form class="form-horizontal" action="/grades/{{0}}" method="post">--}}
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