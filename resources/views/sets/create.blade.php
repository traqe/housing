@extends('master')
@section('content')
    <ol class="breadcrumb  ">
        <li class="breadcrumb-item"><a href="{{route('sets')}}">Sets</a> </li>
        <li class="breadcrumb-item"><a href="{{route('createSet')}}">Create</a> </li>
    </ol>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-left">
                        <div class="row">
                            <form class="form-horizontal" method="get" action="{{route('getGroup')}}">
                                <div class="box-tools">
                                    <div class="input-group input-group-sm ">
                                        <select  name="timetable_id" id="timetable_id" class="form-control input-group-sm" required>
                                            <option value="@if ($currentTimeTable != null){{$currentTimeTable->TTID}}@endif" selected >@if ($currentTimeTable != null){{$currentTimeTable->TTName}} @else Select TimeTable @endif</option>
                                            @forelse($timetables as $m)
                                                <option value="{{$m->TTID}}">{{$m->TTName}}</option>
                                            @empty
                                            @endforelse
                                        </select>&nbsp;&nbsp;

                                        <div class="input-group-btn">
                                            <button type="submit" title="search" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                            <button  data-toggle="modal" data-target="#addTimeTable" title="Add TimeTable" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></button>

                        </div>

                    </div>


                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            <strong>Time</strong>
                            <small>Table</small>
                            <div class="pull-right">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addGroup">  <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover" id="example">
                                <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Group Name</th>
                                    <th>Max</th>
                                    <th>Min</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if ($sg != null)
                                    @forelse($sg as $department)
                                        <tr onclick="getSets('{{$department->OGID}}', '{{route('getSubjectSet', $department->OGID )}}')">
                                            <td>{{$department->AcYear}}</td>
                                            <td>{{$department->OGName}}</td>
                                            <td>{{$department->SubjSel}}</td>
                                            <td>
                                                {{$department->SubjSelMin}}
                                                <div class="pull-right">
                                                    <a data-target="#createSet" onclick="getSet('{{$department->OGID}}','{{$department->AcYear}}')" data-toggle="modal" class="text-primary" title="Add Set"><i class="fa fa-plus"></i> </a>
                                                    <a data-target="#editCreate" onclick="getEditSubjectGroup('{{$department->OGID}}', '{{$department->OGName}}', '{{$department->AcYear}}', '{{$department->SubjSel}}', '{{$department->SubjSelMin}}')" data-toggle="modal" class="text-success" title="Edit Subject Group"><i class="fa fa-pencil"></i> </a>
                                                    <form action="{{route('deleteGroup')}}" method="post">
                                                        {{csrf_field()}}
                                                        {{--{{method_field('Delete')}}--}}
                                                        <input class="hidden" name="OGID" value="{{$department->OGID}}" type="hidden" hidden>
                                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="text-danger" title="Delete"><i class="fa fa-trash"></i> </button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>

                                    @empty

                                    @endforelse
                                @endif

                                </tbody>
                            </table>
                            {{--<ul class="pagination">--}}
                            {{--{{ $classes->links() }}--}}
                            {{--</ul>--}}
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <strong>
                                <i id="SetName"></i>

                                <i id="Size"></i>
                                <i id="RowID" hidden class="hidden"></i>
                                Subject Sets
                            </strong>
                            {{--<div class="pull-right">--}}
                                {{--<button class="btn btn-sm btn-primary" onclick="getClassData()" data-toggle="modal" data-target="#addStudent" title="Add Student"><i class="fa fa-plus"></i> </button>--}}
                            {{--</div>--}}
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover" id="subSet">
                                <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Subject</th>
                                    <th>Educator</th>
                                    <th>Students</th>
                                    <th><i class="fa fa-plus"></i> </th>
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

    </div>

    <div class="row">
        <div class="modal fade" id="addTimeTable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar-times-o"></i> Add TimeTable</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form  class="form-horizontal" action="{{route('addTimeTable')}}" method="post">
                        <div class="modal-body ">
                            {{csrf_field()}}
                            <input type="hidden" name="CreatedBy" value="{{Auth::user()->staff->StaffID}}" hidden>
                            <input type="hidden" hidden value="{{\Carbon\Carbon::now()}}" name="CreatedOn">


                            <div class="form-group">
                                <label for="gender">Name</label>
                                <input type="text"  name="TTName"  class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="gender">Year</label>
                                <input type="text"  name="TermYear"  class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="gender">Term</label>
                                <input type="text"  name="Term"  class="form-control" >
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-book"></i> Add Subject Group</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form  class="form-horizontal" action="{{route('addGroup')}}" method="post">
                        <div class="modal-body ">
                            {{csrf_field()}}
                            <input type="hidden" name="OGYear" value="{{$currentSession->TermYear}}" hidden>
                            <input type="hidden" hidden value="{{$currentSession->Term}}" name="OGTerm">
                            @if ($currentTimeTable != null)
                            <input type="hidden" hidden value="{{$currentTimeTable->TTID}}"  name="TTID">
                            @endif
                            <div class="form-group">
                                <label for="gender">Name</label>
                                <input type="text"  name="OGName" id="OGName"  class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="gender">Grade</label>
                                <select name="AcYear" id="AcYear" class="form-control" required>
                                    <option value="" selected >Select Grade</option>
                                    <option value="F1" >F1</option>
                                    <option value="F2" >F2</option>
                                    <option value="F3" >F3</option>
                                    <option value="F4" >F4</option>
                                    <option value="L6" >L6</option>
                                    <option value="U6" >U6</option>
                                </select>&nbsp;
                            </div>

                            <div class="form-group">
                                <label for="gender">Maximum Subjects</label>
                                <input type="text"  name="SubjSel"   class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="gender">Minimum Subjects</label>
                                <input type="text"  name="SubjSelMin"   class="form-control" >
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="createSet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-book"></i> Add Subject Set</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form  class="form-horizontal" action="{{route('addSet')}}" method="post">
                        <div class="modal-body ">
                            {{csrf_field()}}
                            <input type="hidden" id="OGID" name="OGID" hidden>
                            <input type="hidden" id="AcYear" name="AcYear" hidden>

                            <div class="form-group">
                                <label for="gender">Set Name</label>
                                <input type="text"  name="Section"  class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="gender">Teacher</label>
                                <select name="Teacher1ID" id="Teacher1ID" class="form-control" required>
                                    <option value="" selected >Select Teacher</option>
                                    @forelse($teachers as $m)
                                        <option value="{{$m->StaffID}}">{{$m->LastName.' '.$m->FirstName.' '.$m->Code}}</option>
                                    @empty
                                    @endforelse
                                </select>&nbsp;
                            </div>

                            <div class="form-group">
                                <label for="gender">Subject</label>
                                <select name="SubjID" id="SubjID" class="form-control" required>
                                    <option value="" selected >Select Subject</option>
                                    @forelse($subjects as $m)
                                        <option value="{{$m->Subject}}">{{$m->Subject.' '.$m->SubjCode.' '.$m->Lvl}}</option>
                                    @empty
                                    @endforelse
                                </select>&nbsp;
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-book"></i> Edit Subject Group</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form  class="form-horizontal" action="{{route('updateGroup')}}" method="post">
                        <div class="modal-body ">
                            {{csrf_field()}}
                            {{--{{method_field('PUT')}}--}}

                            <input type="hidden" class="hidden" id="OGID" name="OGID" hidden>

                            <div class="form-group">
                                <label for="gender">Name</label>
                                <input type="text"  name="OGName" id="OGName"  class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="gender">Grade</label>
                                <select name="AcYear" id="AcYear" class="form-control" required>
                                    <option value="" selected >Select Grade</option>
                                    <option value="F1" >F1</option>
                                    <option value="F2" >F2</option>
                                    <option value="F3" >F3</option>
                                    <option value="F4" >F4</option>
                                    <option value="L6" >L6</option>
                                    <option value="U6" >U6</option>
                                </select>&nbsp;
                            </div>

                            <div class="form-group">
                                <label for="gender">Maximum Subjects</label>
                                <input type="text"  name="SubjSel" id="SubjSel"  class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="gender">Minimum Subjects</label>
                                <input type="text"  name="SubjSelMin" id="SubjSelMin"  class="form-control" >
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
