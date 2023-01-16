@extends('master')
@section('content')

<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="pull-right">
                    <a href="#" id="myBtn" class="btn btn-sm btn-primary"
                    title="Add Batch">
                     <i class="fa fa-table"></i> Add Batch
                 </a>

                    <a href="{{route('graves')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                        <i class="fa fa-table"></i> Show Data
                    </a>


                    <a href="{{route('createGrave')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                        <i class="fa fa-plus-circle"></i> Add Data
                    </a>

                </div>
            </div>
        </div>
        
    </div>
        <div class="card-body box-primary">
                <div class="card-header">
                    <i class="fa fa-file"></i>
                    <strong>Create GRAVES</strong>
                    <small>Form</small>
                
            <div class="card-body" >
                <form method="post" action="{{route('add_batch')}}">
                    <input class="hidden" type="hidden" name="created_by" value="{{Auth::user()->id}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="gender">Section</label>
                        <select name="g_section" id="g_section" class="form-control input-group-lg reg_name" required>
                            <option selected disabled value="">Select Cemetery Section</option>
                            @forelse($section as $section)
                                <option value="{{$section->name}}">{{$section->name}}</option>
                            @empty
                            @endforelse
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="gender">Number Of Graves</label>
                        <input type="text" name="no_of_graves" class="form-control" required>

                        <label for="gender">Starting Number</label>
                        <input type="text" name="starting_number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Site</label>
                        <input type="text" name="g_site" class="form-control" required>
                        
                        <label for="gender">Lot</label>
                        <input type="text" name="g_lot" class="form-control" required>

                        <label for="gender">Batch</label>
                        <input type="text" name="g_batch" class="form-control" required>

                        <label for="gender">Date</label>
                        <input type="date" name="g_date" class="form-control" required>
                    </div>
                    <input type="submit" class="btn btn-success pull-right">
                </form>
            </div>
            </div>
    </div>
</div>


        

@endsection