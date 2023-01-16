@extends('master')
@section('content')


    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-right">

                        <a href="{{route('feestructures')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                            <i class="fa fa-table"></i> Show Data
                        </a>

                        <a href="{{route('createStructure')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                            <i class="fa fa-plus-circle"></i> Add Data
                        </a>

                        <a href="#" id="btn_export_data" data-url-parameter="" title="Export Data" class="btn btn-sm btn-primary btn-export-data">
                            <i class="fa fa-upload"></i> Export Data
                        </a>

                        <a href="#" id="btn_import_data" data-url-parameter="" title="Import Data" class="btn btn-sm btn-primary btn-import-data">
                            <i class="fa fa-download"></i> Import Data
                        </a>
                    </div>
                </div>
            </div>


            <div class="card card-accent-primary">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i>
                    <strong>Fee Structure</strong>
                    <small>Table</small>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Year</th>
                            <th>Term</th>
                            <th>Amount</th>
                            <th>Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($fees as $gender)
                            <tr>
                                <td>{{$gender->id}}</td>
                                <td>{{$gender->year}}</td>
                                <td>{{$gender->term}}</td>
                                <td>{{$gender->amount}}</td>
                                <td>
                                    {{$gender->details}}
                                    <div class="pull-right box-tools">
                                        <a class="btn-sm btn btn-warning"
                                           href="{{route('showStructure', $gender->id)}}"
                                           title="View Charged Classes"><i class="fa fa-money"></i>
                                        </a>
                                        <a  class="btn-sm btn btn-primary"
                                            href="{{route('editStructure',$gender->id )}}"
                                            title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        {{--<a data-toggle="modal"  onclick="getGender('{{$gender->id}}')"  class="btn-sm btn btn-danger"--}}
                                           {{--href="#deleteD"--}}
                                           {{--title="Delete"><i class="fa fa-trash-o"></i>--}}
                                        {{--</a>--}}

                                    </div>
                                </td>
                            </tr>

                        @empty

                        @endforelse

                        </tbody>
                    </table>
                    {{--<ul class="pagination">--}}
                        {{--<li class="page-item"><a class="page-link" href="#">Prev</a></li>--}}
                        {{--<li class="page-item active">--}}
                            {{--<a class="page-link" href="#">1</a>--}}
                        {{--</li>--}}
                        {{--<li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                        {{--<li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                        {{--<li class="page-item"><a class="page-link" href="#">4</a></li>--}}
                        {{--<li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
                    {{--</ul>--}}
                </div>
            </div>

        </div>

    </div>


@endsection
