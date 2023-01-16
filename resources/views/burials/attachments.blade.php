@extends('master')
@section('content')
<h2>Attachments</h2>
<h2>Deceased Documents <span class="text-primary"></span></h2>
<a href="/" class="btn btn-primary">Go Back</a>
<div class="row mt-4">
    
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3" style="max-width:20rem;">
                <div class="card-body">
                    
                    <img src="{{ asset('/storage/photos/'.$burial->b_id) }}">
                </div>
            </div>
        </div>
    
</div>
@endsection