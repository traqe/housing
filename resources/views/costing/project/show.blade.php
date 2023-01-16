@extends('master')
@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">

                <div class="pull-left">
                    <h3><i class="fa fa-briefcase"> {{ $data->project_name }}</i></h3>
                </div>
                <div class="pull-right">
                    <a href="{{ route('costing-project') }}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                        <i class="fa fa-table"></i> Show All Projects
                    </a>
                    <a href="{{ url('costing-project-stand/create/'.$data->id) }}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                        <i class="fa fa-plus-circle"></i> Add Project Data
                    </a>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-info-circle"></i>
                        <strong>Project </strong>
                        <small>Details</small>
                        <div class="pull-right box-tools">

                            <a href="{{ url('costing-project/'.$data->id).'/edit' }}"class="btn btn-sm btn-primary" title="Edit Details">
                                <i class="fa fa-pencil-square-o"></i> Edit
                            </a>
                                
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-detail" class="table table-bordered table-sm table-striped">
                                <tbody>
                                    <tr>
                                        <td>Project Name</td>
                                        <td>{{ $data->project_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Project Number</td>
                                        <td>{{ $data->project_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Site Number</td>
                                        <td>{{ $data->site_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Site Location</td>
                                        <td>{{ $data->site_location }}</td>
                                    </tr>
                                    <tr>
                                        <td>Project Description</td>
                                        <td>{{ $data->project_description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Start Date</td>
                                        <td>{{ $data->start_date }}</td>
                                    </tr>
                                    <tr>
                                        <td>Project Manager</td>
                                        <td>{{ $data->project_manager }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-info-circle"></i>
                        <strong>Project </strong>
                        <small>Data</small>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-detail" class="table table-bordered table-sm table-striped">
                                <tbody>
                                    @forelse ( $stands as $stand )
                                    <tr>
                                        <td>{{ $stand->stand->type }}</td>
                                        <td>
                                            <div class="pull-right box-tools">
                                                <a class="text-warning"
                                                   href="{{route('get-costing-project-stand',$stand->id )}}"
                                                   title="View Details"><i class="fa fa-eye"></i>
                                                </a>
                                                <a  class="text-primary"
                                                    href="{{ url('costing-project-stand/'.$stand->id.'/edit') }}"
                                                    title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                                                </a>
                                                <a data-url="{{ url('delete-costing-project-stand/'.$stand->id) }}" onclick='deleteData(this)' class='text-danger' title='Delete'><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>No data available</tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

{{-- @include('costing.project.addStandModal') --}}


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