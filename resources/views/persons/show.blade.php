@extends('master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-left">
                        <h4><i class="fa fa-user-secret"></i> {{$person->firstname.' '.$person->surname}} Details
                        </h4>
                    </div>
                    <div class="pull-right">

                        <a href="{{route('persons')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                            <i class="fa fa-table"></i> Show Data
                        </a>

                        <a href="#" id="btn_show_data" class="btn btn-sm btn-warning" title="Show Data">
                            <i class="fa fa-file-pdf-o"></i> Application
                        </a>

                        {{--<a href="{{route('createPerson')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">--}}
                        {{--<i class="fa fa-plus-circle"></i> Add Data--}}
                        {{--</a>--}}



                        {{--<a href="javascript:void(0)" id="btn_export_data" data-url-parameter="" title="Export Data" class="btn btn-sm btn-primary btn-export-data">--}}
                        {{--<i class="fa fa-upload"></i> Export Data--}}
                        {{--</a>--}}

                        {{--<a href="http://localhost:8000/admin/suppliers/import-data" id="btn_import_data" data-url-parameter="" title="Import Data" class="btn btn-sm btn-primary btn-import-data">--}}
                        {{--<i class="fa fa-download"></i> Import Data--}}
                        {{--</a>--}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i class="fa fa-street-view">
                                <strong>Personal</strong>
                                <small>Details</small>
                            </i>
                            <div class="pull-right">
                                <a href="#" data-toggle="modal" data-target="#editPerson" data-backrop="false" class="" title="Edit Personal Details">
                                    <i class="fa fa-pencil"> Edit</i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table-detail" class="table table-hover table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Firstname</td>
                                            <td>{{$person->firstname}}</td>
                                        </tr>
                                        <tr>
                                            <td>Surname</td>
                                            <td>{{$person->surname}}</td>
                                        </tr>
                                        <tr>
                                            <td>National ID</td>
                                            <td>{{$person->nationalid}}</td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td>{{$person->gender->gender}}</td>
                                        </tr>
                                        <tr>
                                            <td>Mobile</td>
                                            <td>{{$person->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{$person->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{$person->address}}</td>
                                        </tr>

                                        <tr>
                                            <td>Next of Kin</td>
                                            <td>{{$person->nok['fullname']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Relationship</td>
                                            <td>{{$person->nok['relationship']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{$person->nok['telephone']}}</td>
                                        </tr>

                                        <tr>
                                            <td>Address</td>
                                            <td>{{$person->nok['address']}}</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    {{--<div class="card card-accent-primary">--}}
                    {{--<div class="card-header">--}}
                    {{--<i class="fa fa-paperclip">--}}
                    {{--<strong>Attachments</strong>--}}
                    {{--<small>Details</small>--}}
                    {{--</i>--}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}
                    {{--<div class="table-responsive">--}}
                    {{--<table id="table-detail" class="table table-striped">--}}
                    {{--<tbody>--}}
                    {{--<tr>--}}
                    {{--<td><a href="#"> <i class="fa fa-cloud-download"> Download O Level Certificate</i></a> </td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td><a href="#"> <i class="fa fa-cloud-download"> Download A Level Certificate</i></a> </td>--}}
                    {{--</tr>--}}

                    {{--<tr>--}}
                    {{--<td><a href="#"> <i class="fa fa-cloud-download"> Download Tertiary Education Certificate</i></a> </td>--}}
                    {{--</tr>--}}

                    {{--<tr>--}}
                    {{--<td><a href="{{route('downloadSummary', $application->userIdNum)}}" target="_blank"> <i class="fa fa-cloud-download"> Download Application Summary</i></a> </td>--}}
                    {{--</tr>--}}
                    {{--</tbody>--}}
                    {{--</table>--}}
                    {{--</div>--}}

                    {{--</div>--}}
                    {{--<!-- /.box-body -->--}}
                    {{--</div>--}}
                </div>
                <div class="col-md-7">
                    @include('layouts.partials.alerts')
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i>
                                <strong>
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordionApps" aria-expanded="false" class="collapsed">
                                        <strong>Successfully Submitted</strong>
                                        <small>Applications</small>
                                    </a>
                                </strong>
                            </i>
                        </div>
                        <div id="accordionApps" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <div class="card-body">
                                <div class="pull-right">
                                    <button href="#addApp" data-toggle="modal" class="btn btn-sm btn-primary" title="Add Application">
                                        <i class="fa fa-plus"> Add Application</i>
                                    </button>

                                    <button href="#addCession" data-toggle="modal" class="btn btn-sm btn-success" title="Add Cession">
                                        <i class="fa fa-plus"> Add Cession</i>
                                    </button>
                                </div>
                                <br />
                                <br />
                                <div class="table-responsive">
                                    <table id="table-detail" class="table table-sm table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>AppNo</th>
                                                <th>Batch</th>
                                                <th>Date</th>
                                                <th>Stand Type</th>
                                                <th>Stand No</th>
                                                <th>Status</th>
                                                {{--<th>Details</th>--}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($applications as $s)
                                            <tr>
                                                <td>{{$s->id}}</td>
                                                <td>
                                                    {{$s->batch->batch}}
                                                </td>
                                                <td>{{$s->created_at}}</td>
                                                <td>{{$s->standType->type}}</td>
                                                <td>@if ($s->allocations->count() > 0) <a href="{{route('showStand', $s->allocations->first()->stand->id)}}"> {{$s->allocations->first()->stand->stand_no}}</a> @endif</td>
                                                <td>
                                                    {{$s->stage->stage}}
                                                    <div class="pull-right">
                                                        <a href="#allocate" onclick="allocate('{{$s->id}}')" data-toggle="modal" title="Allocate Stand">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a href="{{route('applications')}}" title="View Application" class="text-warning">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="card card-accent-primary">
                    <!--heading-->
                    <div class="card-header">
                        <i class="fa fa-child">
                            <strong>Spouse</strong>
                        </i>
                    </div>
                    <!--body card-->
                    <div style="height: 0px;">
                        <div class="card-body" style="background-color: white;">
                            <div class="pull-right">
                                <!--take me to a page that enables me to add a new spouse-->
                                <!--this spouse should have save and finish buttons-->
                                <a href="{{request('id')}}/addSpouse">
                                    <button class="btn btn-sm btn-primary" title="Add Spouse">
                                        <i class="fa fa-plus"> Add Spouse</i>
                                    </button>
                                </a>
                            </div>
                            @if (session('deleteSuccess'))
                            <div class="alert alert-info">
                                {{ session('deleteSuccess') }}
                            </div>
                            @endif
                            <br />
                            <br />
                            <div class="table-responsive">
                                <table id="table-detail" class="table table-sm table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>Occupation</th>
                                            <th>Income</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($spouse as $spouse)
                                        <tr>
                                            <td>{{$spouse->name}}</td>
                                            <td>
                                                {{$spouse->title}}
                                            </td>
                                            <td>{{$spouse->mobile}}</td>
                                            <td>{{$spouse->address}}</td>
                                            <td>{{$spouse->occupation}}</td>
                                            <td>
                                                {{$spouse->income}}
                                                <div class="pull-right">
                                                    <!--edit spouse-->
                                                    <a href="/housing/editSpouse/{{$spouse->id}}" onclick="" title="Edit Spouse">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <form method="POST" action="/housing/deleteSpouse/{{$spouse->id}}" style="padding-left: 0;">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                        <button style="border: 0;" type="submit" onclick="return confirm('Are you sure you want to Delete Spouse?')" title="Delete Spouse" class="text-warning">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{--<div class="card card-accent-primary">--}}
                {{--<div class="card-header">--}}
                {{--<i class="fa fa-paperclip">--}}
                {{--<strong>Attachments</strong>--}}
                {{--<small>Details</small>--}}
                {{--</i>--}}
                {{--</div>--}}
                {{--<div class="card-body">--}}
                {{--<div class="table-responsive">--}}
                {{--<table id="table-detail" class="table table-striped">--}}
                {{--<tbody>--}}
                {{--<tr>--}}
                {{--<td><a href="#"> <i class="fa fa-cloud-download"> Download O Level Certificate</i></a> </td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td><a href="#"> <i class="fa fa-cloud-download"> Download A Level Certificate</i></a> </td>--}}
                {{--</tr>--}}

                {{--<tr>--}}
                {{--<td><a href="#"> <i class="fa fa-cloud-download"> Download Tertiary Education Certificate</i></a> </td>--}}
                {{--</tr>--}}

                {{--<tr>--}}
                {{--<td><a href="{{route('downloadSummary', $application->userIdNum)}}" target="_blank"> <i class="fa fa-cloud-download"> Download Application Summary</i></a> </td>--}}
                {{--</tr>--}}
                {{--</tbody>--}}
                {{--</table>--}}
                {{--</div>--}}

                {{--</div>--}}
                {{--<!-- /.box-body -->--}}
                {{--</div>--}}
            </div>


            {{--<div class="box-group" id="accordion">--}}
            {{--<div class="card card-accent-primary">--}}
            {{--<div class="card-header">--}}
            {{--<i>--}}
            {{--<strong>--}}
            {{--<a data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" class="collapsed">--}}
            {{--<strong>Application</strong>--}}
            {{--<small>Details</small>--}}
            {{--</a>--}}
            {{--</strong>--}}
            {{--</i>--}}
            {{--</div>--}}
            {{--<div id="collapse5" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">--}}
            {{--<div class="card-body">--}}
            {{--<form method="post" action="{{route('createApplication')}}" class="form-horizontal">--}}
            {{--{{csrf_field()}}--}}
            {{--<input type="hidden" value="{{$person->userIdNum}}" name="userIdNum">--}}
            {{--<input type="hidden" value="{{$session}}" name="Session">--}}
            {{--<input type="hidden" value="{{date('Y').'-'.($appnum + 1)}}" name="applicationNum">--}}
            {{--<input type="hidden" value="Manual" name="applicationType">--}}
            {{--<input type="hidden" value="{{date('Y')}}" name="appYear">--}}
            {{--<div class="form-group">--}}
            {{--<div class="col-sm-12">--}}
            {{--<select name="EntryCriteria" id="EntryCriteria" class="form-control input-group-lg reg_name" required>--}}
            {{--<option value="" selected disabled>Entry Type</option>--}}
            {{--<option value="Normal">Normal</option>--}}
            {{--<option value="Mature">Mature</option>--}}
            {{--</select>--}}
            {{--</div>--}}
            {{--</div><!--/form-group-->--}}
            {{--<div class="form-group">--}}
            {{--<div class="col-sm-12">--}}
            {{--<select name="EntryType" id="EntryType" class="form-control input-group-lg reg_name" required>--}}
            {{--<option value="" selected disabled>Format</option>--}}
            {{--<option value="Block">Block</option>--}}
            {{--<option value="Conventional">Conventional</option>--}}
            {{--<option value="Parallel">Parallel</option>--}}
            {{--</select>--}}
            {{--</div>--}}
            {{--</div><!--/form-group-->--}}

            {{--<div class="form-group">--}}
            {{--<div class="col-sm-12">--}}
            {{--<select name="Session" id="Session" class="form-control input-group-lg reg_name" required>--}}
            {{--<option value="" selected disabled>Select Intake</option>--}}
            {{--@forelse($session as $app)--}}
            {{--<option value="{{$app->session}}">{{$app->title}}</option>--}}
            {{--@empty--}}
            {{--@endforelse--}}
            {{--</select>--}}
            {{--</div>--}}
            {{--</div><!--/form-group-->--}}


            {{--<div class="form-group">--}}
            {{--<div class="col-sm-12">--}}
            {{--<select name="C1Code" id="C1Code" class="form-control input-group-lg reg_name" required>--}}
            {{--<option value="" selected disabled>First Choice Programme</option>--}}
            {{--@forelse($courses as $su)--}}
            {{--<option value="{{$su->academicProgrammeCode}}">{{$su->academicProgrammeName}}</option>--}}
            {{--@empty--}}
            {{--@endforelse--}}
            {{--</select>--}}
            {{--</div>--}}
            {{--</div><!--/form-group-->--}}
            {{--<div class="form-group">--}}
            {{--<div class="col-sm-12">--}}
            {{--<select name="C2Code" id="C2Code" class="form-control input-group-lg reg_name" required>--}}
            {{--<option value="" selected disabled>Second Choice Programme</option>--}}
            {{--@forelse($courses as $su)--}}
            {{--<option value="{{$su->academicProgrammeCode}}">{{$su->academicProgrammeName}}</option>--}}
            {{--@empty--}}
            {{--@endforelse--}}
            {{--</select>--}}
            {{--</div>--}}
            {{--</div><!--/form-group-->--}}
            {{--<div class="form-group">--}}
            {{--<div class="col-sm-12">--}}
            {{--<input type="text"  name="Sponsor" placeholder="Sponsor"  class="form-control" required>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
            {{--<div class="col-sm-12">--}}
            {{--<label>--}}
            {{--<input type="checkbox" style="zoom:2.0;"  name="StaffMember">--}}
            {{--</label>--}}
            {{--Tick if You Are a Staff Member--}}
            {{--</div>--}}
            {{--</div><!--/form-group-->--}}

            {{--<div class="form-group">--}}
            {{--<div class="col-sm-12">--}}
            {{--<input type="text"  name="LastSchoolAttended" placeholder="Last School Attended" class="form-control" required>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<div class="col-sm-12">--}}
            {{--<input type="text"  name="FromDate" placeholder="From Date e.g. August 2010" class="form-control" required>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<div class="col-sm-12">--}}
            {{--<input type="text"  name="ToDate" placeholder="To Date e.g. March 2014" class="form-control" required>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
            {{--<div class="col-sm-12">--}}
            {{--<input type="text"  name="LastSchoolAddress"  placeholder="Last School Address" class="form-control" required>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
            {{--<div class="col-sm-12">--}}
            {{--<select name="aboutus" id="aboutus" class="form-control input-group-lg reg_name" required>--}}
            {{--<option value="" selected disabled>How did you hear about Zimbabwe School Of Mines</option>--}}
            {{--<option value="Facebook">Facebook</option>--}}
            {{--<option value="Website">Website</option>--}}
            {{--<option value="Friend">Friend</option>--}}
            {{--<option value="Outreach Programmes">Outreach Programmes</option>--}}

            {{--</select>--}}
            {{--</div>--}}
            {{--</div><!--/form-group-->--}}
            {{--<div class="form-group">--}}
            {{--<div class="col-sm-12">--}}
            {{--<button type="submit"  class="btn btn-primary btn-flat pull-right">  <span class="fa fa-check-circle"></span> Save </button>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<br/>--}}
            {{--<br/>--}}
            {{--</form>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

        </div>

    </div>

    <!-- /.box -->
</div>
</div>
</div>

<div class="modal fade" id="addApp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-book"> Add Application</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal" action="{{route('createApplication')}}" method="post">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$person->id}}" name="applicant_id">
                    <input type="hidden" value="{{Auth::user()->id}}" name="created_by">
                    {{--<input type="hidden" value="{{date('Y').'-'.($appnum + 1)}}" name="applicationNum">--}}
                    {{--<input type="hidden" value="Manual" name="applicationType">--}}
                    <input type="hidden" value="1" name="application_stage_id">

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Stand Type</label>
                            <select name="stand_type_id" class="form-control input-group-lg reg_name" required>
                                <option value="" selected disabled>Stand Type</option>
                                @forelse($standTypes as $type)
                                <option value="{{$type->id}}">{{$type->type}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <!--/form-group-->

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Batch</label>
                            <select name="batch_id" id="batch_id" class="form-control input-group-lg reg_name" required>
                                <option value="" selected disabled>Select Batch</option>
                                @forelse($batches as $app)
                                <option value="{{$app->id}}">{{$app->batch}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <!--/form-group-->

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Receipt Number</label>
                            <input type="text" name="receipt" class="form-control input-group-lg reg_name" required>
                        </div>
                    </div>
                    <!--/form-group-->

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> Save
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal fade" id="allocate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-ambulance"> Allocate Stand </i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal" action="{{route('addAllocation')}}" method="post">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" class="hidden" name="application_id" id="stand_application_id">
                    {{--<input type="hidden" id='id' name="id" class="hidden">--}}
                    {{--<input type="hidden" id='person_id' name="person_id" value="{{$person->id}}" class="hidden">--}}
                    {{--<input type="hidden" id='created_by' name="created_by" value="{{Auth::user()->id}}"--}}
                    {{--class="hidden">--}}
                    {{--<input type="hidden" id='created_at' name="created_at" value="{{\Carbon\Carbon::now()}}"--}}
                    {{--class="hidden">--}}

                    <div class="form-group">
                        <div class="table-responsive">
                            <table id="example" class="table table-sm table-hover table-bordered">
                                <thead>
                                    <tr>
                                        {{--<th>ID</th>--}}
                                        <th>Stand #</th>
                                        <th>Type</th>
                                        <th>DV Status</th>
                                        <th>Size</th>
                                        <th>Location</th>
                                        <th>Price</th>
                                        <th>Town</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($stands as $s)
                                    <tr>
                                        <td>
                                            {{$s->stand_no}}
                                        </td>
                                        <td>{{$s->type}}</td>
                                        <td>{{$s->dvp_status}}</td>
                                        <td>{{$s->size}}</td>
                                        <td>{{$s->location}}</td>
                                        <td>{{$s->price}}</td>
                                        <td>
                                            {{$s->town_city}}
                                            <div class="pull-right">
                                                {{--<form method="post" action="{{route('addAllocation' )}}">--}}
                                                <input type="hidden" class="hidden" name="created_by" value="{{Auth::user()->id}}">
                                                <input type="hidden" class="hidden" name="status" value="Allocated">

                                                {{--</form>--}}
                                                <label class="switch switch-icon switch-success">
                                                    <input type="submit" class="switch-input" name="stand_id" value="{{$s->id}}">
                                                    <span class="switch-label" data-on="" data-off=""></span>
                                                    <span class="switch-handle"></span>
                                                </label>
                                                {{--<a href="#allocate"--}}
                                                {{--title="Allocate Stand">--}}
                                                {{--<i class="fa fa-check"></i>--}}
                                                {{--</a>--}}
                                                {{--<a href="#deleteApp" onclick="deleteApp('{{$s->id}}')"--}}
                                                {{--data-toggle="modal" title="Delete Application">--}}
                                                {{--<font color="red"> <i class="fa fa-trash-o"></i></font>--}}
                                                {{--</a>--}}
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{--<div class="modal-footer">--}}
                {{--<button type="submit" class="btn btn-primary"><span class="fa fa-check-circle-o"></span> Save--}}
                {{--</button>--}}
                {{--</div>--}}
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--beneficiaries-->

{{--<div class="box-group" id="accordion">--}}
{{--<div class="card card-accent-primary">--}}
{{--<div class="card-header">--}}
{{--<i>--}}
{{--<strong>--}}
{{--<a data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" class="collapsed">--}}
{{--<strong>Application</strong>--}}
{{--<small>Details</small>--}}
{{--</a>--}}
{{--</strong>--}}
{{--</i>--}}
{{--</div>--}}
{{--<div id="collapse5" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">--}}
{{--<div class="card-body">--}}
{{--<form method="post" action="{{route('createApplication')}}" class="form-horizontal">--}}
{{--{{csrf_field()}}--}}
{{--<input type="hidden" value="{{$person->userIdNum}}" name="userIdNum">--}}
{{--<input type="hidden" value="{{$session}}" name="Session">--}}
{{--<input type="hidden" value="{{date('Y').'-'.($appnum + 1)}}" name="applicationNum">--}}
{{--<input type="hidden" value="Manual" name="applicationType">--}}
{{--<input type="hidden" value="{{date('Y')}}" name="appYear">--}}
{{--<div class="form-group">--}}
{{--<div class="col-sm-12">--}}
{{--<select name="EntryCriteria" id="EntryCriteria" class="form-control input-group-lg reg_name" required>--}}
{{--<option value="" selected disabled>Entry Type</option>--}}
{{--<option value="Normal">Normal</option>--}}
{{--<option value="Mature">Mature</option>--}}
{{--</select>--}}
{{--</div>--}}
{{--</div><!--/form-group-->--}}
{{--<div class="form-group">--}}
{{--<div class="col-sm-12">--}}
{{--<select name="EntryType" id="EntryType" class="form-control input-group-lg reg_name" required>--}}
{{--<option value="" selected disabled>Format</option>--}}
{{--<option value="Block">Block</option>--}}
{{--<option value="Conventional">Conventional</option>--}}
{{--<option value="Parallel">Parallel</option>--}}
{{--</select>--}}
{{--</div>--}}
{{--</div><!--/form-group-->--}}

{{--<div class="form-group">--}}
{{--<div class="col-sm-12">--}}
{{--<select name="Session" id="Session" class="form-control input-group-lg reg_name" required>--}}
{{--<option value="" selected disabled>Select Intake</option>--}}
{{--@forelse($session as $app)--}}
{{--<option value="{{$app->session}}">{{$app->title}}</option>--}}
{{--@empty--}}
{{--@endforelse--}}
{{--</select>--}}
{{--</div>--}}
{{--</div><!--/form-group-->--}}


{{--<div class="form-group">--}}
{{--<div class="col-sm-12">--}}
{{--<select name="C1Code" id="C1Code" class="form-control input-group-lg reg_name" required>--}}
{{--<option value="" selected disabled>First Choice Programme</option>--}}
{{--@forelse($courses as $su)--}}
{{--<option value="{{$su->academicProgrammeCode}}">{{$su->academicProgrammeName}}</option>--}}
{{--@empty--}}
{{--@endforelse--}}
{{--</select>--}}
{{--</div>--}}
{{--</div><!--/form-group-->--}}
{{--<div class="form-group">--}}
{{--<div class="col-sm-12">--}}
{{--<select name="C2Code" id="C2Code" class="form-control input-group-lg reg_name" required>--}}
{{--<option value="" selected disabled>Second Choice Programme</option>--}}
{{--@forelse($courses as $su)--}}
{{--<option value="{{$su->academicProgrammeCode}}">{{$su->academicProgrammeName}}</option>--}}
{{--@empty--}}
{{--@endforelse--}}
{{--</select>--}}
{{--</div>--}}
{{--</div><!--/form-group-->--}}
{{--<div class="form-group">--}}
{{--<div class="col-sm-12">--}}
{{--<input type="text"  name="Sponsor" placeholder="Sponsor"  class="form-control" required>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<div class="col-sm-12">--}}
{{--<label>--}}
{{--<input type="checkbox" style="zoom:2.0;"  name="StaffMember">--}}
{{--</label>--}}
{{--Tick if You Are a Staff Member--}}
{{--</div>--}}
{{--</div><!--/form-group-->--}}

{{--<div class="form-group">--}}
{{--<div class="col-sm-12">--}}
{{--<input type="text"  name="LastSchoolAttended" placeholder="Last School Attended" class="form-control" required>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<div class="col-sm-12">--}}
{{--<input type="text"  name="FromDate" placeholder="From Date e.g. August 2010" class="form-control" required>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<div class="col-sm-12">--}}
{{--<input type="text"  name="ToDate" placeholder="To Date e.g. March 2014" class="form-control" required>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<div class="col-sm-12">--}}
{{--<input type="text"  name="LastSchoolAddress"  placeholder="Last School Address" class="form-control" required>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<div class="col-sm-12">--}}
{{--<select name="aboutus" id="aboutus" class="form-control input-group-lg reg_name" required>--}}
{{--<option value="" selected disabled>How did you hear about Zimbabwe School Of Mines</option>--}}
{{--<option value="Facebook">Facebook</option>--}}
{{--<option value="Website">Website</option>--}}
{{--<option value="Friend">Friend</option>--}}
{{--<option value="Outreach Programmes">Outreach Programmes</option>--}}

{{--</select>--}}
{{--</div>--}}
{{--</div><!--/form-group-->--}}
{{--<div class="form-group">--}}
{{--<div class="col-sm-12">--}}
{{--<button type="submit"  class="btn btn-primary btn-flat pull-right">  <span class="fa fa-check-circle"></span> Save </button>--}}
{{--</div>--}}
{{--</div>--}}
{{--<br/>--}}
{{--<br/>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

</div>

</div>

<!-- /.box -->
</div>
</div>
</div>




<div class="modal fade" id="addCession" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-book"> Add Cession</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal" action="{{route('addCession')}}" method="post">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$person->id}}" name="from_person">
                    <input type="hidden" value="{{Auth::user()->id}}" name="created_by">

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Stand</label>
                            <select name="stand_id" class="form-control input-group-lg reg_name" required>
                                <option value="" selected disabled>Stand</option>
                                @forelse($applications as $s)
                                @if ($s->allocations->count() > 0)
                                <!-- @if ($s->allocations->first()->status == 'APPROVED' && $s->allocations->first()->current_status = 'CURRENT') -->
                                <option value="{{$s->allocations->first()->stand->id}}">{{'Stand No:'.$s->allocations->first()->stand->stand_no.' , Stand Address :'.$s->allocations->first()->stand->address.' , Stand Size:'.$s->allocations->first()->stand->size}}</option>
                                <!-- @endif -->
                                @endif
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <!--/form-group-->

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Beneficiary</label>
                            <select name="to_person" class="form-control input-group-lg reg_name" required>
                                <option value="" selected disabled>Beneficiary</option>
                                @forelse($people as $p)
                                @if ($p->id != $person->id)
                                <option value="{{$p->id}}">{{$p->firstname.' '.$p->surname.' '.$p->nationalid}}</option>
                                @endif
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <!--/form-group-->



                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Reason</label>
                            <input type="text" name="reason" class="form-control input-group-lg reg_name" required>
                        </div>
                    </div>
                    <!--/form-group-->

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Witness</label>
                            <input type="text" name="witness" class="form-control input-group-lg reg_name" required>
                        </div>
                    </div>
                    <!--/form-group-->

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> Save
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


{{--<div class="modal fade" id="Enrol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
{{--<div class="modal-dialog modal-md" role="document">--}}
{{--<div class="modal-content">--}}
{{--<div class="modal-header">--}}
{{--<h5 class="modal-title"><i class="fa fa-briefcase"> Enrol Existing Student </i> </h5>--}}
{{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--<span aria-hidden="true">×</span>--}}
{{--</button>--}}
{{--</div>--}}
{{--<form class="form-horizontal" action="{{route('enrolPerson')}}" method="post">--}}
{{--<div class="modal-body">--}}
{{--{{csrf_field()}}--}}
{{--<input type="hidden" id ='id' name="id" class="hidden">--}}
{{--<input type="hidden" id ='person_id' name="person_id" value="{{$person->id}}" class="hidden">--}}
{{--<input type="hidden" id ='created_by' name="created_by" value="{{Auth::user()->id}}" class="hidden">--}}
{{--<input type="hidden" id ='created_at' name="created_at" value="{{\Carbon\Carbon::now()}}" class="hidden">--}}

{{--<div class="form-group">--}}
{{--<label for="gender">Student Number</label>--}}
{{--<input type="text"  name="studentnumber" class="form-control" >--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="gender">Address</label>--}}
{{--<input type="text"  name="address" class="form-control" required>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="gender">Position</label>--}}
{{--<input type="text"  name="occupation" class="form-control" required>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<label for="gender">Representative</label>--}}
{{--<input type="text"  name="hr" class="form-control" required>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="gender">Representative Cell</label>--}}
{{--<input type="text"  name="hr_cell" class="form-control" required>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="gender">Representative Email</label>--}}
{{--<input type="text"  name="hr_email" class="form-control" required>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="modal-footer">--}}
{{--<button type="submit" class="btn btn-primary"> <span class="fa fa-check-circle-o"></span> Save  </button>--}}
{{--</div>--}}
{{--</form>--}}
{{--</div>--}}
{{--<!-- /.modal-content -->--}}
{{--</div>--}}
{{--<!-- /.modal-dialog -->--}}
{{--</div>--}}

{{--<div class="modal fade" id="addWork" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
{{--<div class="modal-dialog modal-md" role="document">--}}
{{--<div class="modal-content">--}}
{{--<div class="modal-header">--}}
{{--<h5 class="modal-title"><i class="fa fa-briefcase"> Work Expirience </i> </h5>--}}
{{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--<span aria-hidden="true">×</span>--}}
{{--</button>--}}
{{--</div>--}}
{{--<form class="form-horizontal" action="{{route('createWork')}}" method="post">--}}
{{--<div class="modal-body">--}}
{{--{{csrf_field()}}--}}
{{--<input type="hidden" id ='id' name="id" class="hidden">--}}
{{--<input type="hidden" id ='person_id' name="person_id" value="{{$person->id}}" class="hidden">--}}
{{--<input type="hidden" id ='created_by' name="created_by" value="{{Auth::user()->id}}" class="hidden">--}}
{{--<input type="hidden" id ='created_at' name="created_at" value="{{\Carbon\Carbon::now()}}" class="hidden">--}}

{{--<div class="form-group">--}}
{{--<label for="gender">Employer</label>--}}
{{--<input type="text"  name="employer" class="form-control" required>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="gender">Address</label>--}}
{{--<input type="text"  name="address" class="form-control" required>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="gender">Position</label>--}}
{{--<input type="text"  name="occupation" class="form-control" required>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<label for="gender">Representative</label>--}}
{{--<input type="text"  name="hr" class="form-control" required>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="gender">Representative Cell</label>--}}
{{--<input type="text"  name="hr_cell" class="form-control" required>--}}
{{--</div>--}}
{{--<div class="form-group">--}}
{{--<label for="gender">Representative Email</label>--}}
{{--<input type="text"  name="hr_email" class="form-control" required>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="modal-footer">--}}
{{--<button type="submit" class="btn btn-primary"> <span class="fa fa-check-circle-o"></span> Save  </button>--}}
{{--</div>--}}
{{--</form>--}}
{{--</div>--}}
{{--<!-- /.modal-content -->--}}
{{--</div>--}}
{{--<!-- /.modal-dialog -->--}}
{{--</div>--}}

<div class="modal fade" id="editPerson" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-street-view"> Edit Person </i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal" action="{{route('updatePerson',$person->id)}}" method="post">
                <div class="modal-body">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Title</label>
                                <input type="text" name="title" value="{{$person->title}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Firstname</label>
                                <input type="text" name="firstname" value="{{$person->firstname}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Surname</label>
                                <input type="text" name="surname" value="{{$person->surname}}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="gender">National ID</label>
                                <input type="text" name="nationalid" value="{{$person->nationalid}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Date of Birth</label>
                                <input type="date" name="dob" value="{{$person->dob}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender_id" id="gender_id" class="form-control input-group-lg reg_name" required>
                                    <option value="{{$person->gender_id}}" selected disabled>{{$person->gender->gender}}</option>
                                    @forelse($genders as $gender)
                                    <option value="{{$gender->id}}">{{$gender->gender}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gender">Marital Status</label>
                                <select name="marital_id" id="marital_id" class="form-control input-group-lg reg_name" required>
                                    <option value="{{$person->marital_id}}" selected disabled>{{$person->marital->maritalstatus}}</option>
                                    @forelse($maritals as $gender)
                                    <option value="{{$gender->id}}">{{$gender->maritalstatus}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gender">Email Address</label>
                                <input type="email" name="email" value="{{$person->email}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Mobile</label>
                                    <input type="text" name="mobile" value="{{$person->mobile}}" placeholder="263-772728637" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Address</label>
                                    <input type="text" name="address" value="{{$person->address}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Birth Place</label>
                                    <input type="text" name="birthplace" value="{{$person->birthplace}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Religion</label>
                                    <input type="text" name="religion" value="{{$person->religion}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Nationality</label>
                                    <input type="text" name="nationality" value="{{$person->nationality}}" class="form-control">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Next of kin</label>
                                    <input type="text" name="fullname" value="{{$person->nok['fullname']}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Next of Kin Relationship</label>
                                    <input type="text" name="relationship" value="{{$person->nok['relationship']}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Next of Kin Phone</label>
                                    <input type="text" name="noktelephone" value="{{$person->nok['telephone']}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Next of Kin Email</label>
                                    <input type="text" name="nokemail" value="{{$person->nok['email']}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="gender">Next of Kin Address</label>
                                    <input type="text" name="nokaddress" value="{{$person->nok->address}}" class="form-control" required>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle-o"></span> Save
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    function allocate(id) {
        console.log('My application id is ' + id)
        $('#stand_application_id').val(id);
    }
</script>

@endsection