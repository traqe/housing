@extends('master')



@section('content')
    <div class="container-fluid">
        <div class="row">
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



                            <a href="javascript:void(0)" id="btn_export_data" data-url-parameter="" title="Export Data" class="btn btn-sm btn-primary btn-export-data">
                                <i class="fa fa-upload"></i> Export Data
                            </a>

                            <a href="http://localhost:8000/admin/suppliers/import-data" id="btn_import_data" data-url-parameter="" title="Import Data" class="btn btn-sm btn-primary btn-import-data">
                                <i class="fa fa-download"></i> Import Data
                            </a>
                        </div>
                    </div>
                </div>
                {{--<div class="card card-accent-primary">--}}
                    {{--<div class="card-header">--}}
                        {{--<i class="fa fa-info-circle">--}}
                        {{--<strong>View Grade</strong>--}}
                        {{--<small>Table</small>--}}
                        {{--</i>--}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}
                        {{--<div class="table-responsive">--}}
                            {{--<table id="table-detail" class="table table-striped">--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td>Grade</td>--}}
                                    {{--<td>{{$grade->grade}}</td>--}}
                                {{--</tr>--}}

                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- /.box-body -->--}}
                {{--</div>--}}

                <div class="card card-accent-primary">
                    <div class="card-header">
                        <i class="fa fa-book">
                            <strong>Grade {{$grade->grade}} {{$year}} Term {{$term}} Subjects</strong>
                            <small>Table</small>
                        </i>
                        <div class="pull-right">
                           <button data-toggle="modal" data-target="#subjectgrade" class="btn btn-primary btn-sm"title="Add Subject to Class">
                                <i class="fa fa-plus-square"> Add</i>
                           </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Subject</th>
                                <th>Year</th>
                                <th>Term</th>
                                <th>Teacher</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($subjects as $subject)
                                <tr>
                                    <td>{{$subject->id}}</td>
                                    <td>{{$subject->subject}}</td>
                                    <td>{{$subject->year}}</td>
                                    <td>{{$subject->term}}</td>
                                    <td>
                                        {{$subject->firstname.' '.$subject->surname.' '.$subject->ecnumber}}
                                        <div class="pull-right box-tools">
                                            <a data-toggle="modal"  onclick="getSubject('{{$subject->id}}', '{{$subject->subject}}')"   class="btn-md btn btn-primary"
                                               href="#assign"
                                               title="Assign Teacher"><i class="fa fa-user-secret"></i>
                                            </a>

                                            <a data-toggle="modal"  onclick="getDepartment('{{$subject->id}}')"  class="btn-md btn btn-danger"
                                               href="#deleteD"
                                               title="Delete"><i class="fa fa-trash-o"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>

                            @empty

                            @endforelse

                            </tbody>
                        </table>
                        <ul class="pagination">

                            {{ $subjects->links() }}
                            {{--<li class="page-item"><a class="page-link" href="#">Prev</a></li>--}}
                            {{--<li class="page-item active">--}}
                            {{--<a class="page-link" href="#">1</a>--}}
                            {{--</li>--}}
                            {{--<li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                            {{--<li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                            {{--<li class="page-item"><a class="page-link" href="#">4</a></li>--}}
                            {{--<li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
                        </ul>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="subjectgrade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Select Subjects For {{$grade->grade}} {{$year}} Term {{$term}} Class</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="{{route('allocate')}}">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="row">
                                <input type="hidden" name="grade_id" id="grade_id" value="{{$grade->id}}">
                                <input type="hidden" name="year" id="year" value="{{$year}}">
                                <input type="hidden" name="term" id="term" value="{{$term}}">
                                {{csrf_field()}}
                                @forelse($AllSubjects as $s)
                                    <div class="checkbox col-md-6">
                                        <label for="checkbox2">
                                            <input type="checkbox"  style="zoom:1.0;" id="subject_id" name="subject_ids[]"  value="{{$s->id}}"> {{$s->subject}}
                                        </label>
                                    </div>
                                @empty
                                @endforelse
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="assign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Select Teacher</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="{{route('assign')}}">
                    <div class="modal-body">
                        <div class="col-md-12">
                            {{--<div class="row">--}}
                                {{csrf_field()}}
                                <input type="hidden" name="grade_subject_id" id="grade_subject_id">
                                <input type="hidden" name="created_by" id="created_by" value="{{Auth::user()->id}}">

                                <div class="form-group">
                                    <input type="text"  name="subject" id="subject" placeholder="subject" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <select name="teacher_id" id="teacher_id" class="form-control input-group-lg reg_name" required>
                                        <option value="" selected>Select Teacher</option>
                                        @forelse($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->person->firstname.' '.$teacher->person->surname.' - '.$teacher->ecnumber}}</option>
                                        @empty
                                        @endforelse

                                    </select>
                                </div>
                            {{--</div>--}}

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
