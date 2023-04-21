@extends('master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">
                        <a href="#" id="btn_print_app" class="btn btn-sm btn-primary" title="Show Data">
                            <i class="fa fa-table"></i> Print Application
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
                    <strong>Renewal History</strong>
                    <small>Table</small>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-detail" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Receipt No.</th>
                                    <th>Expiry Date</th>
                                    <th>Date of renewal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($app_renewals as $renewal)
                                <tr>
                                    <td>{{ $renewal->receipt_no }}</td>
                                    <td>{{ $renewal->expires_on }}</td>
                                    <td>{{ $renewal->created_at }}</td>
                                </tr>
                                @endforeach
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