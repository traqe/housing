@extends('master')
@section('content')


    <div class="container-fluid">

       @include('leases.alert.alert')

        <!-- @include('layouts.partials.alerts') -->

        <div class="col-md-12">
            <!-- Default box -->
            
            <div class="card card-accent-primary">
                <div class="card-header">
                    <div class="pull-left">
                        <i class="fa fa-align-justify"></i>
                        <strong>Lease</strong>
                        <small>Table</small>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('lease-create') }}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                            <i class="fa fa-plus-circle"></i> Add Data
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- @include('layouts.partials.alerts') -->
                    <table class="table table-striped table-bordered table-hover"  id="example">
                        <thead>
                        <tr>
                            <th>Lease Number</th>
                            <th>Date Applied</th>
                            <th>Expiry Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($leases as $lease)
                            <tr>
                                <td>{{$lease->lease_no}}</td>
                                <td>{{$lease->date_applied}}</td>
                                <td>{{$lease->expiry_date}}</td>
                                <td>
                                    @if( strtotime(date("now")) > strtotime($lease->expiry_date) )
                                        EXPIRED 
                                    @else
                                        {{$lease->lease_status}}
                                    @endif
                                </td>
                                <td>
                                    <div class="pull-right box-tools">
                                        <a  class="text-warning"
                                            href="{{url('lease/'.$lease->id)}}"
                                            title="Show Details"><i class="fa fa-eye"></i>
                                        </a>
                                        <a  class="text-primary"
                                            href="{{url('lease/'.$lease->id.'/edit')}}"
                                            title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <?php
                                            $url = url('lease/' . $lease->id);
                                            // dd($url);
                                            $delete = "<button data-url='" . $url . "' onclick='deleteData(this)' class='btn btn-action btn-danger' title='Delete'><i class='fa fa-trash-o'></i></button>&nbsp;";
                                            echo $delete;
                                        ?>
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
