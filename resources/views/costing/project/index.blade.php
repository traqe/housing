@extends('master')
@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">

                <div class="pull-left">
                    <h3><i class="fa fa-briefcase"> Costing Stages</i></h3>
                </div>
                <div class="pull-right">
                    <a href="{{ route('costing-project') }}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                        <i class="fa fa-table"></i> Show Data
                    </a>
                    <a href="{{ route('costing-main-stage') }}" id="btn_add_new_data" class="btn btn-sm btn-secondary" title="Add Data">
                        <i class="fa fa-table"></i> Show Costing Stages
                    </a>
                    <a href="{{ route('costing-project/create') }}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                        <i class="fa fa-plus-circle"></i> Add Data
                    </a>

                </div>
            </div>
        </div>
        
        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                <strong>Projects</strong>
                <small>Table</small>
            </div>
            <div class="card-body">
                @include('layouts.partials.alerts')
                <table class="table table-striped table-bordered table-hover"  id="example">
                    <thead>
                    <tr>
                        <th>Project #</th>
                        <th>Project Name</th>
                        <th>Site Location</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($data as $project)
                        <tr>
                            <td>{{$project->project_number}}</td>
                            <td>{{$project->project_name}}</td>
                            <td>{{$project->site_location}}</td>
                            <td>{{$project->start_date}}</td>
                            <td>
                                <div class="pull-right box-tools">
                                    <a class="text-warning"
                                       href="{{route('get-costing-project',$project->id )}}"
                                       title="View Details"><i class="fa fa-eye"></i>
                                    </a>
                                    <a  class="text-primary"
                                        href="{{ url('costing-project/'.$project->id.'/edit') }}"
                                        title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                                    </a>
                                    
                                    <a data-url="{{ url('delete-costing-project/'.$project->id) }}" onclick='deleteData(this)' class='text-danger' title='Delete'><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>

                    @empty

                    @endforelse

                    </tbody>
                </table>
                
            </div>
        </div>

    </div>

</div>


@endsection
@push('page_scripts')
<script>
    function deleteData(dt){
        if (confirm("Do you want to delete this data?")){
            $.ajax({
                type:'DELETE',
                url:$(dt).data("url"),
                data:{
                    "_token":"{{ csrf_token() }}"
                },
                success:function(response) {
                    if (response.status){
                        location.reload();
                    }
                },
                error:function(response) {
                    console.log(response);
                }
            });
        }
        return false;
    }
</script>
@endpush