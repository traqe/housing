@extends('master')
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="{{route('graves')}}" id="btn_show_data" class="btn btn-sm btn-primary"
                               title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>

                            <a href="{{route('createGrave')}}" id="btn_add_new_data" class="btn btn-sm btn-success"
                               title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>


                        </div>
                    </div>
                </div>
                
                <div class="card box-primary">
                    <div class="card-header">
                        <i class="fa fa-file"></i>
                        <strong>Create Grave</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('createGrave')}}">
                            <input class="hidden" type="hidden" name="created_by" value="{{Auth::user()->id}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="grave">Grave No</label>
                                <input type="text" name="g_no" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">Site</label>
                                <input type="text" name="g_site" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">Lot</label>
                                <input type="text" name="g_lot" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">Stand No</label>
                                <input type="text" name="g_batch" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Status</label>
                                <select name="status" id="status" class="form-control input-group-lg reg_name" required>
                                    <option selected disabled value="">Select Stand Status</option>
                                    <option value="Occupied">Occupied</option>
                                    <option value="Available">Available</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="grave">Date</label>
                                <input type="date" name="g_date" class="form-control" required>
                            </div>
                            <input type="submit" class="btn btn-success pull-right">
                        </form>
            </div>
        </div>
        </div>
    </div>
</div>

    
@endsection