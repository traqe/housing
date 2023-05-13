@extends('master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="{{route('wards')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>


                            <a href="{{route('createWard')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>



                            <a href="javascript:void(0)" id="btn_export_data" data-url-parameter="" title="Export Data" class="btn btn-sm btn-primary btn-export-data">
                                <i class="fa fa-upload"></i> Export Data
                            </a>

                            <a href="http://localhost:8000/admin/suppliers/import-data" id="btn_import_data" data-url-parameter="" title="Import Data" class="btn btn-sm btn-primary btn-import-data">
                                <i class="fa fa-download"></i> Import Data
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card box-primary">
                    <div class="card-header">
                        <i class="fa fa-file"></i>
                        <strong>Create Business Centre</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('createBuscentre')}}">
                            <input class="hidden" type="hidden" name="created_by" value="{{Auth::user()->id}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="gender">Ward</label>
                                <select name="ward_id" id="ward_id" class="form-control input-group-lg reg_name" required>
                                    <option selected disabled value="">Select Ward</option>
                                    @forelse($wards as $wards)
                                        <option value="{{$wards->id}}">{{$wards->name}}</option>
                                    @empty
                                    @endforelse
                                </select>

                            </div>
                                <label for="name">Name</label>
                                <input type="text"  name="name" class="form-control" required>
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
