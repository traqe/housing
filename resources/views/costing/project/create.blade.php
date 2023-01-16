@extends('master')
@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">

                <div class="pull-left">
                    <h3><i class="fa fa-briefcase"> Projects</i></h3>
                </div>
                <div class="pull-right">
                    <a href="{{ route('costing-project') }}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                        <i class="fa fa-table"></i> Show Data
                    </a>
                    <a href="{{ route('costing-project') }}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                        <i class="fa fa-plus-circle"></i> Add Data
                    </a>

                </div>
            </div>
        </div>
        
        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                <strong>Project</strong>
                <small>Create</small>
            </div>
            <div class="card-body">
                @include('layouts.partials.alerts')

                <div class="card-body">
 
                    <form method="post" action="{{ route('store-costing-project') }}">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="gender">Project Name</label>
                            <input type="text" name="project_name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Project Number</label>
                            <input type="text" name="project_number" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Site Number</label>
                            <input type="text" name="site_number" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Site Location</label>
                            <input type="text" name="site_location" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Project Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="project_description" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="gender">Start Date</label>
                            <input type="date" name="start_date" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="gender">Project Manager</label>
                            <input type="text" name="project_manager" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa  fa-check-circle"></span> Save Project</button>
                        
                    </form>

                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>

</div>


@endsection