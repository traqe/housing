@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="{{route('developers')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>


                            <a href="{{route('createDeveloper')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-file"></i>
                        <strong>Edit Developer</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('updateDeveloper',$developer->id )}}">
                            {{--<input class="hidden" type="hidden" name="updated_by" value="{{Auth::user()->id}}">--}}
                            {{--<input class="hidden" type="hidden" name="updated_at" value="{{\Carbon\Carbon::now()}}">--}}
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="gender">Name</label>
                                <input type="text"  name="name" value="{{$developer->name}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Address</label>
                                <input type="text"  name="address"  value="{{$developer->address}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Telephone</label>
                                <input type="text"  name="telephone"  value="{{$developer->telephone}}" class="form-control" required>
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
