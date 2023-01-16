@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="/departments" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>


                            <a href="/departments/create" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
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
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-file"></i>
                        <strong>Edit Department</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/departments/{{$department->RowID}}">
                            <input class="hidden" type="hidden" name="updated_by" value="{{Auth::user()->id}}">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="gender">Department</label>
                                <input type="text"  name="department" value="{{$department->Department}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <select name="staff_id" id="staff_id" class="form-control input-group-lg reg_name" required>
                                    <option value="" selected>Select Head</option>
                                    @forelse($staffs as $staff)
                                        <option value="{{$staff->StaffID}}">{{$staff->FirstName.' '.$staff->LastName.' '.$staff->ID}}</option>
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