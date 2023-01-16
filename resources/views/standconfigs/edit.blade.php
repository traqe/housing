@extends('master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">

                        <a href="{{route('standconfigs')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                            <i class="fa fa-table"></i> Show Data
                        </a>


                        <a href="{{route('createStandConfigs')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                            <i class="fa fa-plus-circle"></i> Add Data
                        </a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-file"></i>
                    <strong>Edit Stand Configuration</strong>
                    <small>Form</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('updateStandConfigs',$standconfig->id )}}">
                        <input class="hidden" type="hidden" name="updated_by" value="{{Auth::user()->id}}">
                        <input class="hidden" type="hidden" name="updated_at" value="{{\Carbon\Carbon::now()}}">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="gender">Stand Type</label>
                            <select name="stand_type_id" id="stand_type_id" class="form-control input-group-lg reg_name" required>
                                <option selected disabled value="{{$standconfig->stand_type_id}}">{{$standconfig->standtype->type}}</option>
                                @forelse($standTypes as $type)
                                <option value="{{$type->id}}">{{$type->type}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender">Stand Class</label>
                            <select name="stand_class_id" id="stand_class_id" class="form-control input-group-lg reg_name" required>
                                <option selected disabled value="{{$standconfig->standclass != null ? $standconfig->stand_class_id : ''}}">{{$standconfig->standclass != null ? $standconfig->standclass->class : ''}}</option>
                                @forelse($standClasses as $class)
                                <option value="{{$class->id}}">{{$class->class}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender">Number of Stands</label>
                            <input type="text" name="number_of_stands" value="{{$standconfig->number_of_stands}}" class="form-control" required>
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