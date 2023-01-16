@extends('master')
@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        
        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                <strong>Project</strong>
                <small>Data</small>
            </div>
            <div class="card-body">
                @include('layouts.partials.alerts')

                <div class="card-body">
 
                    <form method="post" action="{{ route('store-costing-project-stand') }}">
                        {{csrf_field()}}

                        <input type="hidden" value="{{ $projectId }}" name="project_id" />

                        <div class="form-group">
                            <label for="gender">Stand Type</label>
                            <select class="form-control" id="stand_type" name="stand_type">
                                @foreach ( $standTypes as $stand)
                                <option value="{{ $stand->id }}">{{ $stand->type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="gender">Area Available (m2)</label>
                            <input type="text" name="area_available" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Number of Units</label>
                            <input type="text" name="number_of_units" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Size of Stand (m2)</label>
                            <input type="text" name="size" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa  fa-check-circle"></span> Add Data</button>
                        
                    </form>

                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>

</div>


@endsection