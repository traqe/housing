@extends('master')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-plus"></i>
                <strong>Waiting List Renewal</strong>
                <small>{{$applications->receipt}}</small>
            </div>
            <div class="card-body">

                <!--session to show beneficiary addition success-->
                @if (session('addSuccess'))
                <div class="alert alert-success">
                    {{ session('addSuccess') }}
                </div>
                @endif

                {{--@include('layouts.partials.alerts') --}}
                <form class="form-horizontal" action="{{ route('updateExpiryDate') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{Auth::user()->id }}" name="updated_by" />
                    <div class="form-group">
                    <label for="grave">Waiting List No.</label>
                        <input type="text" name="app_id" id="id_field" value="{{$applications->id}}" class="form-control" readonly="readonly" required>
                    </div>
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
</div>
@endsection