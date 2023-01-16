@extends('master')
@section('content')


    <div class="container-fluid">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="/students" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>


                            <a href="/students/create" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
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


                <div class="card card-accent-primary">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        <strong>{{$subject.', '.$title}}</strong>

                        <div class="pull-right">
                            <button onclick="LoadMarks({{json_encode($students)}}, '{{$id}}')" class="btn btn-primary btn-sm"title="Load Marks">
                                <i class="fa fa-book"> Load</i>
                            </button>
                        </div>
                        {{--<small>Table</small>--}}
                    </div>
                    <div class="card-body" >
                        <table class="table table-striped table-bordered table-hover">
                            <input class="hidden" type="hidden" id="students" value="{{str_replace('"', "'", json_encode($students))}}"/>
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Student ID</th>
                                <th>Total</th>
                                <th>Mark</th>
                                <th>Class</th>
                                <th>Year</th>
                                <th>Term</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($studentgrade as $s)
                                <tr>
                                    <td>{{$s->student->id}}</td>
                                    <td>{{$s->student->person->firstname.' '.$s->student->person->surname}}</td>
                                    <td>{{$s->student->candidatenumber}}</td>
                                    <td>{{$total}}</td>
                                    <td class="exam_mark" id="{{$s->student->candidatenumber}}" data-token="{{csrf_token()}}" data-url="{{route('insertmark')}}" data-id1="{{$id}}" data-student_number ="{{$s->student->candidatenumber}}" data-total="{{$total}}" contenteditable>@if ($assessment->assessmentresult->where('studentid', $s->student->candidatenumber)->first() != null) {{$assessment->assessmentresult->where('studentid', $s->student->candidatenumber)->first()->mark}}@endif</td>
                                    <td>{{$s->grade->grade}}</td>
                                    <td>{{$s->year}}</td>

                                    {{--<td>{{$teachers->activities}}</td>--}}
                                    <td>
                                        {{$s->term}}
                                        <div class="pull-right box-tools">
                                            {{--<a class="btn-sm btn btn-warning"--}}
                                               {{--href="/students/{{$s->student->person->id}}"--}}
                                               {{--title="View Details"><i class="fa fa-eye"></i>--}}
                                            {{--</a>--}}
                                            {{--<a  class="btn-sm btn btn-primary"--}}
                                               {{--href="/students/{{$s->student->person->id}}/edit"--}}
                                               {{--title="Edit Details"><i class="fa fa-pencil-square-o"></i>--}}
                                            {{--</a>--}}
                                            {{--<a data-toggle="modal"  onclick="getDepartment('{{$s->student->person->id}}')"  class="btn-sm btn btn-danger"--}}
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
                        <div class="pull-right">
                            <a href="{{route('goBack',$id )}}"  class="btn btn-primary btn-sm"title="back">
                                <i class="fa fa-arrow-left"> Go Back</i>
                            </a>
                        </div>
                        <ul class="pagination">

                            {{--{{ $subjects->links() }}--}}
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
                </div>

        </div>

    </div>

    <div class="row">
        <div class="modal fade" id="deleteD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
                    </div>
                    <form  class="form-horizontal" action="/grades/{{0}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input type="hidden" name="id" id="idDepartment" class="hiddenid">
                            <div class="form-group">
                                <div class="col-sm-12" id="classro">
                                    Are you sure you want to delete data?
                                </div>
                            </div><!--/form-group-->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
