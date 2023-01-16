@extends('master')
@section('content')
    <ol class="breadcrumb  ">
        <li class="breadcrumb-item"><a href="{{route('terms')}}">Terms</a> </li>
        <li class="breadcrumb-item"><a href="{{route('subjects')}}">Subjects</a></li>
        <li class="breadcrumb-item"><a href="{{route('roles')}}">Roles</a></li>
        <li class="breadcrumb-item"><a href="{{route('grades')}}">Grades</a></li>
        <li class="breadcrumb-item"><a href="{{route('classes')}}">Classes</a></li>
        <li class="breadcrumb-item"><a href="{{route('rollovers')}}">RollOver</a></li>
    </ol>


    <div class="container-fluid">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="/grades" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>


                            <a href="/grades/create" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>



                            {{--<a href="javascript:void(0)" id="btn_export_data" data-url-parameter="" title="Export Data" class="btn btn-sm btn-primary btn-export-data">--}}
                                {{--<i class="fa fa-upload"></i> Export Data--}}
                            {{--</a>--}}

                            {{--<a href="http://localhost:8000/admin/suppliers/import-data" id="btn_import_data" data-url-parameter="" title="Import Data" class="btn btn-sm btn-primary btn-import-data">--}}
                                {{--<i class="fa fa-download"></i> Import Data--}}
                            {{--</a>--}}
                        </div>
                    </div>
                </div>


                <div class="card card-accent-primary">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        <strong>Grades</strong>
                        <small>Table</small>
                    </div>
                    <div class="card-body">
                        {{--<input class="form-control" id="myInput" type="text" placeholder="Search..">--}}
                        {{--<br>--}}
                        {{--<table class="table table-striped table-bordered table-hover" id="myTable">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th>#</th>--}}
                                {{--<th>Grade</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@forelse($grades as $grade)--}}
                                {{--<tr>--}}
                                    {{--<td>{{$grade->id}}</td>--}}
                                    {{--<td>--}}
                                        {{--{{$grade->grade}}--}}
                                        {{--<div class="pull-right box-tools">--}}
                                            {{--<a class="btn-sm btn btn-warning"--}}
                                               {{--href="/grades/{{$grade->id}}"--}}
                                               {{--title="View Details"><i class="fa fa-eye"></i>--}}
                                            {{--</a>--}}
                                            {{--<a  class="btn-sm btn btn-primary"--}}
                                               {{--href="/grades/{{$grade->id}}/edit"--}}
                                               {{--title="Edit Details"><i class="fa fa-pencil-square-o"></i>--}}
                                            {{--</a>--}}
                                            {{--<a data-toggle="modal"  onclick="getDepartment('{{$grade->id}}')"  class="btn-sm btn btn-danger"--}}
                                               {{--href="#deleteD"--}}
                                               {{--title="Delete"><i class="fa fa-trash-o"></i>--}}
                                            {{--</a>--}}

                                        {{--</div>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}

                            {{--@empty--}}

                            {{--@endforelse--}}

                            {{--</tbody>--}}
                        {{--</table>--}}
                        {{--<ul class="pagination">--}}
                            {{--{{ $grades->links() }}--}}
                        {{--</ul>--}}

                        <div class="box-group" id="accordion">
                            @forelse($grades as $grade)
                                <div class="card card-accent-primary">
                                    <div class="card-header">
                                        <i class="fa fa-book">
                                            <strong>
                                                <a data-toggle="collapse" data-parent="#accordion" href="#scollapse{{$grade->StudYear}}" aria-expanded="false" class="collapsed">
                                                    {{$grade->StudYear}} Classes
                                                </a>
                                            </strong>
                                        </i>
                                        <div class="pull-right">
                                            <strong>
                                                {{--<a  href="{{route('getTimeTable',[$course->id, $i])}}" title="TimeTable"><i class="fa fa-calendar"></i> </a>--}}
                                            </strong>
                                        </div>
                                    </div>
                                    <div id="scollapse{{$grade->StudYear}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="card-body">

                                            <div class="pull-right">
                                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addClass" onclick="addClass('{{$grade->StudYear}}')" ><i class="fa fa-plus"></i> Add </button>
                                            </div>
                                            <br/>
                                            <br/>
                                            <table class="table table-sm table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Year</th>
                                                    <th>Term</th>
                                                    <th>Class</th>
                                                    <th>Teacher</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($classes as $class)
                                                        @if ($class->AcYear == $grade->StudYear)
                                                        <tr>
                                                            <td>{{$class->ClYear}}</td>
                                                            <td>{{$class->ClTerm}}</td>
                                                            <td>{{$class->Class}}</td>
                                                            <td>@if ($class->teacher != null){{$class->teacher->LastName.' '.$class->teacher->FirstName.' '.$class->teacher->Code}}@endif</td>
                                                        </tr>
                                                        @endif
                                                    @empty
                                                    @endforelse
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>

                            @empty

                            @endforelse
                        </div>
                    </div>



                    </div>
                </div>

        </div>

    </div>

    <div class="row">
        <div class="modal fade" id="addClass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add Class</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form  class="form-horizontal" action="/classes" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            {{--{{method_field('DELETE')}}--}}
                            <input type="hidden" name="AcYear" id="grade_id" class="hiddenid">
                            <div class="form-group">
                                <label for="gender">Year</label>
                                <input type="number"  name="ClYear" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Term</label>
                                <input type="number"  name="ClTerm" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Class Name</label>
                                <input type="text"  name="Class" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Class Teacher</label>
                                <select name="TeacherID" id="staff_id" class="form-control input-group-lg reg_name" required>
                                    <option value="" selected>Select Class Teacher</option>
                                    @forelse($staffs as $staff)
                                        <option value="{{$staff->StaffID}}">{{$staff->FirstName.' '.$staff->LastName.' '.$staff->ID}}</option>
                                    @empty
                                    @endforelse
                                </select>
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
