@extends('master')
@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        
        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                <strong>Stage Costing</strong>
                <small>Data</small>
            </div>
            <div class="card-body">
                @include('layouts.partials.alerts')

                <div class="card-body">
 
                    <form method="post" action="{{ route('store-costing-project-stage') }}" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <input type="hidden" value="{{ $standId }}" name="stand_id" />

                        <div class="form-group">
                            <label for="gender">Stage</label>
                            <select class="form-control" id="stage" name="stage_id">
                                @foreach ( $stages as $stage)
                                <option value="{{ $stage->id }}">{{ $stage->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="gender">Narration</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Cost ($)</label>
                            <input type="text"  name="cost" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control" required>
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
                <!-- /.box-body -->
            </div>
        </div>

    </div>

</div>


@endsection