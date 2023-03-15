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
                    <a href="#" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                        <i class="fa fa-plus-circle"></i> Add Data
                    </a>

                </div>
            </div>
        </div>
        
        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                <strong>Lease</strong>
                <small>Create</small>
            </div>
            <div class="card-body">
                @include('layouts.partials.alerts')

                <div class="card-body">
 
                    <form method="post" action="{{ route('lease-store') }}" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="gender">Stand Number</label>
                            <input type="text" id="search" name="search" class="form-control" placeholder="Search Stand Number..." required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Lease Number</label>
                            <input type="text" name="lease_number" class="form-control" placeholder="Lease Number..." required>
                        </div>

                        <div class="form-group">
                            <label for="start-date">Date Applied</label>
                            <input type="date" name="date_applied" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="end-date">Expiry Date</label>
                            <input type="date" name="expiry_date" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="formFile" class="form-label">Supporting Documents</label>
                            <input class="form-control" type="file" name="file">
                        </div>
  
                        <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa  fa-check-circle"></span> Create Lease</button>
                        
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
        source:  function (term, process) {
        return $.get(route, { term: term }, function (data) {
                return process(data);
            });
        }
    });
</script>
@endpush