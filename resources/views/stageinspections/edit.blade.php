@extends('master')
@section('content')
<div class="container">
    <div class="container">
        <div class="col-md-12">
            <div class="card card-accent-primary">
                <div class="card-header">
                    <i class="fa fa-pencil"></i>
                    <strong>Development Inspection</strong>
                    <small>Edit</small>
                </div>
    <div class="card-body">
         <!--session to show beneficiary addition success-->
         @if (session('addSuccess'))
         <div class="alert alert-success">
             {{ session('addSuccess') }}
         </div>
         @endif

         {{--@include('layouts.partials.alerts')--}}
        <form method="post" action="{{ route('updateStageInspection',$stage_insp->id)}}" >
            <input class="hidden" type="hidden" name="stand_id" value="{{ $stage_insp->stand_id }}">       
            {{ csrf_field() }}
            {{method_field('PUT')}}
            <input type="hidden" value="{{Auth::user()->id }}" name="created_by">
            
             <div class="form-group">
                <label for="grave">Inspection Stage</label>
                <select name="stage" class="form-control input-group-lg reg_name" required>
                    @forelse($stages as $stages)
                    <option value="{{ $stages->stage}}">{{ $stages->stage }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            
            <div class="form-group">
                <label for="grave">Inspector Name</label>
                <input type="text" value="{{$stage_insp->inspector_name}}" name="inspector_name" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="grave">Inspection Status</label>
                <input type="text" value="{{ $stage_insp->ins_status }}" name="ins_status" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="grave">Receipt No.</label>
                <input type="text" value="{{ $stage_insp->receipt_no }}" name="receipt" class="form-control" required readonly>
            </div>
            <div class="form-group">
                <label for="grave">Inspection Date</label>
                <input type="text" value=" {{ $stage_insp->ins_date }}" name="ins_date" class="form-control" required>
            </div>

            <input type="submit" class="btn btn-success pull-right">
    </form>
    </div>
</div>
@endsection