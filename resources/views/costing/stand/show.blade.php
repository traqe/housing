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
                    <a href="{{ url('costing-project-stage/create/'.$data->id) }}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                        <i class="fa fa-plus-circle"></i> Add Cost
                    </a>
                    {{-- <a href="{{ url('costing-project-stage/create/'.$data->id) }}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Project Mark Up %">
                        <i class="fa fa-plus-circle"></i> Add Cost
                    </a> --}}

                    @if ($costId != null)
                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#primaryModal">
                        <i class="fa fa-plus-circle"></i> Add Mark Up %
                    </button>
                    @endif

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-info-circle"></i>
                        <strong>Stands Costing </strong>
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
                                        <td>Stand Type</td>
                                        <td>{{ $data->stand->type }}</td>
                                    </tr>
                                    <tr>
                                        <td>Available Area (m2)</td>
                                        <td>{{ $data->area_available }}</td>
                                    </tr>
                                    <tr>
                                        <td>Number of Stands</td>
                                        <td>{{ $data->number_of_units }}</td>
                                    </tr>
                                    <tr>
                                        <td>Size Per Stand</td>
                                        <td>{{ $data->size }}</td>
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
                        <strong>Stages </strong>
                        <small>Data</small>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-detail" class="table table-bordered table-sm table-striped">
                                <tbody>
                                    @forelse ( $stages as $stage )
                                    <tr>
                                        <th>{{ $stage->name }} Costs</th>
                                    </tr>
                                    @foreach ($costs as $cost)
                                    @if($cost->stage_id == $stage->id)
                                        <tr>
                                            <td>{{ $cost->name }} - ${{ $cost->cost }}
                                                <div class="pull-right box-tools">
                                                    <a class="text-warning"
                                                    href="{{route('get-costing-project-stage',$cost->id )}}"
                                                    title="View Details"><i class="fa fa-eye"></i>
                                                    </a>
                                                    <a  class="text-primary"
                                                        href="{{ url('costing-project-stage/'.$cost->id.'/edit') }}"
                                                        title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                                                    </a>
                                                    
                                                    <a data-url="{{ url('delete-costing-project-stage/'.$cost->id) }}" onclick='deleteData(this)' class='text-danger' title='Delete'><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    @endforeach
                                    @empty
                                        <tr>No data available</tr>
                                    @endforelse
                                    <tr>
                                        <th>Total Cost</th>
                                    </tr>
                                    <tr>
                                        <td>${{ $totalCosts }}</td>
                                    </tr>
                                    <tr>
                                        <th>Markup (%)</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $markUp }}</td>
                                    </tr>
                                    <tr>
                                        <th>Price Per Square meter</th>
                                    </tr>
                                    <tr>
                                        <td>${{ round($costPerM2, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@include('costing.stand.addMarkUpModal')

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