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
        <li class="breadcrumb-item">Communication Module</li>
    </ol>

    <div class="container-fluid">
        <div class="col-md-12">



            <div class="row">
                <div class="col-md-5">
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            <strong>Email Groups</strong>
                            <small>Table</small>
                            <div class="pull-right">
                                <button onclick="reset()" data-toggle="modal" data-target="#addgroup" class="btn btn-sm btn-primary" title="Add New Applicant"><i class="fa fa-plus"></i> </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table   table-hover table-sm" >
                                <thead>
                                <tr>
                                    {{--                                    <th>ID</th>--}}
                                    <th>Group</th>
                                    <th>Type</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($groups as $staff)
                                    <tr >
                                        <td>
                                            {{$staff->groupname}}
                                        </td>
                                        <td>{{$staff->type}}
                                            <div class="pull-right">
                                                <a href="#editGroup" onclick="getMembers('{{route('getMembers', $staff->id)}}','{{$staff->groupname}}', '{{$staff->id}}')" data-toggle="modal" class="text-success"><i class="fa fa-pencil"></i> </a>
                                                <a onclick="deleteGroup('{{$staff->id}}')"  class="text-danger"><i class="fa fa-trash"></i> </a>
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
                <div class="col-md-7">
                    @include('toast::messages')
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home4" role="tab" aria-controls="home"><i class="fa fa-envelope-open"></i> <i class="fa fa-mail-forward"></i> Single Email &nbsp;</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile"><i class="fa fa-envelope-open"></i> <i class="fa fa-envelope-open"></i> <i class="fa fa-mail-forward"></i>  Bulk Email &nbsp;</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="home4" role="tabpanel">
                            <div class="card card-accent-primary">
                                <div class="card-body ">
                                    <div >
                                        <div>
                                            <h5><i class="fa fa-mail-forward"></i> Send Single Email</h5>
                                        </div>
                                        <hr/>
                                        <form  class="form-horizontal" action="{{route('sendSingleEmail')}}" method="post" enctype="multipart/form-data">
                                            <div class="row">

                                                <input name="ParentID" id="ParentID" hidden>
                                                <div class="col-md-12">

                                                    {{csrf_field()}}
                                                    <div class="form-group-sm">
                                                        <label>Email</label>
                                                        <input class="form-control" name="email" type="email" id="email" required>
                                                    </div>
                                                    <hr/>
                                                    <div class="form-group-sm">
                                                        <label>Subject</label>
                                                        <input class="form-control" name="title" id="title" required>
                                                    </div>

                                                    <div class="form-group-sm">
                                                        <label for="gender">Message</label>
                                                        <textarea class="form-control" rows="5" name="message" id="message" required></textarea>
                                                    </div>
                                                    <hr/>
                                                    <div class="form-group-sm">
                                                        <label for="gender">Attachment</label>
                                                        <input type="file" name="attachment" class="form-control">
                                                    </div>
                                                    <hr/>
                                                    <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-primary"> <span class="fa fa-mail-forward"></span> Send  </button>

                                                </div>
                                        </form>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile4" role="tabpanel">
                        <div class="box box-primary">
                            <form method="post" action="{{route("sendBulkEmail")}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card card-accent-primary">
                                    <div class="card-body ">
                                        <div>
                                            <h5><i class="fa fa-mail-forward"></i> Send Bulk Email</h5>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-12">

                                                <hr/>
                                                <div class="form-group-sm">
                                                    <label for="gender">Staff Recipients</label>
                                                    <div class="row">
                                                        @forelse($groups as $group)
                                                            <div class="col-sm-4">
                                                                <label class="switch switch-icon switch-primary">
                                                                    <input type="checkbox" class="switch-input"  name="recipients[]" value="{{$group->id}}" >
                                                                    <span class="switch-label" data-on="" data-off=""></span>
                                                                    <span class="switch-handle"></span>
                                                                </label>  {{$group->groupname}}
                                                            </div>
                                                        @empty
                                                        @endforelse

                                                    </div>

                                                    <hr/>

                                                    <div class="form-group-sm">
                                                        <label for="gender">Parent Recipients</label>
                                                        <div class="row">
                                                            @forelse($classes as $group)
                                                                <div class="col-sm-3">
                                                                    <label class="switch switch-icon switch-primary">
                                                                        <input type="checkbox" class="switch-input"  name="parents[]" value="{{$group->Class}}" >
                                                                        <span class="switch-label" data-on="" data-off=""></span>
                                                                        <span class="switch-handle"></span>
                                                                    </label>  {{$group->Class}}
                                                                </div>
                                                            @empty
                                                            @endforelse

                                                        </div>

                                                        <hr/>
                                                        <div class="form-group-sm">
                                                            <label>Title</label>
                                                            <input class="form-control" name="title" id="title" required>
                                                        </div>
                                                        <hr/>
                                                        {{--                                                        <div class="form-group-sm">--}}
                                                        {{--                                                            <label>Heading</label>--}}
                                                        {{--                                                            <input class="form-control" name="heading" id="heading"  placeholder="Good Day" required>--}}
                                                        {{--                                                        </div>--}}
                                                        {{--                                                            <hr/>--}}

                                                        <div class="form-group-sm">
                                                            <label for="gender">Fields</label>
                                                            <div class="row">

                                                                <div class="col-sm-4">
                                                                    <button type="button" onclick="insertVariable('@TITLE')" class="btn btn-sm btn-success"><i class="fa fa-paste"> Title </i> </button>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <button type="button" onclick="insertVariable('@FIRSTNAME')" class="btn btn-sm btn-success"><i class="fa fa-paste"> FIRSTNAME </i> </button>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <button type="button" onclick="insertVariable('@LASTNAME')" class="btn btn-sm btn-success"><i class="fa fa-paste"> LASTNAME </i> </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr/>
                                                        <div class="form-group-sm">
                                                            <label for="gender">Message</label>
                                                            <textarea class="form-control" rows="5" name="message" id="msg" required></textarea>
                                                        </div>
                                                        <hr/>
                                                        <div class="form-group-sm">
                                                            <label for="gender">Attachment</label>
                                                            <input type="file" name="attachment" class="form-control">
                                                        </div>
                                                        <hr/>
                                                        <button type="submit" onclick="confirm('are you sure?')" class="btn btn-primary"> <span class="fa fa-mail-forward"></span> Send  </button>

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
    <br/>
    <div class="row">
        <script>
            $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
        </script>

        <div class="modal fade" id="addgroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add New Group</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <form  class="form-horizontal" action="{{route('addEmailGroup')}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <input type="hidden" name="id" id="group" class="group">
                            <div class="form-group-sm">
                                <label>Email Group</label>
                                <input name="groupname" class="form-control" required>
                            </div><!--/form-group-sm-->
                            <div class="form-group-sm">
                                <label>Email Group Type</label>
                                <select name="type"  class="form-control input-group-lg reg_name" required>
                                    <option value="" selected disabled>Select Type</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Other">Other</option>

                                </select>
                            </div><!--/form-group-sm-->
                            <br/>
                            <div class="form-group-sm anyClass">
                                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                <table class="table   table-hover table-sm" id="myTable">
                                    <tbody>
                                    @forelse($staffs as $staff)
                                        <tr >
                                            <td>
                                                {{$staff->Title.' '.$staff->LastName.' '.$staff->FirstName}}
                                                <div class="pull-right">
                                                    <label class="switch switch-icon switch-success">
                                                        <input type="checkbox" class="switch-input"  name="staffs[]" value="{{$staff->StaffID}}">
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
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> <span class="fa fa-save"></span> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit Group</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('addmember')}}">
                            {{csrf_field()}}
                        <input type="hidden" name="groupid" class="hidden" id="groupid" hidden>
                        <input type="hidden" class="hidden" id="token" hidden value="{{csrf_token()}}">
                        <div class="form-group-sm">
                            <select name="staffid" id="memberid" class="form-control input-group-lg reg_name" required>
                                <option value="" selected disabled>Select Member</option>
                                @forelse($staffs as $staff)
                                    <option value="{{$staff->StaffID}}">{{$staff->Title.' '.$staff->LastName.' '.$staff->FirstName}}</option>
                                @empty
                                @endforelse
                            </select>
                            <br/>
                            <button type="button" onclick="addgroupmember()" class="btn btn-md btn-success btn-block">ADD</button>
                            <hr/>
                            </form>
                            <table class="table table-bordered table-hover table-sm" id="membersTable">
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="modal fade" id="viewGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">View Group Members</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <form  class="form-horizontal" action="{{route('addEmailGroup')}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <input type="hidden" name="id" id="group" class="group">
                            <div class="form-group-sm">
                                <label>Email Group</label>
                                <input name="groupname" class="form-control" required>
                            </div><!--/form-group-sm-->
                            <br/>
                            <div class="form-group-sm">
                                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                <table class="table   table-hover table-sm" id="myTable">
                                    <tbody>
                                    @forelse($staffs as $staff)
                                        <tr >
                                            <td>
                                                {{$staff->Title.' '.$staff->LastName.' '.$staff->FirstName}}
                                                <div class="pull-right">
                                                    <label class="switch switch-icon switch-success">
                                                        <input type="checkbox" class="switch-input"  name="staffs[]" value="{{$staff->StaffID}}">
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
