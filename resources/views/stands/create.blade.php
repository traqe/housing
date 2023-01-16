@extends('master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <!-- Default box -->
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">

                        <a href="{{route('gender')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                            <i class="fa fa-table"></i> Show Data
                        </a>


                        <a href="{{route('createGender')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                            <i class="fa fa-plus-circle"></i> Add Data
                        </a>


                    </div>
                </div>
            </div>

            <div class="card box-primary">
                <div class="card-header">
                    <i class="fa fa-file"></i>
                    <strong>Create Stand</strong>
                    <small>Form</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('createStand')}}">
                        <input class="hidden" type="hidden" name="created_by" value="{{Auth::user()->id}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="gender">Stand No</label>
                            <input type="text" name="stand_no" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Type</label>
                            <select name="type" id="type" class="form-control input-group-lg reg_name" required>
                                <option selected disabled value="">Select Stand Type</option>
                                @forelse($standTypes as $type)
                                <option value="{{$type->type}}">{{$type->type}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender">Stand Class</label>
                            <select name="stand_class" id="stand_class" class="form-control input-group-lg reg_name" required>
                                <option selected disabled value="">Select Stand Class</option>
                                @forelse($standClasses as $type)
                                <option value="{{$type->class}}">{{$type->class}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender">Development Status</label>
                            <select name="dvp_status" id="dvp_status" class="form-control input-group-lg reg_name" required>
                                <option selected disabled value="">Select Development Status</option>
                                @forelse($status as $type)
                                <option value="{{$type->stage}}">{{$type->stage}}</option>
                                @empty
                                @endforelse
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="gender">Date</label>
                            <input type="date" name="date" value="{{date('Y-m-d')}}" class="form-control" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Location</label>
                            <input type="text" name="location" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Town/City</label>
                            <input type="text" name="town_city" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Size</label>
                            <input type="text" name="size" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Price</label>
                            <input type="text" name="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Status</label>
                            <select name="status" id="status" class="form-control input-group-lg reg_name" required>
                                <option selected disabled value="">Select Stand Status</option>
                                <option value="Allocated">Allocated</option>
                                <option value="Available">Available</option>
                                <option value="Under Cession">Under Cession</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender">Property Owner</label>
                            <select name="owner" id="owner" class="form-control input-group-lg reg_name" onclick="loadDevelopers()" required>
                                <option selected disabled value="">Select Stand Owner</option>
                                <option value="Council">Council</option>
                                <option value="Developer">Developer</option>
                            </select>
                        </div>

                        {{--<div class="form-group">--}}
                        {{--<label for="gender">Developer Name</label>--}}
                        {{--<input type="text"  name="developer"  class="form-control" required>--}}
                        {{--</div>--}}

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
                        {{--<input type="text" name="application_id" class="form-control" required>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                        {{--<label for="gender">Stand Batch Number</label>--}}
                        {{--<input type="text" name="stand_batch_no" class="form-control" required>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                        {{--<label for="gender">Allocation Batch Number</label>--}}
                        {{--<input type="text" name="allo_batch_no" class="form-control" required>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label for="gender">Service Status</label>
                            <select name="serviced_status" id="serviced_status" class="form-control input-group-lg reg_name" required>
                                <option selected disabled value="">Select Stand Status</option>
                                <option value="Serviced">Serviced</option>
                                <option value="Not Serviced">Not Serviced</option>
                            </select>
                        </div>

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