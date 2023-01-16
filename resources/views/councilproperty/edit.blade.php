@extends('master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="{{route('councilproperties')}}" id="btn_show_data" class="btn btn-sm btn-primary"
                               title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>
                            <a href="{{route('createCouncilProperties')}}" id="btn_add_new_data" class="btn btn-sm btn-success"
                               title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-file"></i>
                        <strong> Edit Property</strong>
                        <small>Form</small>
                    </div>
<div class="card-body">
    <form method="post" action="{{route('updateCouncilProperty',$property->id )}}">
        <input class="hidden" type="hidden" name="updated_by" value="{{Auth::user()->id}}">
            {{csrf_field()}}
            {{method_field('PUT')}}
            
                            <div class="form-group">
                                <label for="gender">Property Name</label>
                                <input type="text" name="name" value="{{$property->name}}" class="form-control" required>
                            </div>    
                            <div class="form-group">
                                <label for="gender">Property Address</label>
                                <input type="text" name="property_address" value="{{$property->property_address}}" class="form-control" required>
                            </div> 

                            <div class="form-group">
                                <label for="gender">Validity Status</label>
                                <input type="text" name="validity_status" value="{{$property->validity_status}}" class="form-control" required>
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