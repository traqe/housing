@extends('master')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                            <div class="pull-right">
                                <a href="{{route('marital')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                                    <i class="fa fa-table"></i> Show Data
                                </a>
                                <a href="{{route('createMarital')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">
                                    <i class="fa fa-plus-circle"></i> Add Data
                                </a>


                                <a href="javascript:void(0)" id="btn_export_data" data-url-parameter="" title="Export Data" class="btn btn-sm btn-primary btn-export-data">
                                    <i class="fa fa-upload"></i> Export Data
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
                        <strong>Marital Status</strong>
                        <small>Table</small>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th> #</th>
                                        <th>Marital Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($maritals as $marital)
                                        <tr>
                                            <td>{{$marital->id}}</td>
                                            <td>
                                                {{$marital->maritalstatus}}
                                                <div class="pull-right box-tools">
                                                    <a class="btn-sm btn btn-warning"
                                                       href="{{route('showMarital',$marital->id )}}"
                                                       title="View Details"><i class="fa fa-eye"></i>
                                                    </a>
                                                    <a class="btn-sm btn btn-primary"
                                                       href="{{route('editMarital',$marital->id )}}"
                                                       title="Edit Details"><i class="fa fa-pencil-square-o"></i>
                                                    </a>
                                                    <a data-toggle="modal"  onclick="getMarital('{{$marital->id}}')"  class="btn-sm btn btn-danger"
                                                       href="#dM"
                                                       title="Delete"><i class="fa fa-trash-o"></i>
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
        </div>
    </div>

    <div class="row">
        <div class="modal fade" id="dM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>
                    <form  class="form-horizontal" action="{{route('deleteMarital', 1)}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input type="hidden" name="id" id="idM" class="hiddenid">
                            <input type="hidden" name="maritalstatus" id="maritalstatus" class="hiddenid">
                            <div class="form-group">
                                <div class="col-sm-12" id="classro">
                                    Are you sure you want to delete data?
                                </div>
                            </div><!--/form-group-->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span> Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
