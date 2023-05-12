@extends('master')
@section('content')
@if(session('alert'))
<div class="alert alert-success">
    {{ session('alert') }}
</div>
@endif
<div class="container-fluid">
    <div class="col-md-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">

                <div class="pull-left">
                    <h3><i class="fa fa-briefcase"> Rural Leases</i></h3>
                </div>
                <div class="pull-right">
                    <a href="{{ route('rurallease.index') }}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                        <i class="fa fa-table"></i> Show Data
                    </a>
                </div>
            </div>
        </div>

        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                <strong>Rural Lease</strong>
                <small>Update</small>
            </div>
            <div class="card-body">
                <div class="card-body">

                    <form method="post" action="{{ route('rurallease-update', $rurallease->id) }}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="gender">Lessee</label>
                            <select name="person_id" id="person_id" class="form-control input-group-lg reg_name">
                                <option selected value="{{$rurallease->person->id}}">{{$rurallease->person->firstname ." ". $rurallease->person->surname}}</option>
                                @foreach($applicants as $applicant)
                                <option value="{{$applicant->id}}">{{ $applicant->firstname ." ". $applicant->surname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender">Lease Number</label>
                            <input type="text" name="lease_no" class="form-control" value="{{$rurallease->lease_no}}" required>
                        </div>

                        <div class="form-group">
                            <label for="start-date">Date Issued</label>
                            <input type="date" name="date_applied" class="form-control" value="{{$rurallease->date_applied}}" required>
                        </div>
                        <div class="form-group">
                            <label for="end-date">Expiry Date</label>
                            <input type="date" name="expiry_date" class="form-control" value="{{$rurallease->expiry_date}}" required>
                        </div>

                        <div class="form-group">
                            <label for="end-date">Communal Land Area</label>
                            <input type="text" name="area" class="form-control" value="{{$rurallease->area}}" required>
                        </div>

                        <div class="form-group">
                            <label for="end-date">Business (Purpose)</label>
                            <input type="text" name="stand_purpose" class="form-control" value="{{$rurallease->stand_purpose}}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="formFile" class="form-label">Supporting Documents</label>
                            <input class="form-control" type="file" name="file">
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa  fa-check-circle"></span> Update Lease Details</button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>
@endsection