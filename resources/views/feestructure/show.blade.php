@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
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
                <!-- /.box -->
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-money">
                        <strong>View Fee Structure</strong>
                        <small>Table</small>
                        </i>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-hover">
                            <table id="table-detail" class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td>Year</td>
                                    <td>{{$fee->year}}</td>
                                </tr>
                                <tr>
                                    <td>Term</td>
                                    <td>{{$fee->term}}</td>
                                </tr>
                                <tr>
                                    <td>Amount</td>
                                    <td>{{$fee->amount}}</td>
                                </tr>
                                <tr>
                                    <td>Details</td>
                                    <td>{{$fee->details}}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-money">
                            <strong>View Fee Structure</strong>
                            <small>Table</small>
                        </i>
                        <div class="pull-right">
                            {{--<a href="{{route('allmarks', [$subject->grade_id, $subject->subject_id])}}"   class="btn btn-success btn-sm" title="Capture Exam">--}}
                                {{--<i class="fa fa-book"> Exam</i>--}}
                            {{--</a>--}}
                            <button data-toggle="modal" data-target="#chargeClass"  class="btn btn-info btn-sm"title="Choose Classes to Charge">
                                <i class="fa fa-plus-square"> Select Classes</i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-detail" class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Grade</th>
                                    <th>Details</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($feegrade as $gender)
                                    <tr>
                                        <td>{{$gender->id}}</td>
                                        <td>{{$gender->grade->grade}}</td>
                                        <td>
                                            {{$gender->feestructure->details}}
                                            {{--<div class="pull-right box-tools">--}}
                                                {{--<a class="btn-sm btn btn-outline-primary"--}}
                                                   {{--href="#"--}}
                                                   {{--title="View Details"><i class="fa fa-info-circle"></i>--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                        </td>
                                    </tr>

                                @empty

                                @endforelse

                            </table>
                        </div>
                        <ul class="pagination">
                            {{$feegrade->links()}}
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>

        <div class="modal fade" id="chargeClass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-money"> Select Classes to Charge</i> </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form  class="form-horizontal" action="{{route('charge')}}" method="post">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <input type="hidden" name="fee_id" id="fee_id" value="{{$fee->id}}" class="hiddenid">
                            <input type="hidden" name="year" id="year" value="{{$year}}">
                            <input type="hidden" name="created_by" id="created_by" value="{{Auth::user()->id}}">
                            <input type="hidden" name="term" id="term" value="{{$term}}">
                            <div class="row">
                            @forelse($grades as $s)

                                    <div class="col-md-2">
                                        {{--<input  type="checkbox" name="role_id" value="{{$role->id}}"/>--}}
                                        <label class="switch switch-icon switch-success">
                                            <input type="checkbox" class="switch-input"  name="role_ids[]" value="{{$s->id}}">
                                            <span class="switch-label" data-on="" data-off=""></span>
                                            <span class="switch-handle"></span>
                                        </label>  {{$s->grade}}
                                    </div>

                            @empty
                            @endforelse
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-money"></i> Charge</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
