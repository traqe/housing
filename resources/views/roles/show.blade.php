@extends('master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <!-- Default box -->
            <div class="card">
                <div class="card-body">

                    <div class="box-tools pull-right">
                        <a href="{{route('roles')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                            <i class="fa fa-table"></i> Show Data
                        </a>


                        <a href="{{route('createRole')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                            <i class="fa fa-plus-circle"></i> Add Data
                        </a>

                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <i class="fa fa-info-circle"></i>
                    <strong>View Role</strong>
                    <small>Table</small>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-detail" class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Role Name</td>
                                    <td>{{$gender->role}}</td>
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