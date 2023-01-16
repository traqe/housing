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

            <div class="row">
                <div class="col-md-3">
                    @forelse($assessments as $subjecty)
                        <div class="card card-accent-primary">
                            <div class="card-header">
                                <i class="fa fa-book">
                                    <strong>
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$subjecty->id}}" aria-expanded="false" class="collapsed">
                                            {{$subjecty->subject->subject}} {{$subjecty->title}}
                                        </a>
                                    </strong>
                                </i>
                            </div>
                            <div id="collapse{{$subjecty->id}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <div class="card-body">
                                    <div class="table-responsive table-bordered">
                                        <table id="table-detail" class="table table-striped">
                                            <tbody>
                                            <tr>
                                                <td><strong>Title</strong></td>
                                                <td>{{$subjecty->title}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Weight</strong></td>
                                                <td>{{$subjecty->weight}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Total</strong></td>
                                                <td>{{$subjecty->totalmark}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
                <div class="col-md-9">
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            <strong>{{$year.' Term '. $term.', Grade '.$grade.' '. $subject.' Marks'}}</strong>

                            <div class="pull-right">
                                <a href=""  class="btn btn-primary btn-sm"title="Load Marks">
                                    <i class="fa fa-book"> Load</i>
                                </a>
                            </div>
                            {{--<small>Table</small>--}}
                        </div>
                        <div class="card-body" >
                            <table class="table table-striped table-bordered table-hover">
                                <input class="hidden" type="hidden" id="students" value="{{str_replace('"', "'", json_encode($students))}}"/>
                                <thead>
                                <tr>
                                    <th>#</th>
                                    {{--<th>Year</th>--}}
                                    {{--<th>Term</th>--}}
                                    <th>Name</th>
                                    <th>Student ID</th>
                                    @forelse($assessments as $a)
                                        <th>{{$a->title}}</th>
                                    @empty
                                    @endforelse
                                    <th>CW</th>
                                    <th>EXAM</th>
                                    <th>OM</th>
                                    <th>GRADE</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($studentgrade as $s)
                                    <tr>
                                        <td>{{$s->student->id}}</td>
                                        {{--<td>{{$s->year}}</td>--}}
                                        {{--<td>{{$s->term}}</td>--}}
                                        <td>{{$s->student->person->firstname.' '.$s->student->person->surname}}</td>
                                        <td>{{$s->student->candidatenumber}}</td>
                                        @forelse($assessments as $a)
                                            <td>@if($a->assessmentresult->where('studentid',$s->student->candidatenumber)->first() != null){{$a->assessmentresult->where('studentid',$s->student->candidatenumber)->first()->mark}}@endif</td>
                                        @empty
                                        @endforelse
                                        <td>
                                            @if ($exams->where('student_id',$s->student->candidatenumber)->first() != null) {{$exams->where('student_id',$s->student->candidatenumber)->first()->cw}} @endif
                                        </td>
                                        <td class="exams" id="{{$s->student->candidatenumber}}" data-token="{{csrf_token()}}"  data-year="{{$year}}"  data-term="{{$term}}" data-student_number="{{$s->student->candidatenumber}}" data-url="{{route('insertExam')}}" data-gradeid ="{{$gradeid}}" data-subjectid ="{{$subjectid}}" data-year ="{{$year}} "data-term ="{{$term}}" contenteditable> @if ($exams->where('student_id',$s->student->candidatenumber)->first() != null) {{$exams->where('student_id',$s->student->candidatenumber)->first()->exam}} @endif</td>
                                        <td>
                                            @if ($exams->where('student_id',$s->student->candidatenumber)->first() != null) {{$exams->where('student_id',$s->student->candidatenumber)->first()->overallmark}} @endif
                                        </td>
                                        <td>
                                            @if ($exams->where('student_id',$s->student->candidatenumber)->first() != null) {{$exams->where('student_id',$s->student->candidatenumber)->first()->grade}} @endif
                                        </td>
                                    </tr>

                                @empty

                                @endforelse

                                </tbody>
                            </table>
                            <div class="pull-right">
                                <a href="{{route('getBack',[$gradeid, $subjectid] )}}"  class="btn btn-success btn-sm"title="back">
                                    <i class="fa fa-arrow-left"> Go Back</i>
                                </a>
                                <a href="#"  class="btn btn-warning btn-sm"title="print">
                                    <i class="fa fa-print"> Print</i>
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
                    <form  class="form-horizontal" action="{{route('insertExam')}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}

                            {{--{{method_field('DELETE')}}--}}
                            <input type="hidden" name="grade_id" value="1" class="hiddenid">
                            <input type="hidden" name="subject_id" value="2" class="hiddenid">
                            <input type="hidden" name="id" id="idDepartment" class="hiddenid">
                            <input type="hidden" name="id" id="idDepartment" class="hiddenid">
                            <input type="hidden" name="id" id="idDepartment" class="hiddenid">
                            <input type="hidden" name="id" id="idDepartment" class="hiddenid">
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
