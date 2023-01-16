@extends('master')
@section('content')


    <div class="container-fluid">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="/departments" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>


                            <a href="/departments/create" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
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
                        <strong>Department</strong>
                        <small>Table</small>
                    </div>
                    <div class="card-body">
                        {{--<input class="form-control" id="myInput" type="text" placeholder="Search..">--}}
                        {{--<br>--}}
                        <table class="table table-sm table-bordered table-hover" id="example">
                            <thead>
                            <tr>
                                <th>Department</th>
                                <th>Head</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($departments as $department)
                                <tr>
                                    <td>{{$department->Department}}</td>
                                    <td>
                                        {{$department->head->first()->StaffID}}
                                        <div class="pull-right box-tools">
                                            <a class="text-warning"
                                               href="/departments/{{$department->RowID}}"
                                               title="View Details"><i class="fa fa-eye"></i>
                                            </a>
                                            <a  class="text-primary"
                                               href="/departments/{{$department->RowID}}/edit"
                                               title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            {{--<a data-toggle="modal"  onclick="getDepartment('{{$department->id}}')"  class="btn-sm btn btn-danger"--}}
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
                    <form  class="form-horizontal" action="/departments/{{0}}" method="post">
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
