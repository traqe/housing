@extends('master')
@section('content')


    <div class="container-fluid">

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="col-md-12">
            <!-- Default box -->
            
            <div class="card card-accent-primary">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    <strong>Waiting List</strong>
                    <small>Table</small>
                </div>
                <div class="card-body">
                    @include('layouts.partials.alerts')
                    <table class="table table-striped table-bordered table-hover"  id="example">
                        <thead>
                        <tr>
                            <th>Waiting List No.</th>
                            <th>Name</th>
                            <th>National ID</th>
                            <th>Date Applied</th>
                            <th>Expiry Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($applications as $app)
                            <tr>
                                <td>{{$app->id}}</td>
                                <td>{{$app->applicant->firstname.' '.$app->applicant->surname}}</td>
                                <td>{{$app->applicant->nationalid}}</td>
                                <td>{{$app->created_at}}</td>
                                <td>{{$app->expiry_date}}</td>
                                <td>
                                    <div class="pull-right box-tools">
                                        <a  class="text-primary" data-toggle="modal" data-target="#renewapplication"
                                        href="#"
                                        title="Renew Application"><i class="fa fa-refresh"></i>
                                        </a>
                                        <a  class="text-warning"
                                            href="#"
                                            title="Edit Details"><i class="fa fa-eye"></i>
                                        </a>
                                        
                                    </div>
                                </td>
                            </tr>

                        

                        @endforeach

                        </tbody>
                    </table>
                    
                </div>
            </div>

        </div>

    </div>
    <div class="modal fade" id="renewapplication" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-book">Application Form Renewal</i></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form class="form-horizontal" action="{{ route('updateExpiryDate') }}" method="POST">
                
                        {{ csrf_field() }}
                        <input type="hidden" value="{{Auth::user()->id }}" name="updated_by"/>
                        <input type="hidden" value="{{$app->id }}" name="app_id"/>
                        <div class="form-group">
                            <label for="grave">Receipt No.</label>
                            <input type="text" name="receipt_no" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="grave">Expires On:</label>
                            <input type="date" name="expiry_date" class="form-control" required>
                        </div>
                        <input type="submit" class="btn btn-success pull-right">
                </form>
            </div>
        </div>
    </div>
    
    
@endsection
