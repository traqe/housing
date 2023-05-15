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



                        <a href="javascript:void(0)" id="btn_export_data" data-url-parameter="" title="Export Data" class="btn btn-sm btn-primary btn-export-data">
                            <i class="fa fa-upload"></i> Export Data
                        </a>

                        <a href="http://localhost:8000/admin/suppliers/import-data" id="btn_import_data" data-url-parameter="" title="Import Data" class="btn btn-sm btn-primary btn-import-data">
                            <i class="fa fa-download"></i> Import Data
                        </a>
                    </div>
                </div>
            </div>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card box-primary">
                <div class="card-header">
                    <i class="fa fa-file"></i>
                    <strong>send notification</strong>
                    <small>Form</small>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('repoNotify')}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input hidden type="text" name="stand_id" value="{{$stand->id}}" class="form-control input-group-lg reg_name">
                                <input hidden type="text" name="application_id" value="{{$application->id}}" class="form-control input-group-lg reg_name">
                                <div class="col-sm-12">
                                    <label for="gender">Contact Number</label>
                                    <input type="text" name="contact" value="{{$application->applicant->mobile}}" class="form-control input-group-lg reg_name" required>
                                </div>
                                <div class="col-sm-12">
                                    <label for="gender">Message</label><br>
                                    <textarea name="message" class="form-control input-group-lg reg_name" required>{{ 'Good day. '. $application->applicant->nationalid . ' ' .'Kindly note that your stand will be repossessed if you do not develop within the given time period.Visit Tsholotsho rdc offices for more info' }}</textarea>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle-o"></span> Send
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
</div>
@endsection