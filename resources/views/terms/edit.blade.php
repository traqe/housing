@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">

                        <a href="{{route('terms')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                <i class="fa fa-table"></i> Show Data
                            </a>


                            <a href="{{route('termCreate')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                                <i class="fa fa-plus-circle"></i> Add Data
                            </a>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-file"></i>
                        <strong>Edit Subject</strong>
                        <small>Form</small>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('UpdateTerm', $term->TermID)}}">
                            <input class="hidden" type="hidden" name="updated_by" value="{{Auth::user()->id}}">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <label for="gender">Year</label>
                                <input type="number"  name="TermYear" value="{{$term->TermYear}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Term</label>
                                <input type="number"  name="Term" class="form-control" value="{{$term->Term}}" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Start Date</label>
                                <input type="date"  name="StartDate" class="form-control" value="{{date_format(date_create($term->StartDate), 'Y-m-d')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">End Date</label>
                                <input type="date"  name="EndDate" class="form-control" value="{{date_format(date_create($term->EndDate), 'Y-m-d')}}" required>
                            </div>
                            <div class="form-group">
                                <select name="Closed" id="Closed" class="form-control input-group-lg reg_name" required>
                                    <option value="{{$term->Closed}}" disabled selected>@if ($term->Closed == 0) {{'Active'}} @else {{'Inactive'}}@endif</option>
                                    <option value="0" >Active</option>
                                    <option value="1" >Inactive</option>

                                </select>
                            </div>
                            <input type="submit" class="btn btn-success pull-right">
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
@endsection
