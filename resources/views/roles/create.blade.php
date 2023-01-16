@extends('master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{--<div class="pull-left">--}}
                    {{--<form class="form-horizontal" method="get" action="{{route('search')}}">--}}
                    {{--<input type="text" name="search" required>--}}
                    {{--<button type="submit" class="btn btn-sm btn-primary" title="search"><i class="fa fa-search"></i> </button>--}}
                    {{--</form>--}}
                    {{--</div>--}}

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

            <!-- Default box -->
            <div class="card">
                <div class="card-header with-border">
                    <i class="fa fa-file"></i>
                    <strong>Create Role</strong>
                    <small>Form</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('createRole')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="gender">Role Name</label>
                            <input type="text" name="role" class="form-control" required>
                        </div>
                        <input type="submit" class="btn btn-success pull-right">
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
</div>
@endsection