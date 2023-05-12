@extends('master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">

                        <a href="{{route('printCession', $cession->id)}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                            <i class="fa fa-table"></i> Print Cession
                        </a>


                        <a href="" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                            <i class="fa fa-plus-circle"></i> Add Data
                        </a>
                    </div>
                </div>
            </div>

            <div class="card col-md-6">
                <div class="card-header">
                    <i class="fa fa-info-circle"></i>
                    <strong>Cession Form</strong>
                    <small>Table</small>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-detail" class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Cedent's Full Name</td>
                                    <td>{{$cession->owner->firstname.' '.$cession->owner->surname}}</td>
                                </tr>
                                <tr>
                                    <td>National Registration No.</td>
                                    <td>{{$cession->owner->nationalid}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{$cession->owner->mobile}}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{$cession->owner->address}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <table id="table-detail" class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Cessionary's Full Name</td>
                                    <td>{{$cession->beneficiary->firstname.' '.$cession->beneficiary->surname}}</td>
                                </tr>
                                <tr>
                                    <td>National Registration No.</td>
                                    <td>{{$cession->beneficiary->nationalid}}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{$cession->beneficiary->mobile}}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{$cession->beneficiary->address}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <table id="table-detail" class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Stand No.</td>
                                    <td>{{$cession->stand->stand_no}}</td>
                                </tr>
                                <tr>
                                    <td>Stand Address</td>
                                    <td>{{$cession->stand->address}}</td>
                                </tr>

                                <tr>
                                    <td>Reason</td>
                                    <td>{{$cession->reason}}</td>
                                </tr>
                                <tr>
                                    <td>Cedent Witness</td>
                                    <td>{{$cession->cedent_witness}}</td>
                                </tr>
                                <tr>
                                    <td>Cessionary Witness</td>
                                    <td>{{$cession->cessionary_witness}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>

@endsection