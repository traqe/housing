@extends('master')
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">
                            <a href="{{route('stageinspection')}}" id="btn_show_data" class="btn btn-sm btn-primary"
                               title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>
                            <a href="{{route('addStageInspections')}}" id="btn_add_new_data" class="btn btn-sm btn-success"
                               title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="card box-primary">
                    <div class="card-header">
                        <i class="fa fa-file"></i>
                        <strong>New Inspection</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('createStageInspection') }}">
                            <input class="hidden" type="hidden" name="created_by" value="{{Auth::user()->id}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="gender">Stand</label>
                                <select name="stage" id="stage" class="form-control input-group-lg reg_name" required>
                                    <option selected disabled value="">Select Inspected Stand</option>
                                    @forelse($allocation as $allocation)
                                        <option value="{{$allocation->stand_id}}">{{$allocation->stand->stand_no . ' ' . $allocation->stand->location}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gender">Stage</label>
                                <select name="stage" id="stage" class="form-control input-group-lg reg_name" required>
                                    <option selected disabled value="">Select Development Stage</option>
                                    @forelse($stages as $stages)
                                        <option value="{{$stages->stage}}">{{$stages->stage}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="grave">Inspector Name</label>
                                <input type="text" name="inspector_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">Inspection Status</label>
                                <input type="text" name="ins_status" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">Receipt No.</label>
                                <input type="text" name="receipt_no" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">Amount</label>
                                <input type="text" name="amount" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="grave">Inspection Date</label>
                                <input type="date" name="ins_date" class="form-control" required>
                            </div>
                            
                            <input type="submit" class="btn btn-success pull-right">
                        </form>
            </div>
        </div>
        </div>
    </div>
</div>

    
@endsection