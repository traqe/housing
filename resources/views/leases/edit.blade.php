@extends('master')
@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">

                <div class="pull-left">
                    <h3><i class="fa fa-briefcase"> Leases</i></h3>
                </div>
                <div class="pull-right">
                    <a href="{{ route('lease') }}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                        <i class="fa fa-table"></i> Show Data
                    </a>
                </div>
            </div>
        </div>

        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                <strong>Lease</strong>
                <small>Update</small>
            </div>
            <div class="card-body">
                @include('layouts.partials.alerts')

                <div class="card-body">

                    <form method="post" action="{{ route('lease-update', $data->id) }}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}

                        <div class="form-group">
                            <label for="gender">Stand Number</label>
                            <input type="text" id="search" name="search" class="form-control" value="{{$stand->stand_no}}" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Lease Number</label>
                            <input type="text" name="lease_number" class="form-control" value="{{$data->lease_no}}" required>
                        </div>

                        <div class="form-group">
                            <label for="start-date">Date Issued</label>
                            <input type="date" name="date_applied" class="form-control" value="{{$data->date_applied}}" required>
                        </div>
                        <div class="form-group">
                            <label for="end-date">Expiry Date</label>
                            <input type="date" name="expiry_date" class="form-control" value="{{$data->expiry_date}}" required>
                        </div>


                        <div class="form-group mb-3">
                            <label for="formFile" class="form-label">Supporting Documents</label>
                            <input class="form-control" type="file" name="file">
                        </div>

                        <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa  fa-check-circle"></span> Update Lease Details</button>

                    </form>

                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>

</div>


@endsection
@push('page_scripts')
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>-->
<script src="{{ asset('/js/auto_complete_scripts/jquery.js')}}"></script>
<script src="{{ asset('/js/auto_complete_scripts/bootstrap3-typeahead.min.js')}}"></script>
<script type="text/javascript">
    var route = "{{ url('lease-stand-autocomplete') }}";
    $('#search').typeahead({
        source: function(term, process) {
            return $.get(route, {
                term: term
            }, function(data) {
                return process(data);
            });
        }
    });
</script>
@endpush