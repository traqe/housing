@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="/classes" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>


                            <a href="/classes/create" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
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
                        <strong>Edit Class</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('UpdateClass',$class->RowID)}}">
                            <input class="hidden" type="hidden" name="updated_by" value="{{Auth::user()->id}}">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="gender">Grade</label>
                                <select name="AcYear" id="AcYear" class="form-control input-group-lg reg_name" required>
                                    <option value="{{$class->AcYear}}"  selected>{{$class->AcYear}}</option>
                                    @forelse($grades as $staff)
                                        <option value="{{$staff->StudYear}}">{{$staff->StudYear}}</option>
                                    @empty
                                    @endforelse
                                </select>
                                {{--<input type="text"  name="department" class="form-control" required>--}}
                            </div>
                            <div class="form-group">
                                <label for="gender">Teacher</label>
                                <select name="TeacherID" id="TeacherID" class="form-control input-group-lg reg_name" required>
                                    <option value="{{$staff->StaffID}}" selected>@if ($class->Teacher != null){{$class->teacher->FirstName.' '.$class->teacher->LastName.' '.$class->teacher->Code}}@endif</option>
                                    @forelse($staffs as $staff)
                                        <option value="{{$staff->StaffID}}">{{$staff->FirstName.' '.$staff->LastName.' '.$staff->Code}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gender">Class Name</label>
                                <input type="text"  name="Class" value="{{$class->Class}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Year</label>
                                <input type="text"  name="ClYear" value="{{$year}}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="gender">Term</label>
                                <input type="text"  name="ClTerm" value="{{$term}}" class="form-control" readonly>
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
