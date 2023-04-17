@extends('master')
@section('content')
<div class="container-fluid">
    <div class="row">
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
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-info-circle"></i>
                            <strong>View Stand</strong>
                            <small>Table</small>
                        </div>
                        <div class="card-body">
                            <input type="hidden" value="{{ $stand->id }}" name="standid" id="standid">
                            <div class="table-responsive">
                                <table id="table-detail" class="table table-bordered table-sm table-striped">
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>{{$stand->id}}</td>
                                        </tr>
                                        <tr>
                                            <td>Stand No</td>
                                            <td>{{$stand->stand_no}}</td>
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td>{{$stand->type}}</td>
                                        </tr>

                                        <tr>
                                            <td>Class</td>
                                            <td>{{$stand->stand_class}}</td>
                                        </tr>

                                        <tr>
                                            <td>Development Status</td>
                                            <td>{{$stand->dvp_status}}</td>
                                        </tr>

                                        <tr>
                                            <td>Address</td>
                                            <td>{{$stand->address}}</td>
                                        </tr>

                                        <tr>
                                            <td>Location</td>
                                            <td>{{$stand->location}}</td>
                                        </tr>

                                        <tr>
                                            <td>Size</td>
                                            <td>{{$stand->size}}</td>
                                        </tr>

                                        <tr>
                                            <td>Price</td>
                                            <td>{{$stand->price}}</td>
                                        </tr>

                                        <tr>
                                            <td> Status</td>
                                            <td>{{$stand->status}}</td>
                                        </tr>
                                        <tr>
                                            <td> Batch</td>
                                            <td>{{($stand->batch != null ? $stand->batch->batch : '')}}</td>
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
                            <i class="fa fa-info-circle"></i>
                            <strong>Owner</strong>
                            <small>Table</small>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <!-- <th>StandNo</th> -->
                                        <th>Owner</th>
                                        <th>ApplicationType</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($stand->allocations as $gender)
                                    <tr>
                                        <!-- <td>{{$gender->stand_id}}</td> -->
                                        <!-- <td>{{$gender->application}}</td> -->
                                        @if ($gender->application_type == 'App\Application')
                                        <td>{{$gender->application->applicant->firstname.' '.$gender->application->applicant->surname}}</td>
                                        <td>Application</td>
                                        @else
                                        <td>{{$gender->application->beneficiary->firstname.' '.$gender->application->beneficiary->surname}}</td>
                                        <td>Cession</td>
                                        @endif
                                        <td>{{$gender->current_status}}</td>
                                        <td>{{$gender->created_at}}</td>
                                    </tr>

                                    @empty

                                    @endforelse

                                </tbody>
                            </table>

                        </div>
                        <!-- /.box-body -->
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-info-circle"></i>
                            <strong>Repossession History</strong>
                            <small>Table</small>
                            <div class="pull-right pl-3">
                                <a href="{{ route('repoNotification', $stand->id) }}" class="btn btn-sm btn-warning pull-right" title="Reposession Notice">
                                    <i class="fa fa-book"> Send Notification</i>
                                </a>
                            </div>
                            <!--ensures that only stands allocated can add repossessions-->
                            <div class="pull-right">
                                @if($notification)
                                @if($notification->count >= 2)
                                @if($stand->status == "ALLOCATED" OR $stand->status == "Allocated" OR $stand->status == "allocated")
                                <button href="#smallButton" data-toggle="modal" class="btn btn-sm btn-success pull-right" title="Add Cession">
                                    <i class="fa fa-plus"> Add Repossession</i>
                                </button>
                                @endif
                                @endif
                                @endif
                                <!--ensures that only stands repossessed can be reins-ed-->
                                @if($stand->repossessed == 1)
                                <button href="#standReinstate" data-toggle="modal" class="btn btn-sm btn-success pull-right" title="Add Cession">
                                    <i class="fa fa-home"> Reinstatement Stand</i>
                                </button>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($stand->repossessed == 1)
                            <div class="alert alert-danger" role="alert">
                                This stand is currently repossessed.
                            </div>
                            @endif


                            <div class="table-responsive">
                                <table id="table-detail" class="table table-sm table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Amount Paid</th>
                                            <th>Repayment Amount</th>
                                            <th>Details</th>
                                            <th>Status</th>
                                            <th>Approved_By</th>
                                            <th>Actions </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($stand->repossessions as $s)
                                        <tr>
                                            <td>{{$s->repossession_date}}</td>
                                            <td>{{$s->amount_paid}}</td>
                                            <td>{{$s->repayment_amount}}</td>
                                            <td>{{$s->reason}}</td>
                                            <td>{{$s->decision}}</td>
                                            <td>{{$s->approver != null ? $s->approver->name : ''}}
                                                <form class="form-horizontal" action="{{route('updateRepossession')}}" method="post">
                                                    {{csrf_field()}}
                                                    {{method_field('PUT')}}
                                                    <input type="hidden" value="{{Auth::user()->id}}" name="approved_by">
                                                    <input type="hidden" value="{{date('Y-m-d H:i:s')}}" name="approved_at">
                                                    <input type="hidden" value="{{$stand->id}}" name="stand_id">
                                                    <input type="hidden" value="APPROVED" name="decision" id="decision">
                                                    <input type="hidden" value="{{$s->id}}" name="repossession_id" id="repossession_id">
                                                    @if ($s->processed == 0)
                                                    <div class="pull-right box-tools">
                                                        <button onclick="approve('APPROVED'); return confirm('Are you sure you want save')" class="text-success" type="submit" title="APPROVE"><i class="fa fa-thumbs-up"></i>
                                                        </button>
                                                        <button onclick="approve('REJECTED'); return confirm('Are you sure you want save')" class="text-danger" type="submit" title="REJECT"><i class="fa fa-thumbs-down"></i>
                                                        </button>
                                                    </div>
                                                    @endif
                                                </form>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('destroyRepo', $s->id) }}">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    @include('layouts.partials.alerts')
                    <div class="card">
                        <div class="card-header">
                            @if ($stand->status == 'ALLOCATED' OR $stand->status == 'Allocated' OR $stand->status == 'allocated')
                            <div class="pull-right">
                                @foreach($stage_insp as $stage)
                                @if ($stage != NULL)
                                <a href="{{ route('printStageInspection', $stand->id) }}" class="btn btn-sm btn-success" title="Print Stage Inspection" disabled>
                                    <i class="fa fa-file"> Print</i>
                                </a>
                                @endif
                                @endforeach
                                <button data-toggle="modal" data-target="#addinspection" class="btn btn-sm btn-primary" title="Add Stage Inspection" onclick="myStand()">
                                    <i class="fa fa-plus"> Add Inspection</i>
                                </button>

                            </div>

                            @else
                            <div class="pull-right">
                                <a href="{{ route('printStageInspection', $stand->id) }}" class="btn btn-sm btn-primary" title="Print Stage Inspection" disabled>
                                    <i class="fa fa-plus">Print</i>
                                </a>
                                <button data-toggle="modal" data-target="#addinspection" class="btn btn-sm btn-primary" title="Add Stage Inspection" onclick="myStand()" disabled>
                                    <i class="fa fa-plus">Add Inspection</i>
                                </button>
                            </div>
                            @endif

                            <i class="fa fa-info-circle"></i>
                            <strong>Development Inspections</strong>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID </th>
                                            <th>INSPECTOR </th>
                                            <th>DEVELOPMENT STAGE </th>
                                            <th>INSPECTION STATUS</th>
                                            <th>RECEIPT NO.</th>
                                            <th>DATE </th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @forelse($stage_insp as $insp)
                                        <tr>
                                            <td>{{ $insp->id }}</td>
                                            <td>{{ $insp->inspector_name }}</td>
                                            <td>{{ $insp->stage }}</td>
                                            <td>{{ $insp->ins_status }}</td>
                                            <td>{{ $insp->receipt_no }}</td>
                                            <td>{{ $insp->ins_date }}
                                                <div class="pull-right">
                                                    <a href="{{ route('editStageInspection',$insp->id) }}" class="btn btn-sm btn-primary">
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
        <!-- /.box -->
    </div>
