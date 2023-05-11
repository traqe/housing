@extends('master')
@section('content')


<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="pull-right">

                    <a href="{{route('stands')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                        <i class="fa fa-table"></i> Show Data
                    </a>


                    <a href="{{route('createStand')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                        <i class="fa fa-plus-circle"></i> Add Data
                    </a>

                </div>
            </div>
        </div>

        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                <strong>Debtors</strong>
                <small>Table</small>
            </div>
            <div class="card-body">
                @include('layouts.partials.alerts')
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Account</th>
                            <th>Name </th>
                            <th>Address </th>
                            <th>Balance </th>
                        </tr>
                    <thead>
                    <tbody>
                        @forelse($debtors as $debtors)
                        <tr>
                            <td>{{$debtors->id}}</td>
                            <td>{{$debtors->Account}}</td>
                            <td>{{$debtors->Name}}</td>
                            <td>{{$debtors->Physical5}}</td>
                            <td>{{$debtors->DCBalance}}
                            <div class="pull-right box-tools">
                                    <a class="text-warning" href="{{route('showDebtor',$debtors->id )}}" title="View Details"><i class="fa fa-eye"></i>
                                    </a>
                                   {{-- <a class="text-primary" href="{{route('editStand',$debtors->id )}}" title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                                    </a> --}}
                                    {{--<a class="text-danger"--}}
                                    {{--href="{{route('deleteStand',$gender->id )}}"--}}
                                    {{--title="Edit Details"><i class="fa fa-trash"></i>--}}
                                    {{--</a>--}}


                                </div>
                            </td>
</tr>
@empty
@endforelse
</tbody>
</table>
<ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
</div>
</div>
</div>
</div>

@endsection
