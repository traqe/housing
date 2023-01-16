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
 
                    <form>
                        
                        <div class="form-group">
                            <label for="gender">Stage</label>
                            <input type="text" name="name" value="{{ $data->stage->name }}" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label for="gender">Narration</label>
                            <input type="text" name="name" value="{{ $data->name }}" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Cost ($)</label>
                            <input type="text"  name="cost" value="{{ $data->cost }}" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label for="gender">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" disabled>{{ $data->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="date" value="{{ $data->date }}" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <a href="{{ asset('storage/documents/'.$data->document) }}" target="_blank" class="btn btn-outline-primary btn-md">DOWNLOAD SUPPORTING DOCUMENT &nbsp;&nbsp;<i class="fa fa-file-o"></i></a> 
                        </div>

                    </form>

                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>

</div>


@endsection