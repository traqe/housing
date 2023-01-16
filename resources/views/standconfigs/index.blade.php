@extends('master')
@section('content')


<div class="container-fluid">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="pull-right">

                    <a href="{{route('standconfigs')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                        <i class="fa fa-table"></i> Show Data
                    </a>


                    <a href="{{route('createStandConfigs')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                        <i class="fa fa-plus-circle"></i> Add Data
                    </a>

                </div>
            </div>
        </div>


        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                <strong>Stand Configuration</strong>
                <small>Table</small>
            </div>
            <div class="card-body">
                @include('layouts.partials.alerts')
                <table class="table table-striped table-sm table-bordered table-hover ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Stand Type</th>
                            <th>Stand Class</th>
                            <th>Number of Stands</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($standconfigs as $gender)
                        <tr>
                            <td>{{$gender->id}}</td>
                            <td>{{$gender->standtype->type}}</td>
                            <td>{{$gender->standclass != null ? $gender->standclass->class : ''}}</td>
                            <td>
                                {{$gender->number_of_stands}}
                                <div class="pull-right box-tools">
                                    <a class="btn-sm btn btn-warning" href="{{route('showStandConfig',$gender->id )}}" title="View Details"><i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn-sm btn btn-primary" href="{{route('editStandConfig',$gender->id )}}" title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                                    </a>
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