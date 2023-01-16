@extends('master')
@section('content')

    <ol class="breadcrumb  ">
        <li class="breadcrumb-item">Enrolment</li>
    </ol>


    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-left">
                        <form class="form-horizontal" method="get" >
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 600px;">
                                    <select name="Year" id="Year" class="form-control input-group-sm col-md-4" required>
                                        <option value="" selected disabled>Select Year</option>
                                        @forelse($years as $m)
                                            <option value="{{$m->YearEnding}}">{{$m->YearEnding}}</option>
                                        @empty
                                        @endforelse
                                    </select>&nbsp;&nbsp;
                                    <select name="studForm" id="studForm" class="form-control input-group-sm col-md-4" required>
                                        <option value="" selected disabled>Select Form</option>
                                        @forelse($grades as $m)
                                            <option value="{{$m->StudYear}}">{{$m->StudYear}}</option>
                                        @empty
                                        @endforelse
                                    </select>&nbsp;&nbsp;
                                    <select name="Status" id="Status" class="form-control input-group-sm col-md-4" required>
                                        <option value="" selected disabled>Select Status</option>
                                        @forelse($appStatus as $country)
                                            <option value="{{$country->StatusID}}">{{$country->StatusName}}</option>
                                        @empty
                                        @endforelse
                                    </select>&nbsp;&nbsp;
                                    {{--<input type="text" name="search" class="form-control pull-right" placeholder="Search" required>--}}

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
                            <strong>Applications</strong>
                            <small>Table</small>
                        </div>
                        <div class="card-body">
                            <table class="table  table-bordered table-hover table-sm" id="example">
                                <thead>
                                <tr>
                                    <th>WaitListID</th>
                                    <th>FirstName</th>
                                    <th>Surname</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($applications as $staff)
                                    <tr onclick="getApplicantID('{{$staff->WaitListID}}', '{{route('getApplicant',$staff->WaitListID)}}')">
                                        <td>{{$staff->WaitListID}}</td>
                                        <td>{{$staff->FirstName}}</td>
                                        <td>{{$staff->LastName}}</td>
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
                    @include('toast::messages')
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#home4" role="tab" aria-controls="home"><i class="fa fa-female"></i> Application Details &nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile"><i class="fa fa-file-pdf-o"></i> Enrolment Details &nbsp;</a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane " id="home4" role="tabpanel">
                            <div class="card card-accent-primary">
                                <div class="card-body">
                                        <div >

                                            <div class="row">

                                                <input name="IncCensus" id="IncCensus" value="1" hidden>
                                                <input name="StudType" id="StudType" value="1" hidden>
                                                <input name="DebitOrder" id="DebitOrder" value="0" hidden>
                                                <input name="RelationID" id="RelationID" value="1" hidden>
                                                <input name="LivingWithID" id="LivingWithID" value="7" hidden>
                                                {{--<input name="Gender2" id="Gender2" value="M" hidden>--}}
                                                <input name="Gender" id="Gender" value="1" hidden>
                                                <input name="UpdatedOn" id="UpdatedOn" value="{{\Carbon\Carbon::now()}}" hidden>
                                                <input name="StatusDate" id="StatusDate" value="{{\Carbon\Carbon::now()}}" hidden>
                                                <input name="EntryDate" id="EntryDate" value="{{\Carbon\Carbon::now()}}" hidden>
                                                <input name="UpdatedBy" id="UpdatedBy" value="{{Auth::user()->name}}" hidden>
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
                                                        <label for="gender">Application Date</label>
                                                        <input type="text"  name="ApplDate" id="ApplDate"  placeholder="YYYY-MM-DD" class="form-control" required>
                                                    </div>
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
                                                    <div class="form-group">
                                                        <label for="gender">Date of Birth</label>
                                                        <input type="text"  name="BirthDate" id="BirthDate" placeholder="YYYY-MM-DD" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gender">Passport Number</label>
                                                        <input type="text"  name="PassNo"  id="PassNo"  class="form-control" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gender">Birth Place</label>
                                                        <input type="text"  name="BirthPlace" id="BirthPlace"  class="form-control" required >
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="gender">Address</label>
                                                        <input type="text"  name="Address" id="Address"  class="form-control" required>
                                                    </div>
                                                    {{--<div class="form-group">--}}
                                                    {{--<label for="gender">ReligionID</label>--}}
                                                    {{--<input type="number"  name="ReligionID" id="ReligionID"  class="form-control" >--}}
                                                    {{--</div>--}}
                                                    <div class="form-group">
                                                        <label for="gender">Previous School</label>
                                                        <input type="number"  name="PrevSchools" id="PrevSchools"  class="form-control" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gender">Grade</label>
                                                        <select name="StudYear" id="StudYear" class="form-control input-group-lg reg_name" required>
                                                            <option value="" selected>Select Grade</option>
                                                            @forelse($grades as $country)
                                                                <option value="{{$country->StudYear}}">{{$country->StudYear}}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="gender">Status</label>
                                                        <select name="StatusID" id="StatusID" class="form-control input-group-lg reg_name" required>
                                                            <option value="" selected>Select Status</option>
                                                            @forelse($appStatus as $country)
                                                                <option value="{{$country->StatusID}}">{{$country->StatusName}}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
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
                                                    {{--<label for="gender">Admission #</label>--}}
                                                    {{--<input type="text"  name="AdmNo" id="AdmNo"  class="form-control" >--}}
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

                                            </div>

                                        </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane active" id="profile4" role="tabpanel">
                            <div class="box box-primary">
                                <div class="card card-accent-primary">
                                    <div class="card-body">
                                        <form  class="form-horizontal" action="{{route('Enroll')}}" method="post" id="StaffEdit">
                                            <div >
                                                {{csrf_field()}}
                                                {{method_field('PUT')}}
                                                <input name="WaitListID" id="WaitListID" hidden>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="gender">Year</label>
                                                            <input type="text"  name="TermYear" readonly id="TermYear" value="{{$activeSession->TermYear}}"  class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="gender">Term</label>
                                                            <input type="text"  name="Term" readonly id="StudYear"  value="{{$activeSession->Term}}"  class="form-control" required>
                                                        </div>
                                                        {{--<div class="form-group">--}}
                                                        {{--<label for="gender">Grade</label>--}}
                                                        {{--<input type="text"  name="AcYear"   id=""  class="form-control" required>--}}
                                                        {{--</div>--}}
                                                        {{-- <div class="form-group">
                                                            <label for="gender">Class</label>
                                                            <select name="Class" id="Class" class="form-control input-group-lg reg_name" required>
                                                                <option value="" selected>Select Class</option>
                                                                @forelse($classes as $m)
                                                                    <option value="{{$m->Class}}">{{$m->Class}}</option>
                                                                @empty
                                                                @endforelse
                                                            </select>
                                                        </div> --}}
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary"> <span class="fa fa-check-circle-o"></span> Enroll  </button>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </form>

                                    </div>
                                </div>

                            </div>
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
