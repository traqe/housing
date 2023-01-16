@extends('master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="pull-left">
                        <h4><i class="fa fa-user-secret"></i> {{$cemeteryowner->name.' '.$cemeteryowner->surname}} Details
                        </h4>
                    </div>
                    <div class="pull-right">

                        <a href="{{route('cemeteryowners')}}" id="btn_show_data" class="btn btn-sm btn-primary" title="Show Data">
                            <i class="fa fa-table"></i> Show Data
                        </a>

                        <!-- <a href="#" id="btn_show_data" class="btn btn-sm btn-warning" title="Show Data">
                                <i class="fa fa-file-pdf-o"></i> Graves Owned
                            </a>
                        -->
                        {{--<a href="{{route('createCemeteryOwner')}}" id="btn_add_new_data" class="btn btn-sm btn-success" title="Add Data">--}}
                        {{--<i class="fa fa-plus-circle"></i> Add Data--}}
                        {{--</a>--}}



                        {{--<a href="javascript:void(0)" id="btn_export_data" data-url-parameter="" title="Export Data" class="btn btn-sm btn-primary btn-export-data">--}}
                        {{--<i class="fa fa-upload"></i> Export Data--}}
                        {{--</a>--}}

                        {{--<a href="http://localhost:8000/admin/suppliers/import-data" id="btn_import_data" data-url-parameter="" title="Import Data" class="btn btn-sm btn-primary btn-import-data">--}}
                        {{--<i class="fa fa-download"></i> Import Data--}}
                        {{--</a>--}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="card card-accent-primary">
                        <div class="card-header">
                            <i class="fa fa-street-view">
                                <strong>Personal</strong>
                                <small>Details</small>
                            </i>
                            <div class="pull-right">
                                <a href="{{route('editCemeteryOwner',$cemeteryowner->id )}}" class="" title="Edit Personal Details">
                                    <i class="fa fa-pencil"> Edit</i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <input type="hidden" value="{{ $cemeteryowner->id }}" name="owner_id" id="owner_id">
                            <div class="table-responsive">
                                <table id="table-detail" class="table table-hover table-bordered">
                                    <tbody>
                                        <tr>

                                            <td>First Name</td>
                                            <td>{{$cemeteryowner->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Surname</td>
                                            <td>{{$cemeteryowner->surname}}</td>
                                        </tr>
                                        <tr>
                                            <td>Identity No</td>
                                            <td>{{$cemeteryowner->Identity_no}}</td>
                                        </tr>
                                        <tr>
                                            <td>Contact</td>
                                            <td>{{$cemeteryowner->contact}}</td>
                                        </tr>
                                        <tr>
                                            <td>Adrress</td>
                                            <td>{{$cemeteryowner->address}}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    @include('layouts.partials.alerts')
                    <div class="card">
                        <div class="card-header">
                            <div class="pull-right">
                                <button href="#startallocation" data-toggle="modal" class="btn btn-sm btn-primary" title="Start Allocation" id="allocate" onclick="myFunction()">
                                    <i class="fa fa-plus"> Allocate</i>
                                </button>
                            </div>
                            <i class="fa fa-info-circle"></i>
                            <strong>Stands Owned</strong>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>GRAVE ID</th>
                                            <th>GRAVE SITE</th>
                                            <th>GRAVE LOT </th>
                                            <th>GRAVE #</th>
                                            <th>GRAVE SECTION</th>
                                            <th>GRAVE STATUS</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($grave as $grave )
                                        <tr>
                                            <td> {{ $grave->id }} </td>
                                            <td> {{ $grave->g_site }}</td>
                                            <td> {{ $grave->g_lot }}</td>
                                            <td> {{ $grave->g_no }}</td>
                                            <td> {{ $grave->g_section }}</td>
                                            <td> {{ $grave->g_status }}
                                                <div class="pull-right">
                                                    <a href="#stageupdate" onclick="" data-toggle="modal" title="Stage Update">
                                                        <i class="fa fa-pencil"></i>
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
    </div>
</div>

<div class="modal fade" id="startallocation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-book">Grave Application</i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal" action="{{ route('createAllocateGrave') }}" method="post">
                <div class="modal-body">
                    {{ csrf_field() }}

                    <!-- <input type="hidden" value="{{Auth::user()->id }}" name="created_by"> -->

                    <div class="form-group">
                        <div>
                            <div class="col-sm-12">
                                <!-- <label for="gender">Owner ID</label> -->
                                <input type="hidden" id="graveowner" name="graveowner" class="form-control input-group-lg reg_name" readonly>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="gender">Receipt Number</label>
                                    <input type="text" name="receipt" class="form-control input-group-lg reg_name" required>
                                </div>
                            </div>
                            <!--/form-group-->

                        </div>
                        <div class="form-group">
                            <label for="gender">Grave ID</label>

                            <select name='grave_id' id='grave_id' class="form-control input-group-lg reg_name required">
                                <option selected disabled>Select From Available Stands</option>
                                @forelse($graves as $grave)
                                @if ($grave->g_status == 'Available')
                                <option value="{{$grave->id}}">{{$grave->g_site . " " . $grave->g_no . " " . $grave->g_section}}</option>
                                @endif
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> Save
                            </button>
                        </div>
            </form>
        </div>
    </div>
</div>
<script>
    function myFunction() {
        var id = $("#owner_id").val();
        document.getElementById("graveowner").value = id;
        console.log(id);
    }
</script>
@endsection