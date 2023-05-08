@extends('master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">

                        <a href="{{route('stands')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                            <i class="fa fa-table"></i> Show Data
                        </a>


                        <a href="{{route('createStand')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                            <i class="fa fa-plus-circle"></i> Add Data
                        </a>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-file"></i>
                    <strong>Edit Stand</strong>
                    <small>Form</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('updateStand',$stand->id )}}">
                        <input class="hidden" type="hidden" name="updated_by" value="{{Auth::user()->id}}">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="gender">Stand No</label>
                            <input type="text" name="stand_no" value="{{$stand->stand_no}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Type</label>
                            <select name="type" id="type" class="form-control input-group-lg reg_name" required>
                                <option selected disabled value="{{$stand->type}}">{{$stand->type}}</option>
                                @forelse($standTypes as $type)
                                <option value="{{$type->stand_type}}">{{$type->stand_type}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender">Stand Class</label>
                            <select name="stand_class" id="stand_class" class="form-control input-group-lg reg_name" required>
                                <option selected disabled value="{{$stand->stand_class != null ? $stand->stand_class : ''}}">{{$stand->stand_class != null ? $stand->stand_class : ''}}</option>
                                @forelse($standClasses as $class)
                                <option value="{{$class->class}}">{{$class->class}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender">Development Status</label>
                            <select name="dvp_status" id="dvp_status" class="form-control input-group-lg reg_name" required>
                                <option selected disabled value="{{$stand->dvp_status}}">{{$stand->dvp_status}}</option>
                                @forelse($status as $type)
                                <option value="{{$type->stage}}">{{$type->stage}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender">Date</label>
                            <input type="date" name="date" value="{{$stand->date}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Address</label>
                            <input type="text" name="address" value="{{$stand->address}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Location</label>
                            <input type="text" name="location" value="{{$stand->location}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Town City</label>
                            <input type="text" name="town_city" value="{{$stand->town_city}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Size</label>
                            <input type="text" name="size" value="{{$stand->size}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Price</label>
                            <input type="text" name="price" value="{{$stand->price}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Status</label>
                            <input disabled type="text" name="status" value="{{$stand->status}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Owner</label>
                            <select name="owner" id="owner" class="form-control input-group-lg reg_name" onclick="loadDevelopers()" required>
                                <option selected disabled value="">Select Stand Owner</option>
                                <option value="Council">Council</option>
                                <option value="Developer">Developer</option>
                            </select>
                            <!-- <input type="text"  name="owner"  value="{{$stand->owner}}" class="form-control" required> -->
                        </div>
                        {{--<div class="form-group">
                            <label for="gender">Developer Name</label>
                            <input type="text" name="developer" value="{{$stand->developer}}" class="form-control" required>
                </div>--}}
                <div class="form-group">
                    <label for="gender">Developer</label>
                    <select name="developer" id="developer" class="form-control input-group-lg reg_name" required>
                        <option selected disabled>Select Developer</option>
                        @forelse($developers as $developer)
                        <option value="{{$developer->id}}">{{$developer->name.' - '.$developer->address}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                {{--<div class="form-group">--}}
                {{--<label for="gender">Application Id</label>--}}
                {{--<input type="text" name="application_id" value="{{$stand->application_id}}"--}}
                {{--class="form-control" required>--}}
                {{--</div>--}}
                <div class="form-group">
                    <label for="gender">Batch</label>
                    <select name="batch_id" id="batch_id" class="form-control input-group-lg reg_name" required>
                        <option selected disabled value="">Select Batch</option>
                        @forelse($batches as $batch)
                        <option value="{{$batch->id}}">{{$batch->batch}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="gender">Allocation Batch Number</label>
                    <input type="text" name="allo_batch_no" value="{{$stand->allo_batch_no}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="gender">Service Status</label>
                    <input type="text" name="serviced_status" value="{{$stand->serviced_status}}" class="form-control" required>
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