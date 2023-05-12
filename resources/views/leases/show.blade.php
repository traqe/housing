@extends('master')
@section('content')

<div class="container-fluid">

    @include('leases.alert.alert')

    <div class="col-md-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">

                <div class="pull-left">
                    <h3><i class="fa fa-briefcase"> Leases</i></h3>
                </div>
                <div class="pull-right">
                    <a href="{{ route('printLease', $data->id) }}" id="btn_show_data" class="btn btn-sm btn-warning" title="Print Lease">
                        <i class="fa fa-file"></i> Print Lease Form
                    </a>
                    <a href="{{ route('lease') }}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                        <i class="fa fa-table"></i> Show Data
                    </a>
                </div>
            </div>
        </div>

        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                <strong>Lease</strong>
                <small>{{$data->lease_no}}</small>
            </div>
            <div class="card-body">
                @include('layouts.partials.alerts')

                <div class="card-body">


                    <div class="form-group">
                        <label for="gender">Stand Number</label>
                        <input type="text" id="search" name="search" class="form-control" value="{{$stand->stand_no}}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="gender">Lease Number</label>
                        <input type="text" name="lease_number" class="form-control" value="{{$data->lease_no}}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="start-date">Status</label>
                        <input type="text" name="status" class="form-control" value="{{$data->lease_status}}" disabled>
                    </div>
                    @if($data->approval_status != null)
                    <div class="form-group">
                        <label for="start-date">Approval Status</label>
                        <input type="text" name="status" class="form-control" value="{{$data->approval_status}}" disabled>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="start-date">Date Issued</label>
                        <input type="date" name="date_applied" class="form-control" value="{{$data->date_applied}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="end-date">Expiry Date</label>
                        <input type="date" name="expiry_date" class="form-control" value="{{$data->expiry_date}}" disabled>
                    </div>

                    <!-- if document is not null show downloadable doc -->
                    @if($document)
                    <div class="form-group mb-3">
                        <h5><a href="{{asset('storage/documents/leases/'.$document->document_name)}}" target="_blank">
                                Download Documents <i class="fa fa-download"></i>
                            </a></h5>
                    </div>
                    @endif

                    <div class="form-group">
                        @if($data->lease_status == 'PENDING')
                        <button class="btn btn-success pull-right" data-toggle="modal" data-target="#approveModal">
                            <span class="fa  fa-thumbs-up"></span> Approve Lease
                        </button>
                        @include('leases.modals.approve')

                        <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#rejectModal">
                            <span class="fa  fa-thumbs-down"></span> Reject Lease
                        </button>
                        @include('leases.modals.reject')

                        @elseif($data->lease_status == 'EXPIRED')
                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#renewModal">
                            <span class="fa  fa-check-circle"></span> Renew Lease
                        </button>
                        @include('leases.modals.renew')

                        @elseif($data->lease_status == 'ACTIVE')
                        <button class="btn btn-info pull-right" data-toggle="modal" data-target="#terminateModal">
                            <span class="fa  fa-star"></span> Terminate Lease
                        </button>
                        @include('leases.modals.terminate')
                        @endif
                    </div>


                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>

</div>

@endsection