</div>
</div>


<!-- START EDIT INSPECTION MODAL -->
{{--
 <div class="modal fade" id="editinspection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-book">Edit Development Inspection</i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('updateStageInspection',$stage_insp->id)}}" method="POST">

{{ csrf_field() }}
<input type="hidden" value="{{Auth::user()->id }}" name="created_by">
<input type="hidden" value="{{$stand->id }}" name="stand_id">
<div class="form-group">
    <label for="grave">Inspection Stage</label>
    <select name="stage" class="form-control input-group-lg reg_name" required>
        @forelse($stages as $stages)
        <option value="{{ $stages->stage }}">{{ $stages->stage }}</option>

        @empty
        @endforelse
    </select>
</div>

<div class="form-group">
    <label for="grave">Inspection Name</label>
    <input type="text" value="{{ $stage_insp->inspector_name }}" name="inspector_name" class="form-control" required>
</div>
<div class="form-group">
    <label for="grave">Inspection Status</label>
    <input type="text" value="{{ $stage_insp->ins_status }}" name="ins_status" class="form-control" required>
</div>
<div class="form-group">
    <label for="grave">Receipt No.</label>
    <input type="text" value="{{ $stage_insp->receipt_no }}" name="receipt" class="form-control" required readonly>
</div>
<div class="form-group">
    <label for="grave">Inspection Date</label>
    <input type="date" value=" {{ $stage_insp->ins_date }}" name="ins_date" class="form-control" required>
</div>

