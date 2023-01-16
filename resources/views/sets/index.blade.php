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
                        <form class="form-horizontal" method="get" action="{{route('findSet')}}">
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 600px;">
                                    <select name="Year" id="Year" class="form-control input-group-sm col-md-4" required>
                                        <option @if ($year != null) value="{{$year}}" @endif selected >@if ($year != null){{$year}} @else Select Year @endif</option>
                                        @forelse($years as $m)
                                            <option value="{{$m->YearEnding}}">{{$m->YearEnding}}</option>
                                        @empty
                                        @endforelse
                                    </select>&nbsp;&nbsp;

                                    <select name="Term" id="Term" class="form-control input-group-sm col-md-4" required>
                                        <option @if ($term != null)value="{{$term}}" @endif selected >@if ($term != null){{$term}} @else Select Term @endif</option>
                                        <option value="1" >1</option>
                                        <option value="2" >2</option>
                                        <option value="3" >3</option>
                                        {{--@forelse($appStatus as $country)--}}
                                        {{--<option value="{{$country->StatusID}}">{{$country->StatusName}}</option>--}}
                                        {{--@empty--}}
                                        {{--@endforelse--}}
                                    </select>&nbsp;&nbsp;
                                    <select name="studForm" id="studForm" class="form-control input-group-sm col-md-4" required>
                                        <option @if ($grade != null) value="{{$grade}}" @endif selected >@if ($grade != null){{$grade}} @else Select Grade @endif</option>
                                        {{--<option value="F1" >F1</option>--}}
                                        {{--<option value="F2" >F2</option>--}}
                                        {{--<option value="F3" >F3</option>--}}
                                        {{--<option value="F4" >F4</option>--}}
                                        {{--<option value="L6" >L6</option>--}}
                                        {{--<option value="U6" >U6</option>--}}
                                        @forelse($grades as $m)
                                            <option value="{{$m->StudYear}}">{{$m->StudYear}}</option>
                                        @empty
                                        @endforelse
                                    </select>&nbsp;
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
                            <strong>Sets</strong>
                            <small>Table</small>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover" id="example">
                                <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Code</th>
                                    <th>Subject</th>
                                    <th>Educator</th>
                                    <th>Students</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($sets as $department)
                                    <tr onclick="getSetStudents('{{$department->OGSID}}', '{{route('getSetStudents',$department->OGSID)}}','{{$department->subject->SubjCode.' | '.$department->subject->Subject.' ('.$department->Section.')'.' '.$department->students->count()}}')">
                                        <td>{{$department->yearterm->AcYear}}</td>
                                        <td>{{$department->subject->SubjCode}}</td>
                                        <td>{{$department->subject->Subject.' ('.$department->Section.')'}}</td>
                                        <td>{{$department->teacher->LastName.' '.$department->teacher->FirstName.' '.$department->teacher->Code}}</td>
                                        <td>
                                            {{$department->students->count()}}
                                            {{--<div class="pull-right">--}}
                                                {{--<a href="/sets/{{$department->RowID}}/edit" class="text-primary"><i class="fa fa-edit"></i> </a>--}}
                                            {{--</div>--}}
                                        </td>
                                    </tr>

                                @empty

                                @endforelse

                                </tbody>
                            </table>
                            {{--<ul class="pagination">--}}
                                {{--{{ $classes->links() }}--}}
                            {{--</ul>--}}
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    @include('toast::messages')
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <strong>
                            <i id="SetName"></i>

                            <i id="Size"></i>
                                <i id="RowID" hidden class="hidden"></i>
                            Students
                            </strong>
                            <div class="pull-right">
                                <button class="btn btn-sm btn-primary" onclick="getSetData()" data-toggle="modal" data-target="#addStudentSet" title="Add Student Set"><i class="fa fa-plus"></i> </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-bordered table-hover" id="setStudent">
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

    <div class="row">
        <div class="modal fade" id="addStudentSet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-street-view"></i> Add Student</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form  class="form-horizontal" action="{{route('addStudentSet')}}" method="post">
                        <div class="modal-body anyClass">
                            {{csrf_field()}}

                            <input type="hidden" name="OGSID" id="OGSID" class="hidden">
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
    </div>
@endsection
