@extends('master')
@section('content')


    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">

                        <a href="{{route('wards')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                            <i class="fa fa-table"></i> Show Data
                        </a>


                        <a href="{{route('createWard')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                            <i class="fa fa-plus-circle"></i> Add Ward
                        </a>



                        <a href="{{route('createBuscentre')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                            <i class="fa fa-plus-circle"></i> Add BC
                        </a>
                        <a href="{{route('Buscentre')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                            <i class="fa fa-plus-circle"></i> List BCs
                        </a>

                        <a href="http://localhost:8000/admin/suppliers/import-data" id="btn_import_data" data-url-parameter="" title="Import Data" class="btn btn-sm btn-primary btn-import-data">
                            <i class="fa fa-download"></i> Import Data
                        </a>
                    </div>
                </div>
            </div>
            <div class="card card-accent-primary">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    <strong>Ward Bussiness Centres</strong>
                    <small>Table</small>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover ">
                        <thead>
                        <tr>
                        <th>#</th>
                        <th>Ward</th>
                        <th>Bussiness Centre </th>
</tr>
</thead>
<tbody>
    @forelse($buscentre as $bus)
    <tr>
        <td>{{$bus->id}}</td>
        <td>{{$bus->ward->name}}
        <td>{{$bus->name}}
        <div class="pull-right box-tools">
                                        {{--<a class="btn-sm btn btn-warning"
                                           href="{{route('showBuscentre',$bus->id)}}"
                                           title="View Details"><i class="fa fa-eye"></i>
                                        </a>--}}
                                        <a  class="btn-sm btn btn-primary"
                                            href="{{route('editBuscentre',$bus->id )}}"
                                            title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                                        </a>
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