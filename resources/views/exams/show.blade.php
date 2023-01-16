@extends('master')



@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="/exams" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>


                            <a href="/exams/create" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
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
                <!-- /.box -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-accent-primary">
                    <div class="card-header">
                        <i class="fa fa-info-circle"> <strong>View Exam</strong>  <small>Table</small></i>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-detail" class="table table-striped table-bordered ">
                                <tbody>
                                <tr>
                                    <td>Date</td>
                                    <td>{{$exam->examdate}}</td>
                                </tr>
                                <tr>
                                    <td>Time</td>
                                    <td>{{$exam->examtime}}</td>
                                </tr>
                                <tr>
                                    <td>Subject</td>
                                    <td>{{$exam->subject->subject}}</td>
                                </tr>
                                <tr>
                                    <td>Duration (Hrs)</td>
                                    <td>{{$exam->duration}}</td>
                                </tr>
                                <tr>
                                    <td>Year</td>
                                    <td>{{$exam->year}}</td>
                                </tr>
                                <tr>
                                    <td>Term</td>
                                    <td>{{$exam->term}}</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>{{$exam->totalmark}}</td>
                                </tr>
                                <tr>
                                    <td>Details</td>
                                    <td>{{$exam->details}}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6">
                <div class="card card-accent-primary">
                    <div class="card-header">
                        <i class="fa fa-users"> <strong>Assigned Classes</strong> <small>Table</small></i>
                        <div class="pull-right">
                            <button data-toggle="modal" data-target="#examgrade" class="btn btn-primary btn-sm"title="Assign Classes">
                                <i class="fa fa-pencil-square-o">Assign</i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover ">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Grade</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($examgrade as $gender)
                                    <tr>
                                        <td>{{$gender->id}}</td>
                                        <td>
                                            {{$gender->grade->grade}}
                                            {{--<div class="pull-right box-tools">--}}
                                                {{--<form method="post" action="{{route('deleteAssignment',$gender->id)}}">--}}
                                                    {{--{{ method_field('DELETE') }}--}}
                                                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                                    {{--<button type="submit" class="btn-sm btn btn-danger" title="Delete Record"><i class="fa fa-trash-o"></i> </button>--}}
                                                {{--</form>--}}
                                            {{--</div>--}}
                                            <div class="pull-right box-tools">
                                                {{--<a class="btn-sm btn btn-warning"--}}
                                                   {{--href="/exams/{{$gender->id}}"--}}
                                                   {{--title="View Details"><i class="fa fa-eye"></i>--}}
                                                {{--</a>--}}
                                                <a  class="btn-sm btn btn-danger"
                                                    href="{{route('deleteAssignment',$gender->id)}}"
                                                    title="Delete Record"><i class="fa fa-trash-o"></i>
                                                </a>
                                                {{--<a data-toggle="modal"  onclick="getGender('{{$gender->id}}')"  class="btn-sm btn btn-danger"--}}
                                                   {{--href="#deleteD"--}}
                                                   {{--title="Delete"><i class="fa fa-trash-o"></i>--}}
                                                {{--</a>--}}

                                            </div>
                                        </td>
                                    </tr>

                                @empty

                                @endforelse

                                </tbody>
                            </table>
                            <ul class="pagination">
                                {{ $examgrade->links() }}
                            </ul>
                            {{--<div class="card">--}}
                                {{--<div class="card-header">--}}
                                   {{----}}
                                {{--</div>--}}

                            {{--</div>--}}

                        </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

    </div>

    <div class="modal fade" id="examgrade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-book"></i> Select Classes for the {{$exam->year.' Term '.$exam->term.' '.$exam->subject->subject.' Examination'}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="{{route('examgrade')}}">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="row">
                                <input type="hidden" name="examid" id="examid" value="{{$exam->id}}">
                                <input type="hidden" name="created_by" id="created_by" value="{{Auth::user()->id}}">
                                {{--<input type="hidden" name="term" id="term" value="{{$term}}">--}}
                                {{csrf_field()}}
                                @forelse($grades as $s)
                                    <div class="checkbox col-md-2">
                                        <label for="checkbox2">
                                            <input type="checkbox"  style="zoom:1.0;" id="gradeid" name="grade_id[]"  value="{{$s->id}}"> {{$s->grade}}
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
@endsection
