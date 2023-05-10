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
        <div class="card card-accent-primary">
            <div class="card-header">
                <div class="pull-left">
                    <i class="fa fa-align-justify"></i>
                    <strong>Rural Lease</strong>
                    <small>Table</small>
                </div>
                <div class="pull-right">
                    @if($applicants != NULL)
                    <button data-toggle="modal" data-target="#addrurallease" class="btn btn-sm btn-primary" title="Add Stage Inspection" onclick="myStand()">
                        <i class="fa fa-plus"> Add Rural Lease</i>
                    </button>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                        <tr>
                            <th>Lease No.</th>
                            <th>Lessee</th>
                            <th>Purpose</th>
                            <th>Date Applied</th>
                            <th>Expiry Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ruralleases as $rurallease)
                        <tr>
                            <td>{{$rurallease->lease_no}}</td>
                            <td>
                                {{$rurallease->person->firstname ." ". $rurallease->person->surname}}
                            </td>
                            <td>{{$rurallease->stand_purpose}}</td>
                            <td>{{$rurallease->date_applied}}</td>
                            <td>{{$rurallease->expiry_date}}</td>
                            <td>
                                @if( strtotime(date("now")) > strtotime($rurallease->expiry_date) )
                                EXPIRED
                                @else
                                {{$rurallease->lease_status}}
                                @endif
                            </td>
                            <td>
                                <div class="pull-right box-tools">
                                    <a class="text-warning" href="{{route('rurallease.show', $rurallease->id)}}" title="Show Details"><i class="fa fa-eye"></i>
                                    </a>
                                    <a class="text-primary" href="{{route('rurallease-edit', $rurallease->id)}}" title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                                    </a>
                                    <form method="POST" action="{{ route('rurallease.destroy', $rurallease->id)}}">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="text-danger fa fa-trash" onclick="return confirm('Are you sure you want to Delete Profile?')" title="Delete">
                                        </button>
                                    </form>
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
<!-- START ADD RURAL LEASE MODAL -->
<div class="modal fade" id="addrurallease" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-book"> Rural Lease</i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('rurallease.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{Auth::user()->id }}" name="created_by" />
                    <label for="grave">Lessee</label>
                    <select name="person_id" class="form-control input-group-lg reg_name" required>
                        @forelse($applicants as $applicant)
                        <option value="{{ $applicant->id }}">{{ $applicant->firstname . " " . $applicant->surname }}</option>
                        @empty

                        @endforelse
                    </select>
                    <br>
                    <div class="form-group">
                        <label for="grave">Lease Number</label>
                        <input type="text" name="lease_no" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="grave">Date Applied</label>
                        <input type="date" name="date_applied" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="grave">Expiry Date</label>
                        <input type="date" name="expiry_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="grave">Area</label>
                        <input type="text" name="area" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="grave">Purpose Of Stand</label>
                        <input type="text" name="stand_purpose" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="formFile" class="form-label">Supporting Documents</label>
                        <input class="form-control" type="file" name="file">
                    </div>
                    <input type="submit" class="btn btn-success pull-right">
                </form>
            </div>
        </div>
    </div>
    <!-- END ADD RURAL LEASE MODAL -->
    @endsection