@extends('master')
@section('content')
    {{--<ol class="breadcrumb  ">--}}
        {{--<li class="breadcrumb-item"><a href="/parents" title="Parents"><i class="fa fa-users"></i></a></li>--}}
        {{--<li class="breadcrumb-item"><a href="/applications" title="Applications"><i class="fa fa-file-pdf-o"></i></a></li>--}}
        {{--<li class="breadcrumb-item"><a href="/enrolments" title="Enrolment"><i class="fa fa-clipboard"></i></a></li>--}}
        {{--<li class="breadcrumb-item"><a href="/students" title="Students"><i class="fa fa-user-secret"></i></a></li>--}}
        {{--<li class="breadcrumb-item"><a href="/rollovers" title="Rollovers"><i class="fa fa-clock-o"></i></a></li>--}}
    {{--</ol>--}}
    <ol class="breadcrumb  ">
        <li class="breadcrumb-item">Parents</li>
    </ol>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-left">
                        <form class="form-horizontal" method="get" action="{{route('searchParent')}}">
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 200px;">
                                    <select name="StatusID"  class="form-control input-group-lg reg_name" required>
                                        <option value="" selected disabled>Select Status</option>
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
                            <strong>Parents</strong>
                            <small>Table</small>
                            <div class="pull-right">
                                <button onclick="reset()" class="btn btn-sm btn-primary" title="Add New Applicant"><i class="fa fa-plus"></i> </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table   table-hover table-sm" id="example">
                                <thead>
                                <tr>
                                    <th>Guardian(1)</th>
                                    <th>Guardian(2)</th>
                                     <th>ParentID</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($parents as $staff)
                                    <tr onclick="getParentID('{{$staff->ParentID}}', '{{route('getParent',$staff->ParentID)}}')" >
                                       
                                        <td>{{$staff->MotherLName.' '.$staff->MotherFName}}</td>
                                        <td>{{$staff->FatherLName.' '.$staff->FatherFName}}</td>
                                         <td>{{$staff->ParentID}}</td>
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
                            <a class="nav-link active" data-toggle="tab" href="#home4" role="tab" aria-controls="home"><i class="fa fa-female"></i> Guardian[1] Details &nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile"><i class="fa fa-street-view"></i> Guardian[2] Details &nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#cursubjects" role="tab" aria-controls="messages"><i class="fa fa-user-secret"></i> Child Details</a>
                        </li>
                    </ul>
                    <form  class="form-horizontal" action="{{route('UpdateParent')}}" method="post">
                    <div class="tab-content">
                        <div class="tab-pane active" id="home4" role="tabpanel">
                            <div class="card card-accent-primary">
                                <div class="card-body anyClass">
                                    <div >
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                            <div>
                                                <h5><i class="fa fa-female"></i> Personal Details</h5>
                                            </div>
                                            <div class="row">
                                                <input name="ParentID" id="ParentID" hidden>
                                                <div class="col-md-6">
                                                    <div class="form-group-sm">
                                                        <label for="gender">Title</label>
                                                        <input type="text"  name="MTitle" id="MTitle"  class="form-control" required>
                                                    </div>

                                                    <div class="form-group-sm">
                                                        <label for="gender">FirstName</label>
                                                        <input type="text"  name="MotherFName" id="MotherFName"  class="form-control" required>
                                                    </div>
                                                    <div class="form-group-sm">
                                                        <label for="gender">LastName</label>
                                                        <input type="text"  name="MotherLName" id="MotherLName"  class="form-control" required>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group-sm">
                                                        <label for="gender">National ID</label>
                                                        <input type="text"  name="MotherID" id="MotherID"  class="form-control" >
                                                    </div>
                                                    <div class="form-group-sm">
                                                        <label for="gender">Nationality</label>
                                                        <select name="MNationID" id="MNationID" class="form-control input-group-lg reg_name" required>
                                                            <option value="" selected>Country</option>
                                                            @forelse($countries as $country)
                                                                <option value="{{$country->NatID}}">{{$country->CountryName}}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>

                                                        {{--<input type="text"  name="MNationID" id="MNationID"  class="form-control" required>--}}
                                                    </div>
                                                    <div class="form-group-sm">
                                                        <label for="gender">Language</label>
                                                        <select name="MLangID" id="MLangID" class="form-control input-group-lg reg_name" required>
                                                            <option value="" selected>Language</option>
                                                            @forelse($languages as $country)
                                                                <option value="{{$country->LangID}}">{{$country->LangName}}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                        {{--<input type="text"  name="MLangID"  id="MLangID"   class="form-control" required>--}}
                                                    </div>

                                                </div>
                                            </div>
                                            <hr/>
                                            <div>
                                                <h5><i class="fa fa-phone"></i> Contact Details</h5>
                                            </div>
                                            <div class="row">
                                                <input name="StaffID" id="StaffID" hidden>
                                                <div class="col-md-6">
                                                    {{--<div class="form-group-sm">--}}
                                                        {{--<label for="gender">Title</label>--}}
                                                        {{--<input type="text"  name="MTitle" id="MTitle"  class="form-control" required>--}}
                                                    {{--</div>--}}

                                                    {{--<div class="form-group-sm">--}}
                                                        {{--<label for="gender">FirstName</label>--}}
                                                        {{--<input type="text"  name="MotherFName" id="MotherFName"  class="form-control" required>--}}
                                                    {{--</div>--}}
                                                    <div class="form-group-sm">
                                                        <label for="gender">Telephone</label>
                                                        <input type="text"  name="MPHome"  id="MPHome"   class="form-control" >
                                                    </div>
                                                    <div class="form-group-sm">
                                                        <label for="gender">Cell</label>
                                                        <input type="text"  name="MPCell" id="MPCell" class="form-control" >
                                                    </div>
                                                    <div class="form-group-sm">
                                                        <label for="gender">Email</label>
                                                        <input type="text"  name="MEmail" id="MEmail" class="form-control" >
                                                    </div>
                                                    {{--<div class="form-group-sm">--}}
                                                        {{--<label for="gender">Employer</label>--}}
                                                        {{--<input type="text"  name="MEmployer"  id="MEmployer"  class="form-control" required>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="form-group-sm">--}}
                                                        {{--<label for="gender">Work Phone</label>--}}
                                                        {{--<input type="text"  name="MPWork" id="MPWork"  class="form-control" required >--}}
                                                    {{--</div>--}}

                                                    {{--<div class="form-group-sm">--}}
                                                        {{--<label for="gender">Profession</label>--}}
                                                        {{--<input type="number"  name="MProfID" id="MProfID"   class="form-control" required>--}}
                                                    {{--</div>--}}
                                                </div>
                                                <div class="col-md-6">
                                                    {{--<div class="form-group-sm">--}}
                                                        {{--<label for="gender">LastName</label>--}}
                                                        {{--<input type="text"  name="MotherLName" id="MotherLName"  class="form-control" required>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="form-group-sm">--}}
                                                        {{--<label for="gender">Nationality</label>--}}
                                                        {{--<input type="text"  name="MNationID" id="MNationID"  class="form-control" required>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="form-group-sm">--}}
                                                        {{--<label for="gender">Language</label>--}}
                                                        {{--<input type="text"  name="MLangID"  id="MLangID"   class="form-control" required>--}}
                                                    {{--</div>--}}

                                                    <div class="form-group-sm">
                                                        <label for="gender">Street Address</label>
                                                        <input type="text"  name="Addr1"  id="Addr1"  class="form-control" >
                                                    </div>
                                                    <div class="form-group-sm">
                                                        <label for="gender">Location</label>
                                                        <input type="text"  name="Addr2" id="Addr2"  class="form-control"  >
                                                    </div>
                                                    <div class="form-group-sm">
                                                        <label for="gender">City</label>
                                                        <input type="text"  name="Addr3" id="Addr3"   class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div>
                                                <h5><i class="fa fa-briefcase"></i> Employment Details</h5>
                                            </div>
                                            <div class="row">
                                                {{-- <input name="StaffID" id="StaffID" hidden> --}}
                                                <div class="col-md-6">
                                                    <div class="form-group-sm">
                                                    <label for="gender">Employer</label>
                                                    <input type="text"  name="MEmployer"  id="MEmployer"  class="form-control" >
                                                    </div>
                                                    <div class="form-group-sm">
                                                    <label for="gender">Work Phone</label>
                                                    <input type="text"  name="MPWork" id="MPWork"  class="form-control"  >
                                                    </div>

                                                    <div class="form-group-sm">
                                                    <label for="gender">Profession</label>
                                                        <select name="MProfID" id="MProfID" class="form-control input-group-lg reg_name" >
                                                            <option value="" selected>Profession</option>
                                                            @forelse($professions as $country)
                                                                <option value="{{$country->ProfID}}">{{$country->ProfName}}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
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
                                                <div class="col-md-6">

                                                </div>
                                            </div>

                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile4" role="tabpanel">
                            <div class="box box-primary">
                                <div class="card card-accent-primary">
                                    <div class="card-body anyClass">
                                            <div>
                                            <h5><i class="fa fa-male"></i> Personal Details</h5>
                                        </div>
                                            <div class="row">
                                                {{--<input name="StaffID" id="StaffID" hidden>--}}
                                                <div class="col-md-6">
                                                    <div class="form-group-sm">
                                                        <label for="gender">Title</label>
                                                        <input type="text"  name="FTitle" id="FTitle"  class="form-control" >
                                                    </div>

                                                    <div class="form-group-sm">
                                                        <label for="gender">FirstName</label>
                                                        <input type="text"  name="FatherFName" id="FatherFName"  class="form-control" >
                                                    </div>

                                                    <div class="form-group-sm">
                                                        <label for="gender">LastName</label>
                                                        <input type="text"  name="FatherLName" id="FatherLName"  class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group-sm">
                                                        <label for="gender">National ID</label>
                                                        <input type="text"  name="FatherID" id="FatherID"  class="form-control" >
                                                    </div>
                                                    <div class="form-group-sm">
                                                        <label for="gender">Nationality</label>
                                                        <select name="FNationID" id="FNationID" class="form-control input-group-lg reg_name" >
                                                            <option value="" selected>Country</option>
                                                            @forelse($countries as $country)
                                                                <option value="{{$country->NatID}}">{{$country->CountryName}}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                        {{--<input type="text"  name="FNationID" id="FNationID"  class="form-control" required>--}}
                                                    </div>
                                                    <div class="form-group-sm">
                                                        <label for="gender">Language</label>
                                                        <select name="FLangID" id="FLangID" class="form-control input-group-lg reg_name" >
                                                            <option value="" selected>Language</option>
                                                            @forelse($languages as $country)
                                                                <option value="{{$country->LangID}}">{{$country->LangName}}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                        {{--<input type="text"  name="FLangID"  id="FLangID"   class="form-control" required>--}}
                                                    </div>

                                                </div>
                                            </div>
                                            <hr/>
                                            <div>
                                                <h5><i class="fa fa-phone"></i> Contact Details</h5>
                                            </div>
                                            <div class="row">
                                                {{--<input name="StaffID" id="StaffID" hidden>--}}
                                                <div class="col-md-6">
                                                    <div class="form-group-sm">
                                                        <label for="gender">Telephone</label>
                                                        <input type="text"  name="FPHome"  id="FPHome"   class="form-control" >
                                                    </div>
                                                    <div class="form-group-sm">
                                                        <label for="gender">Cell</label>
                                                        <input type="text"  name="FPCell" id="FPCell" class="form-control" >
                                                    </div>
                                                    <div class="form-group-sm">
                                                        <label for="gender">Email</label>
                                                        <input type="email"  name="FEmail" id="FEmail" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group-sm">
                                                        <label for="gender">Street Address</label>
                                                        <input type="text"  name="FatherAddr1"  id="FatherAddr1"  class="form-control" >
                                                    </div>
                                                    <div class="form-group-sm">
                                                        <label for="gender">Location</label>
                                                        <input type="text"  name="FatherAddr3" id="FatherAddr3"  class="form-control"  >
                                                    </div>
                                                    <div class="form-group-sm">
                                                        <label for="gender">City</label>
                                                        <input type="text"  name="FatherAddr4" id="FatherAddr4"   class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div>
                                                <h5><i class="fa fa-briefcase"></i> Employment Details</h5>
                                            </div>
                                            <div class="row">
                                                {{--<input name="StaffID" id="StaffID" hidden>--}}
                                                <div class="col-md-6">
                                                    <div class="form-group-sm">
                                                        <label for="gender">Employer</label>
                                                        <input type="text"  name="FEmployer"  id="FEmployer"  class="form-control" >
                                                    </div>
                                                    <div class="form-group-sm">
                                                        <label for="gender">Work Phone</label>
                                                        <input type="text"  name="FPWork" id="FPWork"  class="form-control"  >
                                                    </div>

                                                    <div class="form-group-sm">
                                                        <label for="gender">Profession</label>
                                                        <select name="FProfID" id="FProfID" class="form-control input-group-lg reg_name" >
                                                            <option value="" selected>Profession</option>
                                                            @forelse($professions as $country)
                                                                <option value="{{$country->ProfID}}">{{$country->ProfName}}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                </div>
                                            </div>

                                        </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane " id="cursubjects" role="tabpanel">
                            <div class="card card-accent-primary">
                                <div class="card-body">
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header">
                                                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                                    Current Students
                                                </a>
                                            </div>
                                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                <div class="card-body">
                                                    <table class="table table-stripped table-bordered table-hover table-sm" id="std">
                                                        <thead>
                                                            <th>LastName</th>
                                                            <th>FirstName</th>
                                                            <th>Year</th>
                                                            <th>Term</th>
                                                            <th>Class</th>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                                    Other Terms
                                                </a>
                                            </div>
                                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <table class="table  table-bordered table-hover table-sm" id="std1">
                                                        <thead>
                                                        <tr>
                                                            <th>LastName</th>
                                                            <th>FirstName</th>
                                                            <th>Gender</th>
                                                            {{--<th>Grade</th>--}}
                                                            {{--<th>Class</th>--}}
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        @if (Auth::user()->hasAnyRole(['Administrator', 'Parent Records - Edit','Parent Records - Admin']))
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> <span class="fa fa-check-circle-o"></span> Save  </button>
                        </div>
                        @endif

                    </div>
                    </form>
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
        {{--<div class="form-group-sm">--}}
        {{--<div class="col-sm-12" id="classro">--}}
        {{--Are you sure you want to delete data?--}}
        {{--</div>--}}
        {{--</div><!--/form-group-sm-->--}}
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
