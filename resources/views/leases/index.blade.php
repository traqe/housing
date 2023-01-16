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
                    <strong>Lease</strong>
                    <small>Table</small>
                </div>
                <div class="card-body">
                    @include('layouts.partials.alerts')
                    <table class="table table-striped table-bordered table-hover"  id="example">
                        <thead>
                        <tr>
                            <th>Lease Number</th>
                            <th>Date Applied</th>
                            <th>Expiry Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($leases as $lease)
                            <tr>
                                <td>{{$lease->lease_no}}</td>
                                <td>{{$lease->date_applied}}</td>
                                <td>{{$lease->expiry_date}}</td>
                                <td>{{$lease->lease_status}}</td>
                                <td>
                                    <div class="pull-right box-tools">
                                       
                                        <a  class="text-primary"
                                            href="{{url('lease-renewal/'.$lease->lease_id.'/edit')}}"
                                            title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        
                                    </div>
                                </td>
                            </tr>

                        @empty

                        @endforelse

                        </tbody>
                    </table>
                    
                </div>
            </div>

        </div>

    </div>

    
    
@endsection
