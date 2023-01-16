@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="/terms" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>


                            <a href="/terms/create" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>



                            {{--<a href="javascript:void(0)" id="btn_export_data" data-url-parameter="" title="Export Data" class="btn btn-sm btn-primary btn-export-data">--}}
                                {{--<i class="fa fa-upload"></i> Export Data--}}
                            {{--</a>--}}

                            {{--<a href="http://localhost:8000/admin/suppliers/import-data" id="btn_import_data" data-url-parameter="" title="Import Data" class="btn btn-sm btn-primary btn-import-data">--}}
                                {{--<i class="fa fa-download"></i> Import Data--}}
                            {{--</a>--}}
                        </div>
                    </div>
                </div>

                <div class="card box-primary">
                    <div class="card-header">
                        <i class="fa fa-file"></i>
                        <strong>Create Subject</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/terms">
                            <input class="hidden" type="hidden" name="created_by" value="{{Auth::user()->id}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="gender">Year</label>
                                <input type="number"  name="year" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Term</label>
                                <input type="number"  name="term" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Start Date</label>
                                <input type="date"  name="startDate" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">End Date</label>
                                <input type="date"  name="endDate" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <select name="status" id="status" class="form-control input-group-lg reg_name" required>
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="1" >Active</option>
                                    <option value="0" >Inactive</option>

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
