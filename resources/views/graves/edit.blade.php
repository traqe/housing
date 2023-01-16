@extends('master')
@section('content')

<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-file"></i>
                        <strong>Edit Stand</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('updateGrave',$grave->id )}}">
                            <input class="hidden" type="hidden" name="updated_by" value="{{Auth::user()->id}}">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="grave">Grave No</label>
                                <input type="text" name="g_no" value="{{$grave->g_no}}" class="form-control"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="grave">Site</label>
                                <input type="text" name="g_site" value="{{$grave->g_site}}" class="form-control"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="grave">Lot</label>
                                <input type="text" name="g_lot" value="{{$grave->g_lot}}" class="form-control"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Batch</label>
                                <input type="text" name="g_batch" value="{{$grave->g_batch}}" class="form-control"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Status</label>
                                <input type="text" name="g_status" value="{{$grave->g_status}}" class="form-control"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Date</label>
                                <input type="date" name="g_date" value="{{$grave->g_date}}" class="form-control"
                                       required>
                            </div>
                            
                            {{--<div class="form-group">--}}
                                {{--<label for="gender">Owner</label>--}}
                                {{--<input type="text"  name="owner"  class="form-control" required>--}}
                            {{--</div>--}}
                            <input type="submit" class="btn btn-success pull-right">
                        </form>
                    </div>   
                    </div>
                    </div>
                    </div>
                    </div>
@endsection