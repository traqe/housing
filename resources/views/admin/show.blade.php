@extends('master')



@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="{{route('admin')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>


                            <a href="{{route('createUser')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
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
                            <strong>Grade</strong>
                            <small>Details</small>
                        </i>
                        <div class="pull-right">
                           <button data-toggle="modal" data-target="#subjectgrade" class="btn btn-primary btn-sm"title="Add Subject to Class">
                                <i class="fa fa-plus-square"> Add</i>
                           </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-detail" class="table table-striped">
                                <tbody>
                                <tr>
                                    <td>Grade</td>
                                    <td>{{$grade->grade}}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>

@endsection
