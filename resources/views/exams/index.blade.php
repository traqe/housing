@extends('master')
@section('content')


    <div class="container-fluid">
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


            <div class="card card-accent-primary">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    <strong>Exams</strong>
                    <small>Table</small>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Details</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Subject</th>
                            <th>Duration(Hrs)</th>
                            <th>Total</th>
                            <th>Year</th>
                            <th>Term</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($exams as $gender)
                            <tr>
                                <td>{{$gender->id}}</td>
                                <td>{{$gender->details}}</td>
                                <td>{{$gender->examdate}}</td>
                                <td>{{$gender->examtime}}</td>
                                <td>{{$gender->subject->subject}}</td>
                                <td>{{$gender->duration}}</td>
                                <td>{{$gender->totalmark}}</td>
                                <td>{{$gender->year}}</td>

                                <td>
                                    {{$gender->term}}
                                    <div class="pull-right box-tools">
                                        <a class="btn-sm btn btn-warning"
                                           href="/exams/{{$gender->id}}"
                                           title="View Details"><i class="fa fa-eye"></i>
                                        </a>
                                        <a  class="btn-sm btn btn-primary"
                                            href="/exams/{{$gender->id}}/edit"
                                            title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <a data-toggle="modal"  onclick="getGender('{{$gender->id}}')"  class="btn-sm btn btn-danger"
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
                    {{--<ul class="pagination">--}}
                        {{--<li class="page-item"><a class="page-link" href="#">Prev</a></li>--}}
                        {{--<li class="page-item active">--}}
                            {{--<a class="page-link" href="#">1</a>--}}
                        {{--</li>--}}
                        {{--<li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                        {{--<li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                        {{--<li class="page-item"><a class="page-link" href="#">4</a></li>--}}
                        {{--<li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
                    {{--</ul>--}}
                </div>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="modal fade" id="deleteC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
                    </div>
                    <form  class="form-horizontal" action="/exams/{{0}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input type="hidden" name="id" id="id" class="hiddenid">
                            <input type="hidden" name="gender" id="gender" class="hiddenid">
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
