@extends('master')
@section('content')
    <ol class="breadcrumb  ">
        <li class="breadcrumb-item">Activities</li>
        {{--<li class="breadcrumb-item"><a href="/sets/create">Create</a> </li>--}}
    </ol>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-left">

                        <div class="row">

                            <form class="form-horizontal" method="get" action="{{route('getmyact')}}">
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
                            {{--<button  data-toggle="modal" data-target="#addTimeTable" title="Add TimeTable" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></button>--}}

                        </div>
                        {{--<form class="form-horizontal" action="{{route('searchAssessment')}}" method="get" >--}}
                            {{--<div class="box-tools">--}}
                                {{--<div class="input-group input-group-sm" style="width: 600px;">--}}
                                    {{--<select name="Year" id="Year" class="form-control input-group-sm col-md-4" required>--}}
                                        {{--<option @if ($year != null) value="{{$year}}" @endif selected >@if ($year != null){{$year}} @else Select Year @endif</option>--}}
                                        {{--@forelse($years as $m)--}}
                                            {{--<option value="{{$m->YearEnding}}">{{$m->YearEnding}}</option>--}}
                                        {{--@empty--}}
                                        {{--@endforelse--}}
                                    {{--</select>&nbsp;&nbsp;--}}

                                    {{--<select name="Term" id="Term" class="form-control input-group-sm col-md-4" required>--}}
                                        {{--<option @if ($term != null)value="{{$term}}" @endif selected >@if ($term != null){{$term}} @else Select Term @endif</option>--}}
                                        {{--<option value="1" >1</option>--}}
                                        {{--<option value="2" >2</option>--}}
                                        {{--<option value="3" >3</option>--}}
                                        {{--@forelse($appStatus as $country)--}}
                                        {{--<option value="{{$country->StatusID}}">{{$country->StatusName}}</option>--}}
                                        {{--@empty--}}
                                        {{--@endforelse--}}
                                    {{--</select>&nbsp;&nbsp;--}}
                                    {{-- <select name="studForm" id="studForm" class="form-control input-group-sm col-md-4" required>--}}
                                        {{--<option @if ($grade != null) value="{{$grade}}" @endif selected >@if ($grade != null){{$grade}} @else Select Grade @endif</option>--}}
                                       {{----}}
                                        {{--@forelse($grades as $m)--}}
                                            {{--<option value="{{$m->StudYear}}">{{$m->StudYear}}</option>--}}
                                        {{--@empty--}}
                                        {{--@endforelse--}}
                                    {{--</select> --}}
                                    {{--&nbsp;--}}
                                    {{--<input type="text" name="search" class="form-control pull-right" placeholder="Search" required>--}}

                                    {{--<div class="input-group-btn">--}}
                                        {{--<button type="submit" title="search" class="btn btn-default"><i class="fa fa-search"></i></button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
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
                {{--<div class="card">--}}
                    {{--<div class="card-body">--}}
                        {{--<div class="pull-right">--}}

                            {{--<a href="/classes" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">--}}
                                {{--<i class="fa fa-table"></i> Show Data--}}
                            {{--</a>--}}

                            {{--<a href="/classes/create" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">--}}
                                {{--<i class="fa fa-plus-circle"></i> Add Data--}}
                            {{--</a>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}


            <div class="row">
                <div class="col-md-6">
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            <strong>Activities</strong>
                           
                            <div class="pull-right">
                                @if (Auth::user()->hasAnyRole(['Administrator','Activity - Admin']))
                                <button class="btn btn-sm btn-primary" title="Add Activity" onclick="setactparamss('{{$year}}','{{$term}}')" data-toggle="modal" data-target="#addGroup">  <i class="fa fa-plus"></i></button>
                                    @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover" id="example">
                                <thead>
                                <tr>
                                    {{--<th>Year</th>--}}
                                    {{--<th>Term</th>--}}
                                    <th>Activity</th>
                                    <th>Abbreviation</th>
                                    <th>Teacher</th>

                                    <th>Students</th>

                                    
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($activities as $department)
                                    {{ csrf_field() }}
                                    {{--<tr onclick="getSetStudents('{{$department->ActID}}', '{{route('getSetStudents',$department->ActID)}}','{{$department->subject->SubjCode.' | '.$department->subject->Subject.' ('.$department->Section.')'.' '.$department->students->count()}}')"> --}}
                                        <tr onclick="getActStudents('{{$department->ActID}}', '{{route('getActStudents',$department->ActID)}}' ,'{{$department->ActName}}','{{$department->students->count()}}')">
                                        {{--<td>{{$department->TermYear}}</td>--}}
                                        {{--<td>{{$department->Term}}</td>--}}
                                        <td>{{$department->ActName}}</td>
                                        <td>{{$department->ActAbbr}}</td>
                                            <td>{{$department->teachers->first()->staff->LastName ?? ""}} {{$department->teachers->first()->staff->FirstName ??""}}</td>


                                            <td>
                                            {{$department->students->count()}}
                                                {{--{{$department->getCountActStudents($department->ActID)}}--}}
                                                <div class="pull-right">

                                                    <a href="{{route('marks',$department->ActID)}}" class="text-primary" title="Edit Comments"><i class="fa fa-pencil"></i> </a>


                                                    {{--<a href="{{route('marks',$department->ActID)}}" class="text-primary" title="Edit Activity"><i class="fa fa-edit"></i> </a>--}}
                                                    @if (Auth::user()->hasAnyRole(['Administrator','Activity - Admin']))
                                                    <a href=""  title="Edit Activity Group" onclick="editactparams('{{$year}}','{{$term}}' ,'{{$department->ActID}}' ,'{{$department->teachers->first()->staff->StaffID}}' ,'{{$department->ActName}}' ,'{{$department->ActAbbr}}') " data-toggle="modal" data-target="#editActGroup">  <i class="fa fa-edit"></i></a>

                                                    {{--<a href="{{route('deleteActivity',$department->ActID)}}" class="text-primary" title="Delete"><i class="fa fa-trash"></i> </a>--}}

                                                    <form action="{{route('deleteActivity')}}" method="post">
                                                        {{csrf_field()}}
                                                        {{--{{method_field('Delete')}}--}}
                                                        <input class="hidden" name="ActID" value="{{$department->ActID}}" type="hidden" hidden>
                                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this Activity Group, Students and Comments)?');" class="text-danger" title="Delete"><i class="fa fa-trash"></i> </button>
                                                    </form>
                                                    @endif
                                                </div>
                                            </td>


                                            {{-- <td>
                                                {{$department->students->count()}}
                                                <div class="pull-right">
                                                    <a href="#createAssess" onclick="getSetId('{{$department->OGSID}}')" data-toggle="modal" class="text-warning" title="Create Assessments"><i class="fa fa-book"></i> </a>
                                                    <a href="{{route('showAssessment',$department->OGSID)}}" class="text-primary" title="Capture Marks"><i class="fa fa-pencil"></i> </a>
                                                </div>
                                            </td> --}}
                                    </tr>

                                @empty

                                @endforelse

                                </tbody>
                            </table>
                            {{-- <ul class="pagination">--}}
                                {{--{{ $classes->links() }}--}}
                            {{--</ul> --}}
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    @include('toast::messages')
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <strong>
                            <i id="ActName"></i> |

                            <i id="Size"></i>
                                <i id="ActID" hidden class="hidden"></i>
                            Students
                            </strong>
                            <div class="pull-right">
                                @if (Auth::user()->hasAnyRole(['Administrator','Activity - Admin']))
                                <button class="btn btn-sm btn-primary" onclick="getActData()" data-toggle="modal" data-target="#addActSet" title="Add Students"><i class="fa fa-plus"></i> </button>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover" id="actStudent">
                                <thead>
                                <tr>
                                    <th>StudentID</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th></th>
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
    <div class="modal fade" id="addGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-book"></i> Add Activity Group</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form  class="form-horizontal" action="{{route('addActGroup')}}" method="post">
                    <div class="modal-body ">
                        {{csrf_field()}}
                        <input type="hidden" id="ActID" name="ActID"  hidden>
                        <input type="hidden" id="TermYear" name="TermYear"  hidden>
                        <input type="hidden" id="Term"  name="Term" hidden>
                        <input type="hidden"  value="4" name="GroupID" hidden>
                        <input type="hidden"  value="1" name="CategoryID" hidden>
                        <input type="hidden"  value="General" name="ActType" hidden>


                        {{-- <input type="hidden" name="OGYear" value="{{$currentSession->TermYear}}" hidden>
                        <input type="hidden" hidden value="{{$currentSession->Term}}" name="OGTerm">
                        @if ($currentTimeTable != null)
                        <input type="hidden" hidden value="{{$currentTimeTable->TTID}}" name="TTID">
                        @endif --}}
                        <div class="form-group">
                            <label for="ActName">Activity Name</label>
                            <input type="text" id="ActName" name="ActName"  class="form-control" >
                        </div>


                        <div class="form-group">
                            <label for="ActAbbr">Abbreviation</label>
                            <input type="text" id="ActAbbr" name="ActAbbr"  class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="gender">Teacher</label>
                            <select name="Teacher1ID" id="Teacher1ID" class="form-control" required>
                                <option id="tid" value="" selected ></option>
                                @forelse($teachers as $m)
                                    <option value="{{$m->StaffID}}">{{$m->LastName.' '.$m->FirstName.' '.$m->Code}}</option>
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

    <div class="modal fade" id="editActGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myActModalLabel"><i class="fa fa-book"></i> Edit Activity Group</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form  class="form-horizontal" action="{{route('editActGroup')}}" method="post">
                    <div class="modal-body ">
                        {{csrf_field()}}
                        <input type="hidden" id="TermYear" name="TermYear"  hidden>
                        <input type="hidden" id="ActID" name="ActID"  hidden>
                        <input type="hidden" id="Term"  name="Term" hidden>
                        <input type="hidden"  value="4" name="GroupID" hidden>
                        <input type="hidden"  value="1" name="CategoryID" hidden>
                        <input type="hidden"  value="General" name="ActType" hidden>


                        {{-- <input type="hidden" name="OGYear" value="{{$currentSession->TermYear}}" hidden>
                        <input type="hidden" hidden value="{{$currentSession->Term}}" name="OGTerm">
                        @if ($currentTimeTable != null)
                        <input type="hidden" hidden value="{{$currentTimeTable->TTID}}" name="TTID">
                        @endif --}}
                        <div class="form-group">
                            <label for="ActName">Activity Name</label>
                            <input type="text"  id="ActName" name="ActName"  class="form-control" >
                        </div>


                        <div class="form-group">
                            <label for="ActAbbr">Abbreviation</label>
                            <input type="text"  id="ActAbbr"  name="ActAbbr"  class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="gender">Teacher</label>
                            <select name="Teacher1ID" id="Teacher1ID" class="form-control" required>
                                <option id="tid" value="" selected >Select Teacher</option>
                                @forelse($teachers as $m)
                                    <option value="{{$m->StaffID}}">{{$m->LastName.' '.$m->FirstName.' '.$m->Code}}</option>
                                @empty
                                @endforelse
                            </select>&nbsp;
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="modal fade" id="addActSet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-street-view"></i> Add Student</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form  class="form-horizontal" action="{{route('addStudentActivity')}}" method="post">
                        <div class="modal-body anyClass">
                            {{csrf_field()}}

                            <input type="hidden" name="ActivityID" id="ActivityID" class="hidden">
                            <div class="form-group">
                                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                            </div>
                            <div class="form-group">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>FullName</th>
                                    </tr>
                                    </thead>
                                    <tbody id="myTable">
                                    @forelse($students as $m)
                                        <tr>
                                            <td>
                                                {{$m->LastName.' '.$m->FirstName.' '.$m->MiddleName}}
                                                <div class="pull-right">
                                                    <label class="switch switch-icon switch-primary">
                                                        <input type="checkbox" class="switch-input"  name="StudID[]" value="{{$m->StudentID}}">
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
                            </div><!--/form-group-->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="createAssess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-book"></i> Add Assessments</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form  class="form-horizontal" action="{{route('createassessment')}}" method="post">
                        <div class="modal-body ">
                            {{csrf_field()}}

                            <input type="hidden" name="setId" id="setId" class="hidden">

                            <div class="form-group">
                               Are You Sure You Want To Create Assessments ?
                            </div><!--/form-group-->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
