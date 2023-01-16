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

                    <form method="post" action="{{ route('lease-renewal') }}" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <input type="hidden" value="{{ $leaseId }}" name="lease_id" />

                        <div class="form-group">
                            <label for="gender">Narration</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="file-multiple-input">Upload Supporting Document</label>
                            <div class="col-md-9">
                                <input id="file" type="file" name="file" multiple="">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa  fa-check-circle"></span> Add Data</button>
                        
                    </form>
                    
                </div>
            </div>

        </div>

    </div>

    
    
@endsection
