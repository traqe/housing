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
                    <a href="{{ route('costing-main-stage') }}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                        <i class="fa fa-table"></i> Show Data
                    </a>
                    <a href="#" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                        <i class="fa fa-plus-circle"></i> Add Data
                    </a>

                </div>
            </div>
        </div>
        
        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                <strong>Stage</strong>
                <small>Update</small>
            </div>
            <div class="card-body">
                @include('layouts.partials.alerts')

                <div class="card-body">
 
                    <form method="post" action="{{route('update-costing-main-stage',$data->id )}}">
                        {{csrf_field()}}
                        {{method_field('PUT')}}

                        <div class="form-group">
                            <label for="gender">Stage Name</label>
                            <input type="text" name="name" value="{{ $data->name }}" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa  fa-check-circle"></span> Update Stage</button>
                        
                    </form>

                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>

</div>


@endsection