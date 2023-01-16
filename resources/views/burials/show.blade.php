@extends('master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                            <a href="{{route('burials')}}" id="btn_show_data" class="btn btn-sm btn-primary"
                               title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>
                            <a href="{{route('createBurial')}}" id="btn_add_new_data" class="btn btn-sm btn-success"
                               title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>
                            <a href="{{route('printBurial',$burial->id)}}" id="btn_add_new_data" class="btn btn-sm btn-success"
                               title="Add Data">
                                <i class="fa fa-plus-circle"></i> Print
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-info-circle"></i>
                                <strong>View Stand</strong>
                                <small>Table</small>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table-detail" class="table table-bordered table-sm table-striped">
                                        <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>{{$burial->id}}</td>
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{$burial->d_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Surname</td>
                                            <td>{{$burial->d_surname}}</td>
                                        </tr>
                                        <tr>
                                            <td>Date Of Birth</td>
                                            <td>{{$burial->d_dob}}</td>
                                        </tr>
                                        <tr>
                                            <td>Date Of Death</td>
                                            <td>{{$burial->d_dod}}</td>
                                        </tr>
                                        <tr>
                                            <td>Interminant Date</td>
                                            <td>{{$burial->d_internment_date}}</td>
                                        </tr>
                                        <tr>
                                            <td>Funeral Policy</td>
                                            <td>{{$burial->d_fpolicy}}</td>
                                        </tr>
                                        <tr>
                                            <td>Relative Name</td>
                                            <td>{{$burial->r_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Relative Contact</td>
                                            <td>{{$burial->r_contact}}</td>
                                        </tr>
                                        <tr>
                                            <td>Grave ID</td>
                                            <td>{{$burial->grave_id}}</td>
                                        </tr>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-info-circle"></i>
                                <strong>Attachments</strong>
                                
                                
                            </div>
                            <div class="card-body">
                                @if ($burial->burial_order != null)
                                <label>{{ $burial->burial_order }}</label>
                                <a href="{{url('/download',$burial->burial_order)}}" id="btn_add_new_data" class="btn btn-sm btn-success"
                                    title="Add Data">
                                    
                                    <i class="fa-thin fa-arrow-down"></i> Download
                                 </a>
                                @else
                                    <h4> No Files Uploaded</h4>
                                @endif
                                
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>

                </div>

                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection