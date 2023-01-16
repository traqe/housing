@extends('master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <!-- Default box -->
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">

                        <a href="{{route('batches')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                            <i class="fa fa-table"></i> Show Data
                        </a>


                        <a href="{{route('createBatch')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                            <i class="fa fa-plus-circle"></i> Add Data
                        </a>

                    </div>
                </div>
            </div>

            <div class="card box-primary">
                <div class="card-header">
                    <i class="fa fa-file"></i>
                    <strong>Create Batch</strong>
                    <small>Form</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('createBatch')}}">
                        <input class="hidden" type="hidden" name="created_by" value="{{Auth::user()->id}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="gender">Batch</label>
                            <input type="text" name="batch" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Batch Type</label>
                            <select name="batch_type_id" id="batch_type_id" class="form-control input-group-lg reg_name" required>
                                <option value="" selected>Select Batch Type</option>
                                @forelse($batchtypes as $c)
                                <option value="{{$c->id}}">{{$c->batchtype}}</option>
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