<input type="submit" class="btn btn-success pull-right">
</form>
</div>
</div>
</div>
</div>
--}}
<!-- END EDIT INSPECTION MODAL -->


<div class="modal fade" id="smallButton" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-book"> Add Repossession</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal" action="{{route('addRepossession')}}" method="post">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{Auth::user()->id}}" name="captured_by">
                    <input type="hidden" value="{{$stand->id}}" name="stand_id">
                    @if ($stand->allocations->where('current_status','CURRENT')->first() != null)
                    <input type="hidden" value="{{$stand->allocations->where('current_status','CURRENT')->first()->application->id}}" name="application_id">
                    <input type="hidden" value="{{$stand->allocations->where('current_status','CURRENT')->first()->id}}" name="allocation_id">
                    <input type="hidden" value="{{($stand->batch != null ? $stand->batch->id : NULL)}}" name="stand_batch_id">
                    @endif
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Amount Paid</label>
                            <input type="text" name="amount_paid" id="amount_paid" value="{{$stand->price}}" class="form-control input-group-lg reg_name" required>
                        </div>
                    </div>
                    <!--/form-group-->

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Repayment Date</label>
                            <input type="date" name="repossession_date" class="form-control input-group-lg reg_name" required>
                        </div>
                    </div>
                    <!--/form-group-->

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Reason</label>
                            <input type="text" name="reason" class="form-control input-group-lg reg_name" required>
                        </div>
                    </div>
                    <!--/form-group-->

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Repayment Percentage</label>
                            <input type="number" onKeyUp="calculateRepaymentAmount()" name="repayment_percentage" id="repayment_percentage" class="form-control input-group-lg reg_name">
                        </div>
                    </div>
                    <!--/form-group-->

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Repayment Amount</label>
                            <input type="number" name="repayment_amount" id="repayment_amount" class="form-control input-group-lg reg_name" required>
                        </div>
                    </div>
                    <!--/form-group-->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> Save
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- reinstatement modal-->

<div class="modal fade" id="standReinstate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-book"> Add Reinstatement</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal" action="{{route('addReinstatement')}}" method="post">
                <div class="modal-body">
                    {{csrf_field()}}

                    <input type="hidden" value="{{Auth::user()->id}}" name="captured_by">
                    <input type="hidden" value="{{$stand->id}}" name="stand_id">

                    @if($repossession != null)
                    <!--extra code in tenary- {{($repossession != null ? $repossession->id : NULL)}}-->
                    <input type="hidden" value="{{$repossession->id}}" name="repossession_id">
                    @endif

                    @if ($stand->allocations->where('current_status','CURRENT')->first() != null)
                    <input type="hidden" value="{{$stand->allocations->where('current_status','CURRENT')->first()->application->id}}" name="application_id">
                    <input type="hidden" value="{{$stand->allocations->where('current_status','CURRENT')->first()->id}}" name="allocation_id">
                    <input type="hidden" value="{{($stand->batch != null ? $stand->batch->id : NULL)}}" name="stand_batch_id">
                    @endif
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Reason</label>
                            <input type="text" name="reason" id="reason" class="form-control input-group-lg reg_name" required>
                        </div>
                    </div>
                    <!--/form-group-->

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label for="gender">Reinstatement Date</label>
                            <input type="date" name="reinstatement_date" class="form-control input-group-lg reg_name" required>
                        </div>
                    </div>
                    <!--/form-group-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> Save
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- STAGE EDIT MODAL -->

<!-- START ADD INSPECTION MODAL -->

<div class="modal fade" id="addinspection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-book">Development Inspection</i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('saveStageInspection') }}" method="POST">

                    {{ csrf_field() }}
                    <input type="hidden" value="{{Auth::user()->id }}" name="created_by" />
                    <input type="hidden" value="{{$stand->id }}" name="stand_id" />

                    <label for="grave">Inspection Stage</label>
                    <select name="stage" class="form-control input-group-lg reg_name" required>
                        @forelse($stages as $stages)
                        <option value="{{ $stages->stage }}">{{ $stages->stage }}</option>

                        @empty
                        @endforelse
                    </select>

                    <div class="form-group">
                        <label for="grave">Inspection Name</label>
                        <input type="text" name="inspector_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="grave">Inspection Status</label>
                        <input type="text" name="ins_status" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="grave">Contractors</label>
                        <input type="text" name="contractors" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="grave">Receipt No.</label>
                        <input type="text" name="receipt" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="grave">Inspection Date</label>
                        <input type="date" name="ins_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="grave">Remarks</label>
                        <input type="text" name="remarks" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="grave">Witness</label>
                        <input type="text" name="witness" class="form-control" required>
                    </div>

                    <input type="submit" class="btn btn-success pull-right">
                </form>
            </div>
        </div>
    </div>
    <!-- END ADD INSPECTION MODAL -->
    @endsection