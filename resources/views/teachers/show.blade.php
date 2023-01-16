@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="pull-right">

                                <a href="/teachers" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                    <i class="fa fa-table"></i> Show Data
                                </a>
                                <a href="/teachers/create" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                                    <i class="fa fa-plus-circle"></i> Add Data
                                </a>

                                {{--<a href="#" id="btn_export_data" data-url-parameter="" title="Export Data" class="btn btn-sm btn-primary btn-export-data">--}}
                                    {{--<i class="fa fa-upload"></i> Export Data--}}
                                {{--</a>--}}
                                {{--<a href="#" id="btn_import_data" data-url-parameter="" title="Import Data" class="btn btn-sm btn-primary btn-import-data">--}}
                                    {{--<i class="fa fa-download"></i> Import Data--}}
                                {{--</a>--}}
                            </div>
                        </div>
                    </div>
                </div>

            <div class="col-md-4 ">
                <!-- Profile Image -->
                <div class="card card-accent-primary" >
                    <div class="card-body">
                        {{--<div class="avatar">--}}
                            {{--<img src="http://localhost:8000/img/avatars/1.jpg" style="alignment: center" class="img-circle img-responsive center-block thumb" alt="admin@bootstrapmaster.com">--}}
                            {{--<span class="avatar-status badge-success"></span>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-12 text-center">--}}
                        {{--<img class="img-circle img-responsive center-block thumb" src="/img/user4-128x128.jpg"  alt="No Image"><div class="photo-edit">--}}
                        {{--<a class="photo-edit-icon" href="#photoup" title="Change Profile Picture" data-toggle="modal" data-target="#photoup"><i class="fa fa-pencil"></i></a></div>--}}
                        {{--</div>--}}
                        <h3 class="profile-username text-center">{{$person->LastName. ' '. $person->FirstName}}</h3>
                        <p class="text-muted text-center"></p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Code</b> <a class="pull-right">{{$person->Code}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Position</b> <a class="pull-right">{{$person->Position}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Department</b> <a class="pull-right">{{$person->Depart}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Comments</b> <a class="pull-right">{{$person->Comments}}</a>
                            </li>

                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-8">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link " data-toggle="tab" href="#home4" role="tab" aria-controls="home"><i class="fa fa-street-view"></i> Personal Details &nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile"><i class="fa fa-briefcase"></i> Employment Details &nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#messages4" role="tab" aria-controls="messages"><i class="fa fa-user-secret"></i> Next of Kin Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#cursubjects" role="tab" aria-controls="messages"><i class="fa fa-book"></i> Current Subjects</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane " id="home4" role="tabpanel">
                        <div class="card card-accent-primary">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Firstname </th>
                                            <td>{{$person->FirstName}}</td>
                                        </tr>
                                        <tr>
                                            <th>Surname </th>
                                            <td>{{$person->LastName}}</td>
                                        </tr>
                                        <tr>
                                            <th>National ID </th>
                                            <td>{{$person->ID}}</td>
                                        </tr>
                                        <tr>
                                            <th>Gender </th>
                                            <td>{{($person->Sex == 1 ? 'Male' : 'Female')}}</td>
                                        </tr>
                                        <tr>
                                            <th>Telephone </th>
                                            <td>{{$person->PhoneWork}}</td>
                                        </tr>
                                        <tr>
                                            <th>Date of Birth </th>
                                            <td>{{$person->Birth}}</td>
                                        </tr>
                                        <tr>
                                            <th>Mobile </th>
                                            <td>{{$person->Cell}}</td>
                                        </tr>
                                        {{--<tr>--}}
                                            {{--<th>Email </th>--}}
                                            {{--<td>{{$person->email}}</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<th>Address </th>--}}
                                            {{--<td>{{$person->address}}</td>--}}
                                        {{--</tr>--}}

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile4" role="tabpanel">
                        <div class="box box-primary">
                            <div class="card card-accent-primary">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Code </th>
                                                <td>{{$person->Code}}</td>
                                            </tr>
                                            <tr>
                                                <th>Department </th>
                                                <td>{{$person->Depart}}</td>
                                            </tr>
                                            <tr>
                                                <th>Position</th>
                                                <td>{{$person->Position}}</td>
                                            </tr>
                                            <tr>
                                                <th>Reports To</th>
                                                <td>@if ($rep != null){{$rep->LastName.' '.$rep->FirstName.' '.$rep->StaffID}}@endif</td>
                                            </tr>
                                            <tr>
                                                <th>Activities </th>
                                                <td>{{$person->Comments}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="messages4" role="tabpanel">
                        <div class="card card-accent-primary">
                            <div class="card-body">
                                <div class="table-responsive">
                                    {{--<table class="table">--}}
                                        {{--<tr>--}}
                                            {{--<th>Fullname </th>--}}
                                            {{--<td>{{$person->nok->fullname}}</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<th>Relationship </th>--}}
                                            {{--<td>{{$person->nok->relationship}}</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<th>Telephone</th>--}}
                                            {{--<td>{{$person->nok->telephone}}</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<th>Address </th>--}}
                                            {{--<td>{{$person->nok->address}}</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<th>Work Phone </th>--}}
                                            {{--<td>{{$person->nok->workphone}}</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<th>Work Address </th>--}}
                                            {{--<td>{{$person->nok->workaddress}}</td>--}}
                                        {{--</tr>--}}
                                    {{--</table>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane active" id="cursubjects" role="tabpanel">
                        <div class="card card-accent-primary">
                            <div class="card-header">
                                <i class="fa fa-book">
                                    <strong> {{$person->LastName.' '.$person->FirstName}} Assigned Subjects</strong>
                                    <small>Table</small>
                                </i>
                                <div class="pull-right">
                                    {{--<button data-toggle="modal" data-target="#subjectteacher" class="btn btn-primary btn-sm"title="Add Subject to Class">--}}
                                        {{--<i class="fa fa-plus-square"> Add</i>--}}
                                    {{--</button>--}}
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                {{--<table class="table table-striped table-bordered table-hover">--}}
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th>#</th>--}}
                                        {{--<th>Subject</th>--}}
                                        {{--<th>Class</th>--}}
                                        {{--<th>Year</th>--}}
                                        {{--<th>Term</th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--<tbody>--}}
                                    {{--@forelse($subjects as $subject)--}}
                                        {{--<tr>--}}
                                            {{--<td>{{$subject->id}}</td>--}}
                                            {{--<td>{{$subject->subject}}</td>--}}
                                            {{--<td>{{$subject->grade}}</td>--}}
                                            {{--<td>{{$subject->year}}</td>--}}
                                            {{--<td>--}}
                                                {{--{{$subject->term}}--}}
                                                {{--<div class="pull-right box-tools">--}}

                                                    {{--<a data-toggle="modal"  onclick="getDepartment('{{$person->id}}')"  class="btn-sm btn btn-danger"--}}
                                                       {{--href="#deleteD"--}}
                                                       {{--title="Delete"><i class="fa fa-trash-o"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<a data-toggle="modal"  onclick="getDepartment('{{$person->id}}')"  class="btn-sm btn btn-success"--}}
                                                       {{--href="#deleteD"--}}
                                                       {{--title="Create Assessment"><i class="fa fa-book"></i>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}

                                    {{--@empty--}}

                                    {{--@endforelse--}}

                                    {{--</tbody>--}}
                                {{--</table>--}}
                                {{--<ul class="pagination">--}}
                                    {{--{{ $subjects->links() }}--}}

                                {{--</ul>--}}

                                <div class="box-group" id="accordion">
                                    {{--@forelse($subjects as $subject)--}}
                                        {{--<div class="card card-accent-secondary">--}}
                                            {{--<div class="card-header">--}}
                                                {{--<i class="fa fa-book">--}}
                                                    {{--<strong>--}}
                                                        {{--<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$subject->id}}" aria-expanded="false" class="collapsed">--}}
                                                            {{--{{$subject->year}} {{$subject->term}} {{$subject->subject}}, {{$subject->grade}}--}}
                                                        {{--</a>--}}
                                                    {{--</strong>--}}
                                                    {{--<small>Table</small>--}}
                                                {{--</i>--}}
                                                {{--<div class="pull-right">--}}
                                                    {{--<button data-toggle="modal" data-target="#subjectteacher" class="btn btn-success btn-sm"title="create assessment">--}}
                                                    {{--<i class="fa fa-plus-square"> Add</i>--}}
                                                    {{--</button>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div id="collapse{{$subject->id}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">--}}
                                                {{--<div class="card-body">--}}
                                                    {{--<div class="pull-right">--}}
                                                        {{--<a href="{{route('allmarks', [$subject->grade_id, $subject->subject_id])}}"   class="btn btn-success btn-sm" title="Capture Exam">--}}
                                                            {{--<i class="fa fa-book"> Exam</i>--}}
                                                        {{--</a>--}}
                                                        {{--<button data-toggle="modal" data-target="#addAssessment" onclick="getAssessmentDetails('{{$subject->subject_id}}', '{{$subject->grade_id}}','{{$subject->subject}}', '{{$subject->grade}}')" class="btn btn-info btn-sm"title="create assessment">--}}
                                                            {{--<i class="fa fa-plus-square"> Add</i>--}}
                                                        {{--</button>--}}
                                                    {{--</div>--}}

                                                    {{--<br/>--}}
                                                    {{--<br/>--}}

                                                    {{--<table class="table table-striped table-bordered">--}}
                                                        {{--<thead>--}}
                                                        {{--<tr>--}}
                                                            {{--<th>#</th>--}}
                                                            {{--<th>Title</th>--}}
                                                            {{--<th>Subject</th>--}}
                                                            {{--<th>Total</th>--}}
                                                            {{--<th>Weight</th>--}}
                                                        {{--</tr>--}}
                                                        {{--</thead>--}}
                                                        {{--<tbody>--}}

                                                        {{--@forelse($assessments as $ass)--}}
                                                            {{--@if ($ass->subject_id == $subject->subject_id && $ass->grade_id == $subject->grade_id )--}}
                                                            {{--<tr>--}}
                                                                {{--<td>{{$ass->id}}</td>--}}
                                                                {{--<td>{{$ass->title}}</td>--}}
                                                                {{--<td>{{$ass->grade->grade.' - '.$ass->subject->subject}}</td>--}}
                                                                {{--<td>{{$ass->grade->grade}}</td>--}}
                                                                {{--<td>{{$ass->totalmark}}</td>--}}
                                                                {{--<td>--}}
                                                                    {{--{{$ass->weight}}--}}
                                                                    {{--<div class="pull-right box-tools">--}}

                                                                        {{--<a data-toggle="modal"  onclick="getDepartment('{{$person->id}}')"  class="btn-sm btn btn-danger"--}}
                                                                           {{--href="#deleteD"--}}
                                                                           {{--title="Delete"><i class="fa fa-trash-o"></i>--}}
                                                                        {{--</a>--}}
                                                                        {{--<a  class="btn-sm btn btn-success"--}}
                                                                           {{--href="{{route('cousework', $ass->id)}}"--}}
                                                                           {{--title="Capture Marks"><i class="fa fa-pencil"></i>--}}
                                                                        {{--</a>--}}
                                                                    {{--</div>--}}
                                                                {{--</td>--}}
                                                            {{--</tr>--}}
                                                            {{--@endif--}}
                                                        {{--@empty--}}
                                                        {{--@endforelse--}}

                                                        {{--</tbody>--}}
                                                    {{--</table>--}}
                                                    {{--<p> {{$subject->grade}}</p>--}}
                                                    {{--<p> {{$subject->year}}</p>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--@empty--}}

                                    {{--@endforelse--}}


                                </div>
                                <ul class="pagination">
                                    {{--{{ $subjects->links() }}--}}
                                </ul>

                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>

            </div>

        <div class="row">
            <br/>
        </div>
    </div>
    {{--<div class="modal fade" id="addAssessment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
        {{--<div class="modal-dialog modal-md" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h4 class="modal-title"><i class="fa fa-file"></i> Create Assessment </h4>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">×</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<form method="post" action="{{route('createassessment')}}">--}}
                    {{--<div class="modal-body">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<div class="row">--}}
                                {{--<input type="hidden" name="grade_id" id="grade_id" value="1">--}}
                                {{--<input type="hidden" name="subject_id" id="subject_id" value="1">--}}
                                {{--<input type="hidden" name="created_by" id="year" value="{{Auth::user()->id}}">--}}
                                {{--<input type="hidden" name="term" id="term" value="{{$term}}">--}}
                                {{--{{csrf_field()}}--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="gender">Year</label>--}}
                                {{--<input type="text"  name="year" id="year" class="form-control" value="{{$year}}" required readonly>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="gender">Term</label>--}}
                                {{--<input type="number"  name="term" id="term"  class="form-control" value="{{$term}}"  required readonly>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="gender">Title</label>--}}
                                {{--<input type="text"  name="title" id="title" class="form-control" required>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="gender">Total Marks</label>--}}
                                {{--<input type="number"  name="totalmark" id="totalmark"  class="form-control"   required>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="gender">Weight</label>--}}
                                {{--<input type="number"  name="weight" id="weight"  class="form-control"  required>--}}
                            {{--</div>--}}


                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                        {{--<button type="submit" class="btn btn-primary">Save changes</button>--}}
                    {{--</div>--}}
                {{--</form>--}}

            {{--</div>--}}
            {{--<!-- /.modal-content -->--}}
        {{--</div>--}}
        {{--<!-- /.modal-dialog -->--}}
    {{--</div>--}}
@endsection
