@extends('master')
@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">Staff</li>
    </ol>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-left">
                        <form class="form-horizontal" method="get" action="{{route('searchStaff')}}">
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
                <div class="col-md-4">
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            <strong>Staff</strong>
                            <small>Table</small>

                        </div>
                        <div class="card-body">
                            <table class="table table-responsive table-bordered table-hover table-sm" id="example">
                                <thead>
                                <tr>
                                    {{--<th>StaffID</th>--}}
                                    <th>FirstName</th>
                                    <th>Surname</th>
                                    <th>Initials</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($staffs as $staff)
                                    <tr  onclick="getStaffID('{{$staff->StaffID}}', '{{route('getStaff',$staff->StaffID)}}')">
                                        {{--<td>{{$staff->StaffID}}</td>--}}
                                        <td>{{$staff->FirstName}}</td>
                                        <td>{{$staff->LastName}}</td>
                                        <td>
                                            {{$staff->Code}}
                                        </td>
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
                <div class="col-md-8">
                    @include('toast::messages')
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i class="fa fa-street-view"></i>
                            <strong>Staff</strong>
                            <small>Details</small>
                            <div class="pull-right">
                                <button onclick="reset()" class="btn btn-sm btn-primary" title="Add New Applicant"><i class="fa fa-plus"></i> </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form  class="form-horizontal" action="{{route('UpdateStaff')}}" method="post" id="StaffEdit">
                                <div >
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <div class="row">
                                        <input name="StaffID" id="StaffID" hidden>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="gender">Title</label>
                                                <input type="text"  name="Title" id="Title"  class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Firstname</label>
                                                <input type="text"  name="FirstName" id="FirstName"  class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Surname</label>
                                                <input type="text"  name="LastName"  id="LastName"   class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Initials</label>
                                                <input type="text"  name="Code" id="Code"  class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">National ID</label>
                                                <input type="text"  name="ID"  id="ID"  class="form-control" required>
                                            </div>

                                        </div>
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label for="gender" id="BirthLabel">Date of Birth</label>
                                                <input type="text" onclick="changetoDate(this.id)"  name="Birth" id="Birth"  class="form-control" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Gender</label>
                                                <input type="text"  name="Sex" id="Sex"  class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Disabled</label>
                                                <input type="text"  name="D" id="Disabled"  class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Cell</label>
                                                <input type="text"  name="Cell" id="Cell"  class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Email</label>
                                                <input type="email"  name="Email" id="Email" class="form-control" >
                                            </div>



                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="gender">Nationality</label>
                                                <select name="NatID" id="NatID" class="form-control input-group-lg reg_name" required>
                                                    <option value="" selected>Country</option>
                                                    @forelse($countries as $country)
                                                        <option value="{{$country->NatID}}">{{$country->CountryName}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="gender">Position</label>
                                                <input type="text"  name="Position" id="Position"   class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Department</label>
                                                <div class="form-group">
                                                    <select name="Depart" id="Depart" class="form-control input-group-lg reg_name" required>
                                                        <option value="" selected>Select Department</option>
                                                        @forelse($departments as $staff)
                                                            <option value="{{$staff->Department}}">{{$staff->Department}}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                                {{--<input type="text"  name="Depart" id="Depart"  class="form-control" required>--}}
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Reports To</label>
                                                <select name="ReportTo" id="ReportTo" class="form-control input-group-lg reg_name" required>
                                                    <option value="" selected>Reports To</option>
                                                    @forelse($staffs as $staff)
                                                        <option value="{{$staff->StaffID}}">{{$staff->FirstName.' '.$staff->LastName.' '.$staff->ID}}</option>
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

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    @if (Auth::user()->hasAnyRole(['Administrator','Staff Attendance - Edit','Staff Attendance - Admin']))
                                    <button type="submit" class="btn btn-primary"> <span class="fa fa-check-circle-o"></span> Save  </button>
                                        @endif
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="pull-left">
                                <h5>Assigned Roles</h5>
                                <i id="selected_id" hidden class="hidden"></i>
                            </div>
                            @if (Auth::user()->hasAnyRole(['Administrator']))
                            <div class="pull-right">
                                <a  href="#rolesAssign" class="text-primary" data-toggle="modal" onclick="getStaffIDForRoles()"  title="Edit Privileges"><i class="fa fa-pencil"></i> </a>
                            </div>
                                @endif
                        </div>
                        <div class="card-body">
                            <div class="row" id="StaffRoles">

                            </div>
                        </div>
                    </div>



            </div>


        </div>

    </div>

    <div class="row">
        {{--<script>--}}
            {{--$('div.alert').not('.alert-important').delay(3000).fadeOut(350);--}}
        {{--</script>--}}

        <div class="modal fade" id="rolesAssign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Assign Roles</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form  class="form-horizontal" action="{{route('updateRoles')}}" method="post">
        <div class="modal-body anyClass ">
        {{csrf_field()}}
            <input type="hidden" name="staff_id" id="staff_id_for_roles" class="hiddenid">
            <div class="form-group">
                <label for="gender">UserName</label>
                <input type="text"  name="email"   class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gender">Password</label>
                <input type="password"  name="password"     class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gender">Select Roles</label>
                <div class="row">
                    @forelse($roles as $role)
                        <div class="col-sm-12">
                            <label class="switch switch-icon switch-success">
                                <input type="checkbox" class="switch-input"  name="role_ids[]" value="{{$role->RoleID}}">
                                <span class="switch-label" data-on="" data-off=""></span>
                                <span class="switch-handle"></span>
                            </label>  {{$role->RoleName}}
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>


        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"> <span class="fa fa-save"></span> Save</button>
        </div>
        </form>
        </div>
        </div>
        </div>
    </div>
@endsection
